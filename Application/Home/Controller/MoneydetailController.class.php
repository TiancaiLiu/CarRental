<?php
namespace Home\Controller;
use Think\Controller;
class MoneydetailController extends CommonController {
	public function index() {
		$id = I('get.id');
		$article = M('Article');
		$arts = $article->find($id);
		$this->assign('arts',$arts);
		//上一页
		$condition['cateid'] = array('eq',5);
		$condition['id'] = array('lt',$id);
		$uppage = $article->where($condition)->order('id DESC')->limit('1')->find();
		if($uppage) {
			$upurl = __CONTROLLER__.'/index/id/'.$uppage['id'];
			$uptitle = $uppage['title'];
		}else {
			$upurl = "javascript:void(0)";
			$uptitle = '没有了';
		}
		//下一页
		$map['cateid'] = array('eq',5);
		$map['id'] = array('gt',$id);
		$downpage = $article->where($map)->order('id ASC')->limit('1')->find();
		if($downpage) {
			$downurl = __CONTROLLER__.'/index/id/'.$downpage['id'];
			$downtitle = $downpage['title'];
		}else {
			$downurl = "javascript:void(0);";
			$downtitle = '没有了';
		}
		$this->assign('upurl',$upurl);
		$this->assign('uptitle',$uptitle);
		$this->assign('downurl',$downurl);
		$this->assign('downtitle',$downtitle);
		$this->display();
	}

}