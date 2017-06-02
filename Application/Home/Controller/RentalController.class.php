<?php
namespace Home\Controller;
use Think\Controller;
class RentalController extends CommonController {
	public function index() {
		$cateid = I('get.cateid');
		$article = D('Article');
		$condition['cateid'] = $cateid;
		$data = $article->where($condition)->find();
		$rent = htmlspecialchars_decode($data['content']);
		$this->assign('rent',$rent);
		$this->display();
	}
}