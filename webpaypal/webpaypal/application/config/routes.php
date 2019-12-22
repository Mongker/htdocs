<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//dùng regex để rewrite lại đường dẫn tới controller product ngoài view
//nên xem kỹ document hướng dẫn về router của CI link: https://www.codeigniter.com/userguide3/general/routing.html
//nên tìm đọc các bài về rewrite url, regular expression php để hiểu được link dưới cũng như các ký tự
//tại sao mình không làm link vd: https://www.phukienchinhhang.com/gia-do-de-kep/gia-do-dien-thoai-gan-khe-may-lanh.html
//hoặc link  https://www.phukienchinhhang.com/gia-do-dien-thoai-gan-khe-may-lanh.html 
//cho gọn mà phải làm như phía dưới (có thêm id ở sau cùng). Vì bác Tuyền người làm cái seri này không có hướng dẫn các bạn
//tạo slug cho product và category nên bây giờ mình làm chữa cháy cho các bạn hiểu.
/*
	tại đường dẫn: webproduct\application\views\site\home\index.php
	các bạn sẽ thấy mình echo ra dạng link như sau: <?php echo base_url($slug_product . '-' . $row->id . '.html')?>
	cái $slug_product được tạo ra bằng : <?php $slug_product = str_slug($row->name); ?>
	hàm str_slug nằm ở helper webproduct\application\helpers\common_helper.php
	hàm này tạo ra name của sản phẩm không dấu đồng thời thêm dấu "-" vào mỗi khoảng trắng.
	sau khi echo ra url cả sản phẩm thì nó có dạng: webproduct/tivi-lg-520.html tương ứng với rewrite ở phía dưới: $route['([A-Za-z0-9_-]+)-(:num).html'] = 'product/view/$2';
	nó sẽ tự động lấy cái biến (:num) được quy ước bằng $2 bỏ vào function view trong controller product webproduct\application\controllers\Product.php
	lúc này function không cần sài cái này nữa $id = $this->uri->rsegment(3);
*/
$route['([A-Za-z0-9_-]+)-(:num).html'] = 'product/view/$2';

$route['san-pham/page/(:num)'] = 'rewrite/index/$1';
$route['san-pham'] = 'rewrite/index';
/*
	([A-Za-z0-9_-]+) được quy ước là $1
	(:num) được quy ước là $2 đơn giản vì nó ở vị trí thứ 2
*/
/*
	sau khi các bạn hiểu được cách rewrite url này rồi thì nên sửa lại source này như sau:
	tạo thêm 1 field slug_product trong table product
	khi thêm mới 1 sản phẩm thì dùng hàm str_slug tạo ra slug rồi lưu vào field slug_product luôn sau này ngoài frontend thì chỉ lấy ra sài chứ không phải tạo => giảm bớt xử lý
	khi sửa 1 sản phẩm cũng vậy.
	
	cũng nên tạo cho category y như product.
	
	lưu ý: khi tạo slug thì nó phải là duy nhất giống như id product vậy, thêm + sửa phải kiểm tra.	
	
	sau khi đã có slug product trong table product thì các bản có thể sửa lại như sau:
	$route['([A-Za-z0-9_-]+).html'] = 'product/view/$1';
	nó sẽ tự động lấy cái slug trên đường dẫn bỏ vào function view
	trong function view hàm get_info($id);
	thay vì get theo id các bạn tạo hàm mới lấy thông tin product theo slug. 
	where slug_product = với cái slug được truyền vào.
*/
