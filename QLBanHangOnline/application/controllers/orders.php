<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// controller control user authentication
class Orders extends CI_Controller
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();
    }

    /* default login when acess manager system */
    public function index()
    {
        if ($this->auth == null || !in_array(2, $this->auth['group_permission']))
            $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');

        $data['seo']['title'] = "Phần mềm quản lý bán hàng";
        $data['data']['user'] = $this->auth;
        $data['template'] = 'order/index';
        $store = $this->db->from('stores')->get()->result_array();
        $data['data']['store'] = $store;
        $store_id = $this->db->select('store_id')->from('users')->where('id', $this->auth['id'])->limit(1)->get()->row_array();
        $data['data']['store_id'] = $store_id['store_id'];
        $this->load->view('layout/index', isset($data) ? $data : null);
    }

    public function convert_number_to_words($number) {
        $hyphen      = ' ';
        $conjunction = '  ';
        $separator   = ' ';
        $negative    = 'âm ';
        $decimal     = ' phẩy ';
        $dictionary  = array(
            0                   => 'Không',
            1                   => 'Một',
            2                   => 'Hai',
            3                   => 'Ba',
            4                   => 'Bốn',
            5                   => 'Năm',
            6                   => 'Sáu',
            7                   => 'Bảy',
            8                   => 'Tám',
            9                   => 'Chín',
            10                  => 'Mười',
            11                  => 'Mười một',
            12                  => 'Mười hai',
            13                  => 'Mười ba',
            14                  => 'Mười bốn',
            15                  => 'Mười năm',
            16                  => 'Mười sáu',
            17                  => 'Mười bảy',
            18                  => 'Mười tám',
            19                  => 'Mười chín',
            20                  => 'Hai mươi',
            30                  => 'Ba mươi',
            40                  => 'Bốn mươi',
            50                  => 'Năm mươi',
            60                  => 'Sáu mươi',
            70                  => 'Bảy mươi',
            80                  => 'Tám mươi',
            90                  => 'Chín mươi',
            100                 => 'trăm',
            1000                => 'ngàn',
            1000000             => 'triệu',
            1000000000          => 'tỷ',
            1000000000000       => 'nghìn tỷ',
            1000000000000000    => 'ngàn triệu triệu',
            1000000000000000000 => 'tỷ tỷ'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . $this->convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . $this->convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    public function cms_print_order()
    {
        $data_post = $this->input->post('data');
        $data_template = $this->db->select('content')->from('templates')->where('id', $data_post['id_template'])->limit(1)->get()->row_array();
        $data_order = $this->db->from('orders')->where('ID', $data_post['id_order'])->get()->row_array();
        $customer_name = '';
        $customer_phone = '';
        $customer_address = '';
        if ($data_order['customer_id'] != 0){
            $customer_name = cms_getNamecustomerbyID($data_order['customer_id']);
            $customer_phone = cms_getPhonecustomerbyID($data_order['customer_id']);
            $customer_address = cms_getAddresscustomerbyID($data_order['customer_id']);
        }

        $user_name = '';
        if ($data_order['customer_id'] != 0)
            $user_name = cms_getNameAuthbyID($data_order['user_init']);

        $data_template['content'] = str_replace("{Ten_Cua_Hang}", "Phong Tran", $data_template['content']);
        $data_template['content'] = str_replace("{Ngay_Xuat}", $data_order['sell_date'], $data_template['content']);
        $data_template['content'] = str_replace("{Khach_Hang}", $customer_name, $data_template['content']);
        $data_template['content'] = str_replace("{DT_Khach_Hang}", $customer_phone, $data_template['content']);
        $data_template['content'] = str_replace("{DC_Khach_Hang}", $customer_address, $data_template['content']);
        $data_template['content'] = str_replace("{Thu_Ngan}", $user_name, $data_template['content']);
        $data_template['content'] = str_replace("{Tong_Tien_Hang}", $this->cms_common->cms_encode_currency_format($data_order['total_price']), $data_template['content']);
        $data_template['content'] = str_replace("{Chiec_Khau}", $this->cms_common->cms_encode_currency_format($data_order['coupon']), $data_template['content']);
        $data_template['content'] = str_replace("{Tong_Tien}", $this->cms_common->cms_encode_currency_format($data_order['total_money'] - $data_order['coupon']), $data_template['content']);
        $data_template['content'] = str_replace("{Khach_Dua}", $this->cms_common->cms_encode_currency_format($data_order['customer_pay']), $data_template['content']);
        $data_template['content'] = str_replace("{Con_No}", $this->cms_common->cms_encode_currency_format($data_order['lack']), $data_template['content']);
        $data_template['content'] = str_replace("{Ma_Don_Hang}", $data_order['output_code'], $data_template['content']);
        $data_template['content'] = str_replace("{Ghi_Chu}", $data_order['notes'], $data_template['content']);
        $data_template['content'] = str_replace("{So_Tien_Bang_Chu}", $this->convert_number_to_words($data_order['lack']), $data_template['content']);

        $detail ='';
        $number = 1;
        if (isset($data_order) && count($data_order)) {
            $list_products = json_decode($data_order['detail_order'], true);
            foreach ($list_products as $product) {
                $prd = cms_finding_productbyID($product['id']);
                $quantity = $product['quantity'];
                $total = $quantity*$product['price'];
                $detail = $detail.'<tr ><td  style="text-align:center;">'.$number++.'</td><td  style="text-align:center;">'.$prd['prd_name'].'</td><td  style="text-align:center;">'.$this->cms_common->cms_encode_currency_format($product['price']).'</td><td style = "text-align:center">'.$quantity.'</td ><td style="text-align:center;">'.$this->cms_common->cms_encode_currency_format($total).'</td ></tr>';
            }
        }

        $table = '<table border="1" style="width:100%;border-collapse:collapse;">
                    <tbody >
                        <tr >
                            <td style="text-align:center;"><strong >STT</strong ></td >
                            <td style="text-align:center;"><strong >Tên sản phẩm</strong ></td >
                            <td style="text-align:center;"><strong >Đơn giá</strong ></td >
                            <td style="text-align:center;"><strong >SL</strong ></td >
                            <td style="text-align:center;"><strong >Thành tiền</strong ></td >
                        </tr >'.$detail.'
                    </tbody >
                 </table >';

        $data_template['content'] = str_replace("{Chi_Tiet_San_Pham}", $table, $data_template['content']);

        echo $this->messages = $data_template['content'];
    }

    public function cms_paging_order($page = 1)
    {
        $option = $this->input->post('data');
        $total_orders = 0;
        $config = $this->cms_common->cms_pagination_custom();
        $option['date_to'] = date('Y-m-d', strtotime($option['date_to'] . ' +1 day'));
        if ($option['customer_id'] >= 0) {
            if ($option['option1'] == '0') {
                if ($option['date_from'] != '' && $option['date_to'] != '') {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 0)
                        ->where('customer_id', $option['customer_id'])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 0)
                        ->where('customer_id', $option['customer_id'])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                } else {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 0)
                        ->where('customer_id', $option['customer_id'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 0)
                        ->where('customer_id', $option['customer_id'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                }
            } else if ($option['option1'] == '1') {
                if ($option['date_from'] != '' && $option['date_to'] != '') {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 1)
                        ->where('customer_id', $option['customer_id'])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 1)
                        ->where('customer_id', $option['customer_id'])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                } else {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 1)
                        ->where('customer_id', $option['customer_id'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 1)
                        ->where('customer_id', $option['customer_id'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                }
            } else if ($option['option1'] == '2') {
                if ($option['date_from'] != '' && $option['date_to'] != '') {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where('customer_id', $option['customer_id'])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where('customer_id', $option['customer_id'])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                } else {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where('customer_id', $option['customer_id'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where('customer_id', $option['customer_id'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                }
            }
        } else {
            if ($option['option1'] == '0') {
                if ($option['date_from'] != '' && $option['date_to'] != '') {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 0)
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 0)
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                } else {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 0)
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 0)
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                }
            } else if ($option['option1'] == '1') {
                if ($option['date_from'] != '' && $option['date_to'] != '') {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 1)
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 1)
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                } else {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where('deleted', 1)
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where('deleted', 1)
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                }
            } else if ($option['option1'] == '2') {
                if ($option['date_from'] != '' && $option['date_to'] != '') {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where('sell_date >=', $option['date_from'])
                        ->where('sell_date <=', $option['date_to'])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                } else {
                    $total_orders = $this->db
                        ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) total_debt')
                        ->from('orders')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->row_array();
                    $data['_list_orders'] = $this->db
                        ->from('orders')
                        ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                        ->order_by('created', 'desc')
                        ->where(['deleted' => 0, 'lack >' => 0])
                        ->where("(output_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                        ->get()
                        ->result_array();
                }
            }
        }

        $data['_list_customer'] = $this->cms_common->unique_multidim_array($data['_list_orders'], 'customer_id');
        $data['customer_id'] = $option['customer_id'];
        $config['base_url'] = 'cms_paging_order';
        $config['total_rows'] = $total_orders['quantity'];
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $_pagination_link = $this->pagination->create_links();
        $data['total_orders'] = $total_orders;
        if ($page > 1 && ($total_orders['quantity'] - 1) / ($page - 1) == 10)
            $page = $page - 1;

        $data['option'] = $option['option1'];
        $data['page'] = $page;
        $data['_pagination_link'] = $_pagination_link;
        $this->load->view('ajax/orders/list_orders', isset($data) ? $data : null);
    }

    public function cms_del_temp_order($id)
    {
        $id = (int)$id;
        $order = $this->db->from('orders')->where(['ID' => $id, 'deleted' => 0])->get()->row_array();
        $store_id = $order['store_id'];
        $this->db->trans_begin();
        $user_init = $this->auth['id'];
        if (isset($order) && count($order)) {
            if ($order['order_status'] == 1) {
                $list_products = json_decode($order['detail_order'], true);
                foreach ($list_products as $item) {
                    $inventory_quantity = $this->db->select('quantity')->from('inventory')->where(['store_id' => $store_id, 'product_id' => $item['id']])->get()->row_array();
                    if (!empty($inventory_quantity)) {
                        $this->db->where(['store_id' => $store_id, 'product_id' => $item['id']])->update('inventory', ['quantity' => $inventory_quantity['quantity'] + $item['quantity'], 'user_upd' => $user_init]);
                    } else {
                        $inventory = ['store_id' => $store_id, 'product_id' => $item['id'], 'quantity' => $item['quantity'], 'user_init' => $user_init];
                        $this->db->insert('inventory', $inventory);
                    }

                    $product = $this->db->select('prd_sls')->from('products')->where('ID', $item['id'])->get()->row_array();
                    $sls['prd_sls'] = $product['prd_sls'] + $item['quantity'];
                    $this->db->where('ID', $item['id'])->update('products', $sls);

                    $this->db->where(['transaction_id'=> $id,'product_id'=>$item['id'],'store_id' => $store_id])->update('report', ['deleted' => 1,'user_upd' => $user_init]);
                }

                $this->db->where('ID', $id)->update('orders', ['deleted' => 1,'user_upd' => $user_init]);
            } else {
                $this->db->where('ID', $id)->update('orders', ['deleted' => 1,'user_upd' => $user_init]);
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo $this->messages = "0";
        } else {
            $this->db->trans_commit();
            echo $this->messages = "1";
        }
    }

    public function cms_del_order($id)
    {
        $id = (int)$id;
        $order = $this->db->from('orders')->where(['ID' => $id, 'deleted' => 1])->get()->row_array();
        $this->db->trans_begin();
        if (isset($order) && count($order)) {
            $this->db->where('ID', $id)->update('orders', ['deleted' => 2,'user_upd' => $this->auth['id']]);
        }else
            echo $this->messages = "0";

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo $this->messages = "0";
        } else {
            $this->db->trans_commit();
            echo $this->messages = "1";
        }
    }

    public function cms_vsell_order()
    {
        if ($this->auth == null) $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');
        $data['data'] = $this->db->from('users')->where('user_status', '1')->get()->result_array();
        $this->load->view('ajax/orders/sell_bill', isset($data) ? $data : null);
    }

    public function cms_detail_order()
    {
        if ($this->auth == null) $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');
        $id = $this->input->post('id');
        $order = $this->db->from('orders')->where('ID', $id)->get()->row_array();
        $data['_list_products'] = array();

        if (isset($order) && count($order)) {
            $list_products = json_decode($order['detail_order'], true);

            foreach ($list_products as $product) {
                $_product = cms_finding_productbyID($product['id']);
                $_product['quantity'] = $product['quantity'];
                $_product['price'] = $product['price'];
                $data['_list_products'][] = $_product;
            }
        }

        $data['data']['_order'] = $order;
        $this->load->view('ajax/orders/detail_order', isset($data) ? $data : null);
    }

    public function cms_edit_order()
    {
        if ($this->auth == null) $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');
        $id = $this->input->post('id');
        $order = $this->db->from('orders')->where(['ID'=> $id,'order_status'=>0])->get()->row_array();
        $data['_list_products'] = array();

        if (isset($order) && count($order)) {
            $list_products = json_decode($order['detail_order'], true);

            foreach ($list_products as $product) {
                $_product = cms_finding_productbyID($product['id']);
                $_product['quantity'] = $product['quantity'];
                $_product['price'] = $product['price'];
                $data['_list_products'][] = $_product;
            }
        }

        $data['data']['_order'] = $order;
        $this->load->view('ajax/orders/edit_order', isset($data) ? $data : null);
    }

    public function cms_autocomplete_products()
    {
        $data = $this->input->get('term');
        $products = $this->db
            ->from('products')
            ->where('(prd_code like "%'.$data.'%" or prd_name like "%'.$data.'%") and prd_status = 1 and deleted =0 ')
            ->get()
            ->result_array();
        echo json_encode($products);
    }

    public function cms_check_barcode($keyword)
    {
        $products = $this->db->from('products')->where(array('prd_status' => '1', 'deleted' => '0', 'prd_code' => $keyword))->get()->result_array();
        if (count($products) == 1)
            echo $products[0]['ID'];
        else
            echo 0;
    }

    public function cms_search_box_customer()
    {
        $data = $this->input->post('data');
        $customer = $this->db->like('customer_name', $data['keyword'])->or_like('customer_phone', $data['keyword'])->or_like('customer_email', $data['keyword'])->or_like('customer_code', $data['keyword'])->from('customers')->get()->result_array();
        $data['data']['customers'] = $customer;
        $this->load->view('ajax/orders/search_box_customer', isset($data) ? $data : null);
    }

    public function cms_select_product()
    {
        $id = $this->input->post('id');
        $seq = $this->input->post('seq');
        $product = $this->db->from('products')->where('ID', $id)->get()->row_array();
        if (isset($product) && count($product) != 0) {
            ob_start(); ?>
            <tr data-id="<?php echo $product['ID']; ?>">
                <td class="text-center seq"><?php echo $seq; ?></td>
                <td><?php echo $product['prd_code']; ?></td>
                <td><?php echo $product['prd_name']; ?></td>
                <td class="text-center" style="max-width: 30px;"><input style="max-height: 22px;" type="text"
                                                                        class="txtNumber form-control quantity_product_order text-center"
                                                                        value="1"></td>
                <td class="text-center price-order"><?php echo number_format($product['prd_sell_price']); ?></td>
                <td style="display: none;"
                    class="text-center price-order-hide"><?php echo $product['prd_sell_price']; ?></td>
                <td class="text-center total-money"><?php echo $product['prd_sell_price']; ?></td>
                <td class="text-center"><i class="fa fa-trash-o del-pro-order"></i></td>
            </tr>
            <?php
            $html = ob_get_contents();
            ob_end_clean();
            echo $html;
        }
    }

    public function cms_save_orders($store_id)
    {
        if($store_id==$this->auth['store_id']){
            $order = $this->input->post('data');
            $detail_order_temp = $order['detail_order'];
            if (empty($order['sell_date'])) {
                $order['sell_date'] = gmdate("Y:m:d H:i:s", time() + 7 * 3600);
            } else {
                $order['sell_date'] = gmdate("Y-m-d H:i:s", strtotime(str_replace('/', '-', $order['sell_date'])) + 7 * 3600);;
            }
            $this->db->trans_begin();
            $user_init = $this->auth['id'];
            $total_price = 0;
            $total_origin_price = 0;
            $total_quantity = 0;
            $order['coupon'] = ($order['coupon']=='NaN') ? 0 : $order['coupon'];
            if ($order['order_status'] == 1)
                foreach ($order['detail_order'] as $item) {
                    $inventory_quantity = $this->db->select('quantity')->from('inventory')->where(['store_id' => $store_id, 'product_id' => $item['id']])->get()->row_array();
                    if (!empty($inventory_quantity)) {
                        $this->db->where(['store_id' => $store_id, 'product_id' => $item['id']])->update('inventory', ['quantity' => $inventory_quantity['quantity'] - $item['quantity'], 'user_upd' => $user_init]);
                    } else {
                        $inventory = ['store_id' => $store_id, 'product_id' => $item['id'], 'quantity' => -$item['quantity'], 'user_init' => $user_init];
                        $this->db->insert('inventory', $inventory);
                    }

                    $product = $this->db->from('products')->where('ID', $item['id'])->get()->row_array();
                    $sls['prd_sls'] = $product['prd_sls'] - $item['quantity'];
                    $item['price'] = $product['prd_sell_price'];
                    $total_price += ($item['price'] - $item['discount']) * $item['quantity'];
                    $total_origin_price += $product['prd_origin_price']*$item['quantity'];
                    $total_quantity +=$item['quantity'];
                    $this->db->where('ID', $item['id'])->update('products', $sls);
                    $detail_order[] = $item;
                }
            else
                foreach ($order['detail_order'] as $item) {
                    $product = $this->db->from('products')->where('ID', $item['id'])->get()->row_array();
                    $item['price'] = $product['prd_sell_price'];
                    $total_price += ($item['price'] - $item['discount']) * $item['quantity'];
                    $total_quantity +=$item['quantity'];
                    $detail_order[] = $item;
                }

            $order['total_price'] = $total_price;
            $order['total_origin_price'] = $total_origin_price;
            $order['total_money'] = $total_price-$order['coupon'];
            $order['total_quantity'] = $total_quantity;
            $order['lack'] = $total_price - $order['customer_pay'] - $order['coupon'] > 0 ? $total_price - $order['customer_pay'] - $order['coupon'] : 0;
            $order['user_init'] = $this->auth['id'];
            $order['store_id'] = $store_id;
            $order['detail_order'] = json_encode($detail_order);

            $this->db->select_max('output_code')->like('output_code', 'PX');
            $max_output_code = $this->db->get('orders')->row();
            $max_code = (int)(str_replace('PX', '', $max_output_code->output_code)) + 1;
            if ($max_code < 10)
                $order['output_code'] = 'PX000000' . ($max_code);
            else if ($max_code < 100)
                $order['output_code'] = 'PX00000' . ($max_code);
            else if ($max_code < 1000)
                $order['output_code'] = 'PX0000' . ($max_code);
            else if ($max_code < 10000)
                $order['output_code'] = 'PX000' . ($max_code);
            else if ($max_code < 100000)
                $order['output_code'] = 'PX00' . ($max_code);
            else if ($max_code < 1000000)
                $order['output_code'] = 'PX0' . ($max_code);
            else if ($max_code < 10000000)
                $order['output_code'] = 'PX' . ($max_code);

            $this->db->insert('orders', $order);
            $id = $this->db->insert_id();
            $percent_discount = $order['coupon']/$total_price;
            if ($order['order_status'] == 1){
                $temp= array();
                $temp['transaction_code'] = $order['output_code'];
                $temp['transaction_id'] = $id;
                $temp['customer_id'] = isset($order['customer_id']) ? $order['customer_id'] : 0;
                $temp['date'] = $order['sell_date'];
                $temp['notes'] = $order['notes'];
                $temp['sale_id'] = $order['sale_id'];
                $temp['user_init'] = $order['user_init'];
                $temp['type'] = 3;
                $temp['store_id'] = $order['store_id'];
                foreach ($detail_order_temp as $item) {
                    $report = $temp;
                    $stock = $this->db->select('quantity')->from('inventory')->where(['store_id' => $temp['store_id'], 'product_id' => $item['id']])->get()->row_array();
                    $product = $this->db->from('products')->where('ID', $item['id'])->get()->row_array();
                    $report['origin_price'] = $product['prd_origin_price']*$item['quantity'];
                    $report['product_id'] = $item['id'];
                    $report['discount'] = $percent_discount*$item['quantity']*$product['prd_sell_price'];
                    $report['price'] = $product['prd_sell_price'];
                    $report['output'] = $item['quantity'];
                    $report['stock'] = $stock['quantity'];
                    $report['total_money'] = ($report['price']*$report['output'])-$report['discount'];
                    $this->db->insert('report', $report);
                }
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo $this->messages = "0";
            } else {
                $this->db->trans_commit();
                echo $this->messages = $id;
            }
        }else
            echo $this->messages = "0";
    }
}

