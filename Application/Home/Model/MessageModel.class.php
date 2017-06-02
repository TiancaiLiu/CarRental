<?php
namespace Home\Model;
use Think\Model;
class MessageModel extends Model {
	protected $_validate = array(
		array('title','require','标题不能为空！',1,'regex',3),
		array('username','require','姓名不能为空！',1,'regex',3),
		array('phone','require','标题不能为空！',1,'regex',3),
		array('email','require','标题不能为空！',1,'regex',3),
		array('content','require','标题不能为空！',1,'regex',3),
		//array('verify','check_verify','验证码错误!',1,'callback',3),
		);

	public function check_verify($code, $id = '') {    
		$verify = new \Think\Verify();    
		return $verify->check($code, $id);
	}
}