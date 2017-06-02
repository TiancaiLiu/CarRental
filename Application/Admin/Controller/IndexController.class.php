<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\IndexModel;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
    public function logout() {
    	session_destroy();
    	$this->success('退出成功，正在跳转中...', U('Login/index'));
    }
    public function cache() {
    	$index = new IndexModel();
    	$rtim = $index->del_dir(SITE_URL.'/Admin/Runtime');
    	if($rtim) {
    		$this->success('缓存清除成功！',U('index'));
    	}else {
    		$this->error('缓存清除失败！');
    	}
    }

}