<?php  
namespace Admin\Controller;
use Think\Controller;
Class ManageController extends CommonController{
	//管理员列表视图
	public function lst() {
		$admin = M('Manage');
		$count = $admin->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $admin->order('id DESC')->limit($limit)->select();
		$this->assign('list',$list);	
		$this->assign('page',$show);

		$this->display();
	}
	//管理员查询操作
	public function search() {
		$data = I('keywords');
		if(empty($data)) {
			echo "<script>alert('输入不能为空，请重新输入！');history.go(-1);</script>";
		}else{
			$keywords = '%' . $data . '%';
			$admin = D('Manage');
			$map['username'] = array('like', $keywords);
			$list = $admin->where($map)->select();
			$this->assign('list', $list);
		}
		$this->display('lst');
	}
	//添加管理员视图
	public function add() {
		$admin = D('Manage');
		if(IS_POST) {
			$data['username'] = I('username');
			$data['password'] = sha1(md5(I('password')));
			$data['repassword'] = sha1(md5(I('repassword')));
			if($admin->create($data)) {
				if($admin->add()) {
					$this->success('新增管理员成功！', U('lst'));
				}else {
					$this->error('新增管理员失败！');
				}
			}else {
				$this->error($admin->getError());
			}

			return;
		}
		$this->display();
	}
	//删除管理员操作
	public function del() {
		$admin = D('Manage');
		$id = I('id');
		if($id == 1){
            $this->error('该管理员是具有最高权限,无法删除！');
        }
		if($admin->delete($id)) {
			$this->success('删除管理员成功！',U('lst'));
		}else{
			$this->error('删除管理员失败！');
		}
	}
	//批量删除
	public function delall() {
		//var_dump($_POST);
		$admin = D('Manage');
		$ids = I('ids');
		$ids = implode(',', $ids);
		if($ids) {
			if($admin->delete($ids)) {
				$this->success('批量删除管理员成功！','lst');
			}else{
				$this->error('批量删除管理员失败！');
			}
		}else {
			$this->error('未选中任何内容');
		}
		
	}
	//管理员编辑
	public function edit() {
		$admin = D('Manage');
		if(IS_POST){
			$data['username'] = I('username');
			$data['id'] = I('id');
			$admin_s = $admin->find($data['id']);
			$password = $admin_s['password'];
			if(I('password')) {
				$data['password'] = sha1(md5(I('password')));
			}else{
				$data['password'] = $password;
			}
			if($admin->create($data)) {
				if($admin->save()) {
					$this->success('管理员修改成功！', 'lst');
				}else{
					$this->error('管理员修改失败！');
				}
			}else{
				$this->error($admin->getError());
			}
			return;
		}
		$admin_html = $admin ->find(I('id'));
		$this->assign('admin_html', $admin_html);
		$this->display();
	}
}