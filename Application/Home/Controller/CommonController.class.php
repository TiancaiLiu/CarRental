<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function __construct() {
		parent::__construct();
		$cateid = I('get.cateid');
		if($cateid) {
			$cate = M('Cate');
			$cates = $cate->field('catename')->find($cateid);
			$catename = $cates['catename'];
			$this->assign('catename', $catename);
		}
		$this->nav();
	}
	public function nav() {
		$cate = M('Cate');
		$cates = $cate->where('status=1')->order('sort ASC')->select();
		$this->assign('cates', $cates);
	}
}