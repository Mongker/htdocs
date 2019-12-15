<?php
/*
 * CMS_Controller will load first width param default of cms
 */
class CMS_Controller extends CI_Controller{

    public function __construct(){

        parent::__construct();
        date_default_timezone_set("Asia/Saigon");

    }

}