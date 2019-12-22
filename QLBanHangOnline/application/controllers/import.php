<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// controller control user authentication
class Import extends CI_Controller
{
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->cms_authentication->check();
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

    /* default login when acess manager system */
    public function index()
    {
        if ($this->auth == null || !in_array(5, $this->auth['group_permission']))
            $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');

        $data['seo']['title'] = "Phần mềm quản lý bán hàng";
        $data['data']['user'] = $this->auth;
        $data['template'] = 'imports/index';
        $store = $this->db->from('stores')->get()->result_array();
        $data['data']['store'] = $store;
        $store_id = $this->db->select('store_id')->from('users')->where('id',$this->auth['id'])->limit(1)->get()->row_array();
        $data['data']['store_id'] = $store_id['store_id'];
        $this->load->view('layout/index', isset($data) ? $data : null);
    }

    public function cms_vsell_import()
    {
        if ($this->auth == null) $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');
        $data['data']['user'] = $this->auth;
        $this->load->view('ajax/imports/import_bill', isset($data) ? $data : null);
    }

    public function cms_search_box_sup($keyword='')
    {
        $sup = $this->db->like('supplier_name', $keyword)->or_like('supplier_phone', $keyword)->or_like('supplier_email', $keyword)->or_like('supplier_code', $keyword)->from('suppliers')->get()->result_array();
        $data['data']['suppliers'] = $sup;
        $this->load->view('ajax/imports/search_box_sup', isset($data) ? $data : null);
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
                                                                        class="txtNumber form-control quantity_product_import text-center"
                                                                        value="1"></td>
                <td class="text-center" style="max-width: 120px;"><input  style="max-height: 22px;" type="text"
                                                                         class="txtMoney form-control text-center price-order" value="<?php echo number_format($product['prd_origin_price']); ?>"></td>
                <td class="text-center total-money"><?php echo $product['prd_sell_price']; ?></td>
                <td class="text-center"><i class="fa fa-trash-o del-pro-order"></i></td>
            </tr>
            <?php
            $html = ob_get_contents();
            ob_end_clean();
            echo $html;
        }
    }

    public function cms_save_import($store_id)
    {
        if($this->auth['store_id'] == $store_id){
            $input = $this->input->post('data');
            $detail_input_temp = $input['detail_input'];
            if (empty($input['input_date'])) {
                $input['input_date'] = gmdate("Y:m:d H:i:s", time() + 7 * 3600);
            } else {
                $input['input_date'] = gmdate("Y-m-d H:i:s", strtotime(str_replace('/', '-', $input['input_date'])) + 7 * 3600);;
            }
            $total_price = 0;
            $total_quantity = 0;
            $this->db->trans_begin();
            $user_init = $this->auth['id'];
            if ($input['input_status'] == 1){
                foreach ($input['detail_input'] as $item) {
                    $inventory_quantity = $this->db->select('quantity')->from('inventory')->where(['store_id'=>$store_id,'product_id'=>$item['id']])->get()->row_array();
                    if(!empty($inventory_quantity)){
                        $this->db->where(['store_id'=>$store_id,'product_id'=>$item['id']])->update('inventory', ['quantity'=>$inventory_quantity['quantity']+$item['quantity'],'user_upd'=>$user_init]);
                    }
                    else{
                        $inventory = ['store_id'=>$store_id,'product_id'=>$item['id'],'quantity'=>$item['quantity'],'user_init'=>$user_init];
                        $this->db->insert('inventory', $inventory);
                    }

                    $product = $this->db->select('prd_sls,prd_origin_price')->from('products')->where('ID', $item['id'])->get()->row_array();
                    $sls['prd_sls'] = $product['prd_sls'] + $item['quantity'];
                    $total_price += ($item['price'] * $item['quantity']);
                    $total_quantity += $item['quantity'];
                    if($item['price']!=$product['prd_origin_price']){
                        $sls['prd_origin_price'] = (($product['prd_origin_price']*$product['prd_sls'])+($item['quantity']*$item['price']))/$sls['prd_sls'];
                    }

                    $this->db->where('ID', $item['id'])->update('products', $sls);
                }
            }else
                foreach ($input['detail_input'] as $item) {
                    $total_price += ($item['price'] * $item['quantity']);
                    $total_quantity += $item['quantity'];
                }

            $input['total_quantity'] = $total_quantity;
            $input['total_price'] = $total_price;
            $lack = $total_price - $input['payed'] - $input['discount'];
            $input['total_money'] = $total_price - $input['discount'];
            $input['lack'] = $lack > 0 ? $lack : 0;
            $input['store_id'] = $store_id;
            $input['user_init'] = $this->auth['id'];
            $input['detail_input'] = json_encode($input['detail_input']);

            $this->db->select_max('input_code')->like('input_code', 'PN');
            $max_input_code = $this->db->get('input')->row();
            $max_code = (int)(str_replace('PN', '', $max_input_code->input_code)) + 1;
            if ($max_code < 10)
                $input['input_code'] = 'PN000000' . ($max_code);
            else if ($max_code < 100)
                $input['input_code'] = 'PN00000' . ($max_code);
            else if ($max_code < 1000)
                $input['input_code'] = 'PN0000' . ($max_code);
            else if ($max_code < 10000)
                $input['input_code'] = 'PN000' . ($max_code);
            else if ($max_code < 100000)
                $input['input_code'] = 'PN00' . ($max_code);
            else if ($max_code < 1000000)
                $input['input_code'] = 'PN0' . ($max_code);
            else if ($max_code < 10000000)
                $input['input_code'] = 'PN' . ($max_code);

            $this->db->insert('input', $input);
            $id = $this->db->insert_id();

            if ($input['input_status'] == 1){
                $temp= array();
                $temp['transaction_code'] = $input['input_code'];
                $temp['transaction_id'] = $id;
                $temp['supplier_id'] = isset($input['supplier_id']) ? $input['supplier_id'] : 0;
                $temp['date'] = $input['input_date'];
                $temp['notes'] = $input['notes'];
                $temp['user_init'] = $input['user_init'];
                $temp['type'] = 2;
                $temp['store_id'] = $store_id;
                foreach ($detail_input_temp as $item) {
                    $report = $temp;
                    $stock = $this->db->select('quantity')->from('inventory')->where(['store_id' => $store_id, 'product_id' => $item['id']])->get()->row_array();
                    $report['product_id'] = $item['id'];
                    $report['price'] = $item['price'];
                    $report['input'] = $item['quantity'];
                    $report['stock'] = $stock['quantity'];
                    $report['total_money'] = $report['price']*$report['input'];
                    $this->db->insert('report', $report);
                }
            }

            if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
                echo $this->messages = "0";
            }
            else
            {
                $this->db->trans_commit();
                echo $this->messages = $id;
            }
        }else
            echo $this->messages = "0";
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

    public function cms_del_temp_import($id)
    {
        $id = (int)$id;
        $input = $this->db->from('input')->where('ID', $id)->get()->row_array();
        $store_id = $input['store_id'];
        $this->db->trans_begin();
        $user_init = $this->auth['id'];
        if (isset($input) && count($input)) {
            if($input['input_status']==1){
                $list_products = json_decode($input['detail_input'], true);
                foreach ($list_products as $item) {
                    $inventory_quantity = $this->db->select('quantity')->from('inventory')->where(['store_id'=>$store_id,'product_id'=>$item['id']])->get()->row_array();
                    if(!empty($inventory_quantity)){
                        $this->db->where(['store_id'=>$store_id,'product_id'=>$item['id']])->update('inventory', ['quantity'=>$inventory_quantity['quantity']-$item['quantity'],'user_upd'=>$user_init]);
                    }
                    else{
                        $inventory = ['store_id'=>$store_id,'product_id'=>$item['id'],'quantity'=>-$item['quantity'],'user_init'=>$user_init];
                        $this->db->insert('inventory', $inventory);
                    }

                    $product = $this->db->select('prd_sls')->from('products')->where('ID', $item['id'])->get()->row_array();
                    $sls['prd_sls'] = $product['prd_sls'] - $item['quantity'];
                    $this->db->where('ID', $item['id'])->update('products', $sls);
                }

                $this->db->where('ID', $id)->update('input', ['deleted' => 1,'user_upd' => $user_init]);
            }else
            {
                $this->db->where('ID', $id)->update('input', ['deleted' => 1,'user_upd' => $user_init]);
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

    public function cms_del_import($id)
    {
        $id = (int)$id;
        $input = $this->db->from('input')->where(['ID' => $id, 'deleted' => 1])->get()->row_array();
        $this->db->trans_begin();
        if (isset($input) && count($input)) {
            $this->db->where('ID', $id)->update('input', ['deleted' => 2,'user_upd' => $this->auth['id']]);
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

    public function cms_paging_input($page = 1)
    {
        $option = $this->input->post('data');
        $total_imports = 0;
        $config = $this->cms_common->cms_pagination_custom();
        $option['date_to'] = date('Y-m-d', strtotime($option['date_to'] . ' +1 day'));
        if ($option['option1'] == '0') {
            if($option['date_from']!='' && $option['date_to']!=''){
                $total_imports = $this->db
                    ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) as total_debt')
                    ->from('input')
                    ->where(['deleted' => 0])
                    ->where('input_date >=',$option['date_from'])
                    ->where('input_date <=',$option['date_to'])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->row_array();
                $data['_list_imports'] = $this->db
                    ->from('input')
                    ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                    ->order_by('created', 'desc')
                    ->where(['deleted' => 0])
                    ->where('input_date >=',$option['date_from'])
                    ->where('input_date <=',$option['date_to'])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->result_array();
            }else{
                $total_imports = $this->db
                    ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) as total_debt')
                    ->from('input')
                    ->where(['deleted' => 0])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->row_array();
                $data['_list_imports'] = $this->db
                    ->from('input')
                    ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                    ->order_by('created', 'desc')
                    ->where(['deleted' => 0])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->result_array();
            }
        } else if ($option['option1'] == '1') {
            if($option['date_from']!='' && $option['date_to']!=''){
                $total_imports = $this->db
                    ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) as total_debt')
                    ->from('input')
                    ->where(['deleted' => 1])
                    ->where('input_date >=',$option['date_from'])
                    ->where('input_date <=',$option['date_to'])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->row_array();
                $data['_list_imports'] = $this->db
                    ->from('input')
                    ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                    ->order_by('created', 'desc')
                    ->where(['deleted' => 1])
                    ->where('input_date >=',$option['date_from'])
                    ->where('input_date <=',$option['date_to'])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->result_array();
            }else{
                $total_imports = $this->db
                    ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) as total_debt')
                    ->from('input')
                    ->where(['deleted' => 1])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->row_array();
                $data['_list_imports'] = $this->db
                    ->from('input')
                    ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                    ->order_by('created', 'desc')
                    ->where(['deleted' => 1])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->result_array();
            }
        } else if ($option['option1'] == '2') {
            if($option['date_from']!='' && $option['date_to']!=''){
                $total_imports = $this->db
                    ->select('count(ID) as quantity, sum(total_money) as total_money, sum(lack) as total_debt')
                    ->from('input')
                    ->where(['deleted' => 0,'lack >' =>0])
                    ->where('input_date >=',$option['date_from'])
                    ->where('input_date <=',$option['date_to'])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->row_array();
                $data['_list_imports'] = $this->db
                    ->from('input')
                    ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                    ->order_by('created', 'desc')
                    ->where(['deleted' => 0,'lack >' =>0])
                    ->where('input_date >=',$option['date_from'])
                    ->where('input_date <=',$option['date_to'])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->result_array();
            }else{
                $total_imports = $this->db
                    ->from('input')
                    ->where(['deleted' => 0,'lack >' =>0])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->row_array();
                $data['_list_imports'] = $this->db
                    ->from('input')
                    ->limit($config['per_page'], ($page - 1) * $config['per_page'])
                    ->order_by('created', 'desc')
                    ->where(['deleted' => 0,'lack >' =>0])
                    ->where("(input_code LIKE '%" . $option['keyword'] . "%')", NULL, FALSE)
                    ->get()
                    ->result_array();
            }
        }

        $config['base_url'] = 'cms_paging_input';
        $config['total_rows'] = $total_imports['quantity'];
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $_pagination_link = $this->pagination->create_links();
        $data['total_imports'] = $total_imports;
        $data['auth_name'] = $this->auth['display_name'];
        if ($page > 1 && ($total_imports['quantity'] - 1) / ($page - 1) == 10)
            $page = $page - 1;

        $data['option'] = $option['option1'];
        $data['page'] = $page;
        $data['_pagination_link'] = $_pagination_link;
        $this->load->view('ajax/imports/list_imports', isset($data) ? $data : null);
    }

    public function cms_print_input()
    {
        if ($this->auth == null)
            $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');

        $data_post = $this->input->post('data');
        $data_template = $this->db->select('content')->from('templates')->where('id', $data_post['id_template'])->limit(1)->get()->row_array();
        $data_input = $this->db->from('input')->where('id', $data_post['id_input'])->limit(1)->get()->row_array();
        $supplier_name = '';
        if ($data_input['supplier_id'] != null)
            $supplier_name = cms_getNamesupplierbyID($data_input['supplier_id']);

        $user_name = '';
        if ($data_input['supplier_id'] != null)
            $user_name = cms_getNameAuthbyID($data_input['user_init']);

        $data_template['content'] = str_replace("{Ten_Cua_Hang}", "Phong Tran", $data_template['content']);
        $data_template['content'] = str_replace("{Ngay_Nhập}", $data_input['input_date'], $data_template['content']);
        $data_template['content'] = str_replace("{Nha_Cung_Cap}", $supplier_name, $data_template['content']);
        $data_template['content'] = str_replace("{Thu_Ngan}", $user_name, $data_template['content']);
        $data_template['content'] = str_replace("{Tong_Tien_Hang}", $this->cms_common->cms_encode_currency_format($data_input['total_price']), $data_template['content']);
        $data_template['content'] = str_replace("{Chiec_Khau}", $this->cms_common->cms_encode_currency_format($data_input['discount']), $data_template['content']);
        $data_template['content'] = str_replace("{Tong_Tien}", $this->cms_common->cms_encode_currency_format($data_input['total_money'] - $data_input['discount']), $data_template['content']);
        $data_template['content'] = str_replace("{Tra_Tien}", $this->cms_common->cms_encode_currency_format($data_input['payed']), $data_template['content']);
        $data_template['content'] = str_replace("{Con_No}", $this->cms_common->cms_encode_currency_format($data_input['lack']), $data_template['content']);
        $data_template['content'] = str_replace("{Ma_Phieu_Nhap}", $data_input['input_code'], $data_template['content']);
        $data_template['content'] = str_replace("{Ghi_Chu}", $data_input['notes'], $data_template['content']);
        $data_template['content'] = str_replace("{So_Tien_Bang_Chu}", $this->convert_number_to_words($data_input['lack']), $data_template['content']);

        $detail ='';
        $number = 1;
        if (isset($data_input) && count($data_input)) {
            $list_products = json_decode($data_input['detail_input'], true);
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
                            <td style="text-align:center;"><strong > SL</strong ></td >
                            <td style="text-align:center;"><strong > Thành tiền</strong ></td >
                        </tr >'.$detail.'
                    </tbody >
                 </table >';

        $data_template['content'] = str_replace("{Chi_Tiet_San_Pham}", $table, $data_template['content']);

        echo $this->messages = $data_template['content'];
    }

    public function cms_edit_import()
    {
        if ($this->auth == null) $this->cms_common_string->cms_redirect(CMS_BASE_URL . 'backend');
        $id = $this->input->post('id');
        $import = $this->db->from('input')->where('ID', $id)->get()->row_array();
        $data['_list_products'] = array();

        if (isset($import) && count($import)) {
            $list_products = json_decode($import['detail_input'], true);

            foreach ($list_products as $product) {
                $_product = cms_finding_productbyID($product['id']);
                $_product['quantity'] = $product['quantity'];
                $_product['price'] = $product['price'];
                $data['_list_products'][] = $_product;
            }
        }

        $data['data']['_import'] = $import;
        $this->load->view('ajax/imports/edit_import', isset($data) ? $data : null);
    }
}

