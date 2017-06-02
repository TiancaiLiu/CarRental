<?php
namespace Admin\Controller;
use Think\Controller;
class JobController extends CommonController {
	public function lst() {
		$job = M('Job');
		$count = $job->count();
		$Page = new \Think\Page($count, 10);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $job->order('id DESC')->limit($limit)->select();
		$this->assign('list', $list);
		$this->assign('show', $show);
		$this->display();
	}

	public function detail() {
		$job = M('Job');
		$id = I('get.id');
		$jobs = $job->find($id);
		$this->assign('jobs',$jobs);
		$this->display();
	}

	public function del() {
		$job = M('Job');
		$id = I('get.id');
		if($job->delete($id)) {
			$this->success('求职信息删除成功！',U('lst'));
		}else {
			$this->error('求职信息删除失败！');
		}
	}

	public function delall() {
		$job = M('Job');
		$ids = I('post.ids');
		$ids = implode(',', $ids);
		if($ids){
			if($job->delete($ids)) {
				$this->success('批量删除求职信息成功！',U('lst'));
			}else{
				$this->error('批量删除求职信息失败！');
			}
		}else{
			$this->error('未选中任何内容');
		}
		
	}
}