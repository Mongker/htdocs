
<?php
class Rewrite extends CI_Controller 
{
        public function index($page = '')
        {
                echo '<h1>Home page</h1>';
                echo 'Page: ', $page;
        }
 
        public function category($cate_slug = '', $page = '')
        {
                echo '<h1>Category page</h1>';
                echo 'Slug: ', $cate_slug, '<br/>';
                echo 'Page: ', $page, '<br/>';
        }
 
        public function tag($tag_slug = '', $page = '')
        {
                echo '<h1>Tag page</h1>';
                echo 'Slug: ', $tag_slug, '<br/>';
                echo 'Page: ', $page, '<br/>';
        }
 
        public function detail($post_slug = '', $post_id = '')
        {
                echo '<h1>Detail page</h1>';
                echo 'Slug: ', $post_slug, '<br/>';
                echo 'ID: ', $post_id, '<br/>';
        }

}