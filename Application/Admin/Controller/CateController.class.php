<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController {
	//栏目列表
	public function lst() {
		$cate = M('Cate');
		$count = $cate->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$condition['status'] = 1; 
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $cate->order('id ASC')->limit($limit)->where($condition)->select();
		$this->assign('list',$list);	
		$this->assign('page',$show);

		$this->display();
	}
	//查询操作
	public function search() {
		$data = I('keywords');
		if(empty($data)) {
			echo "<script>alert('输入不能为空，请重新输入！');history.go(-1);</script>";
		}else{
			$keywords = '%' . $data . '%';
			$cate = D('Cate');
			$map['catename'] = array('like', $keywords);
			$list = $cate->where($map)->select();
			$this->assign('list', $list);
		}
		$this->display('lst');
	}
	//新增栏目
	public function add() {
		$cate = D('Cate');
		if(IS_POST) {
			$data['catename'] = I('catename');
			if($cate->create($data)){
				if($cate->add()){
					$this->success('栏目添加成功！',U('lst'));
				}else{
					$this->error('栏目添加失败！');
				}
			}else {
				$this->error($cate->getError());
			}
			return;
		}
		$this->display();	
	}

	//栏目编辑
	public function edit() {
		$cate = D('Cate');
		if(IS_POST) {
			$data['catename'] = I('catename');
			$data['id'] = I('id');
			if($cate->create($data)) {
				if($cate->save()) {
					$this->success('栏目修改成功！',U('lst'));
				}else {
					$this->error('栏目修改失败!');
				}
			}else {
				$this->error($cate->getError());
			}
			return;
		}
		$cates = $cate->find(I('id'));
		$this->assign('cates',$cates);
		$this->display();
	}
	//删除栏目到回收站
	public function toTrach() {
		$cate = M('Cate');
		$map['id'] = I('id');
		$update = $cate->where($map)->setField('status','0');
		if($update) {
			$this->success('删除到回收站成功',U('Cate/trach'));
		}else {
			$this->error('删除失败！');
		}
	}
	//彻底删除
	public function del() {
		$cate = M('Cate');
		$id = I('id');
		if($cate->delete($id)) {
			$this->success('栏目删除成功！',U('trach'));
		}else {
			$this->error('栏目删除失败！');
		}
	}
	//彻底批量删除
	public function delall() {
		//var_dump($_POST);
		$cate = M('Cate');
		$ids = I('ids');
		$ids = implode(',', $ids);
		if($ids){
			if($cate->delete($ids)) {
				$this->success('批量删除栏目成功！',U('trach'));
			}else{
				$this->error('批量删除栏目失败！');
			}
		}else {
			$this->error('未选中任何内容');
		}
		
	}
	//还原到栏目列表
	public function tolst() {
		$cate = M('Cate');
		$map['id'] = I('id');	
		$update = $cate->where($map)->setField('status','1');
		if($update) {
			$this->success('还原成功',U('Cate/lst'));
		}else {
			$this->error('还原失败失败！');	
		}
	}
	//回收站列表
	public function trach() {
		$cate = M('Cate');
		$count = $cate->count();
		$Page = new \Think\Page($count,20);
		$show = $Page->show();
		$condition['status'] = 0; 
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $cate->order('id ASC')->limit($limit)->where($condition)->select();
		$this->assign('list',$list);	
		$this->assign('page',$show);

		$this->display();
	}
	//排序操作
	public function sort() {
		$cate = M('cate');
        foreach ($_POST as $id => $sort) {
            $cate->where(array('id'=>$id))->setField('sort',$sort); //setField用于更行字段
        }
        $this->success('排序成功！',U('lst'));
	}
}