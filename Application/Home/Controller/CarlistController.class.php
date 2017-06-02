<?php
namespace Home\Controller;
use Think\Controller;
class CarlistController extends CommonController {
	public function index() {
		$cateid = I('get.cateid');
		$article = D('Article');
		$condition['cateid'] = $cateid;
		$count = $article->where($condition)->count();
		$this->assign('count', $count);
		$this->display();
	}
	public function getList($p) {
		$perpage = 2;
		$offset = ($p-1) * $perpage;
		$query = "SELECT * FROM `cs_article` WHERE cateid=7 LIMIT $offset,$perpage";
		$article = M('Article');
		$data = $article->query($query);
		echo json_encode($data);
	}
}