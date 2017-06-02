<?php
namespace Home\Controller;
use Think\Controller;
class ReturnController extends CommonController {
	public function index() {
		$cateid = I('get.cateid');
		$article = D('Article');
		$condition['cateid'] = $cateid;
		$data = $article->where($condition)->find();
		$return = htmlspecialchars_decode($data['content']);
		$this->assign('return',$return);
		$this->display();
	}
}