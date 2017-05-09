<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Common\Controller\AdminController;
class IndexController extends AdminController {

    public function index(){
    	
        $this->display("./index");
    }

}