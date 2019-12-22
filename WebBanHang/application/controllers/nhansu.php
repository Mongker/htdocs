<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getAllData() ;
		$ketqua = $name = ['mangketqua' => $ketqua];

		// truyền dữ liệu sang view 
 		$this->load->view('nhansu_view', $ketqua);
		//$this->load->view('nhansu_view.php');
	}
	public function nhansu_add()
	{
		
		
		// Xử  lý file ảnh 
		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			}

			// Check if file already exists
			// if (file_exists($target_file)) {
			// 	echo "Ảnh đã tồn tại rồi nhé ! ";
			// 	$uploadOk = 0;
			// }
			// Check file size
			if ($_FILES["anhavatar"]["size"] > 5000000) {
				echo "Ảnh quá nặng không thể tải lên .";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
				echo "Chỉ chấp nhận file ảnh";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
						// echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
				} else {
						echo "Sorry, there was an error uploading your file.";
				}
			}

			// Lấy dữ liệu từ view 
			$ten       = $this->input->post('ten');
			$tuoi      = $this->input->post('tuoi');
			$sdt       = $this->input->post('sdt');
			$linkfb    = $this->input->post('linkfb');
			$anhavatar = base_url().'img/'.basename($_FILES["anhavatar"]["name"]) ;

			//	echo 'Null'.$sodonnhang;
		
			//Gọi model
	    	$this->load->model('nhansu_model');
	  	    if ( $anhavatar ) {
	  	    	$this->nhansu_model->insertData( $anhavatar , $ten, $tuoi, $sdt, $linkfb);
	  	        $this->load->view('quaylai_view');
	   		 }else {
	    		echo 'Thất bại xem lại code thôi ';
	   	 }
	} // hết function nhansu_add

    public function sua_nhansu($idvaotuview)
    {
    	$this->load->model('nhansu_model');
    	$ketqua = $this->nhansu_model->getDateByID($idvaotuview); // Đưa vào id lấy ra dữ liệu
    	$ketqua =$name = ['dulieuketqua' =>$ketqua ]; // biến đổi dữ liệu thành mảng
        $this->load->view('sua_nhansu_view', $ketqua); // đưa dữ liệu qua view 


    } // function sủa_nhans
    
    public function update_nhansu()
    {
    	// Lấy dữ liệu từ view 
    	$id        = $this->input->post('id');
		$ten       = $this->input->post('ten');
		$tuoi      = $this->input->post('tuoi');
		$sdt       = $this->input->post('sdt');
		$linkfb    = $this->input->post('linkfb');

		// Xử ý ảnh update
		    $target_dir = "img/";
			$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			}

			// Check if file already exists
			// if (file_exists($target_file)) {
			// 	echo "Ảnh đã tồn tại rồi nhé ! ";
			// 	$uploadOk = 0;
			// }
			// Check file size
			if ($_FILES["anhavatar"]["size"] > 5000000) {
				echo "Ảnh quá nặng không thể tải lên .";
				$uploadOk = 0;
			}
			// Allow certain file formats
			// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
			// 	echo "Chỉ chấp nhận file ảnh";
			// 	$uploadOk = 0;
			// }
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				//echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
						// echo "The file ". basename( $_FILES["anhavatar"]["name"]). " has been uploaded.";
				} else {
					  //	echo "Sorry, there was an error uploading your file.";
				}
			}

		   	$anhavatar =basename($_FILES["anhavatar"]["name"]);

			//Kiểm tra ảnh cũ hay ảnh mới 
			if ($anhavatar) {
				 $anhavatar = base_url().'img/'.$_FILES["anhavatar"]["name"] ;;
			}else {
				 $anhavatar = $this->input->post('anhavatar2');
			}

			// Gọi model ra
			$this->load->model('nhansu_model');
			$this->nhansu_model->getDateByIDEdit( $id ,$anhavatar , $ten, $tuoi, $sdt, $linkfb);
            $this->load->view('quaylai_view');
		    
    }

    public function xoa_nhansu($id)
    {
    	$this->load->model('nhansu_model');
    	$this->nhansu_model-> getDateByIDDelete($id);
    	$this->load->view('quaylai_view');
    }

    public function ajax_add()
    {
    	// Lấy dữ liệu từ view 
			$ten       = $this->input->post('ten');
			$tuoi      = $this->input->post('tuoi');
			$sdt       = $this->input->post('sdt');
			$linkfb    = $this->input->post('linkfb');
			$anhavatar = "http://localhost/WebBanHang/img/icon.jpg" ;
			
	  	    if ( $this->load->model('nhansu_model') ) {
	  	    	$this->nhansu_model->insertData( $anhavatar , $ten, $tuoi, $sdt, $linkfb);
	  	        $this->load->view('quaylai_view');
	   		 }else {
	    		echo 'Thất bại xem lại code thôi ';
	   		}
    }


	
}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */