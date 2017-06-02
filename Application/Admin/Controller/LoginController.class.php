<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function index() {
		$admin = D('Manage');
		if(IS_POST) {
			if($admin->create($_POST,4)) {
				if($admin->login()) {
					$this->success('登录成功，正在跳转中...',U('Index/index'));
				}else {
					$this->error('您输入的用户名或密码有误，请重新输入！');
				}
			}else {
				$this->error($admin->getError());
			}

			return;
		}
		$this->display();
	}
}