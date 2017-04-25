<?php
namespace Common\Controller;
use Think\Controller;
use Think\Auth;

class AuthController extends Controller
{
protected function _initialize(){
    $session_user=session(user);
    if (!$session_user) {
        $this->error('请先登录！正在跳转到登录页！', U('User/login'));
    }
}
}