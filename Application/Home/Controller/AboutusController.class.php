<?php
namespace Home\Controller;
use Think\Controller;
class AboutusController extends CommonController {
	public function index() {
		$cateid = I('get.cateid');
		$article = D('Article');
		$condition['cateid'] = $cateid;
		$data = $article->where($condition)->find();
		$aboutus = htmlspecialchars_decode($data['content']);
		$this->assign('aboutus',$aboutus);
		$this->display();
	}
}