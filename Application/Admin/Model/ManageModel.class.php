<?php 
namespace Admin\Model;
use Think\Model;
class ManageModel extends Model{
	protected $_validate = array(
			//新增管理员自动验证
			array('username','require','管理员名称不得为空！',1,'regex',3),
			array('username','','管理员名称已经存在！',0,'unique',1),
			array('password','require','密码不得为空！',1,'regex',1),
			array('repassword','password','两侧输入密码不一致，请重新输入',0,'confirm'),
			//登录时自动验证
			array('username','require','管理员名称不得为空！',1,'regex',4),
			array('password','require','密码不得为空！',1,'regex',4),
		);

	public function login() {
		$password = $this->password; //password为表单传递的值
		$where = array('username' => $this->username); //username为表单传递的值
		$info = $this->where($where)->find();
		if($info) {
			if($info['password'] == sha1(md5($password))) {
				session('id', $info['id']); //将id和username传递到后台首页，可以实现判断是否通过账号密码登录
				session('username', $info['username']);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


}