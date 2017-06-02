<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends CommonController {
	public function index() {
		$cateid = I('get.cateid');
		$article = D('Article');
		$condition['cateid'] = $cateid;
		$data = $article->where($condition)->find();
		$img = $data['pic'];
		$contact = htmlspecialchars_decode($data['content']);
		$this->assign('contact',$contact);
		$this->assign('img',$img);
		$this->display();
	}
}