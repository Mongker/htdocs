<?php
Class Order_model extends MY_Model
{
    var $table = 'order';
    /*
     * Lay danh sach don hang
     */
    public function get_list($input = array())
    {
        $this->db->select('order.*,
			                    product.name AS product_name,product.price,product.discount,product.image_link
								,transaction.status as transaction_status, transaction.user_id, transaction.created, transaction.amount AS transaction_amount
						  ');
        $this->get_list_set_input($input);
    
        $this->db->from('order');
        $this->db->join('transaction', 'order.transaction_id = transaction.id');
        $this->db->join('product', 'order.product_id = product.id');
    
        $query = $this->db->get();
    
        return $query->result();
    }
    
    /*
     * Láy tổng số đơn hàng
     */
    public function get_total($input = array())
    {
        $this->db->select('order.*,
			                    product.name AS product_name,product.price,product.discount,product.image_link
								,transaction.status as transaction_status, transaction.user_id, transaction.created, transaction.amount AS transaction_amount
						  ');
        $this->get_list_set_input($input);
    
        $this->db->from('order');
        $this->db->join('transaction', 'order.transaction_id = transaction.id');
        $this->db->join('product', 'order.product_id = product.id');
    
        $query = $this->db->get();
    
        return $query->num_rows();
    }
}