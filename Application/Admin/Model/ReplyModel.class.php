<?php
namespace Admin\Model;
use Think\Model;
class ReplyModel extends Model {
	protected $_validate = array(
		array('content', 'require', '回复内容不得为空！',1,'regex',3),
		);
}