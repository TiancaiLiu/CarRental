<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends CommonController {
	public function index() {
		$article = D('Article');
		$kw = I('post.kws');
		$keywords = '%' . $kw . '%';
		$condition['title'] = array('like', $keywords);
		$condition['cateid'] = array('eq',7);
		$count = $article->where($condition)->count();
		$this->assign('count', $count);
		$this->display();
	}

	public function getList($p,$kws) {
		$perpage = 2;
		$offset = ($p-1) * $perpage;
		$sql = "SELECT * FROM `cs_article` WHERE title LIKE '%$kws%' AND cateid=7 LIMIT $offset,$perpage";
		$article = M('Article');
		$data = $article->query($sql);
		echo json_encode($data);
	}
}