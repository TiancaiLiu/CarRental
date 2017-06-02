<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends CommonController {
	public function index() {
		$this->display();
	}
	public function getList($p) {
		$perpage = 5;
		$offset = ($p-1) * $perpage;
		$sql1 = "SELECT * FROM `cs_message` WHERE checked=1 LIMIT $offset,$perpage";
		$sql2 = "SELECT * FROM `cs_reply`";
		$msg = D('Message');
		$rep = M('Reply');
		$data['msg'] = $msg->query($sql1);
		$data['reply'] = $rep->query($sql2);
		foreach($data['msg'] as $k => $v) {
			$msges .=<<<HTMLSTR
			<li>
				<div>{$v['username']}留言:</div>
				<div>　{$v['content']}</div>
HTMLSTR;
			foreach ($data['reply'] as $k1 => $v1) {
				if($v1['mid']==$v['id']) {
					$msges .=<<<HTMLSTR
						<h2 class="common_color">盘古客服: {$v1['content']}</h2>
HTMLSTR;
				}
			}
		$msges .=<<<HTMLSTR
		</li>
HTMLSTR;
		}
		echo json_encode($msges);
	}


	public function addmsg() {
		$msg = D('Message');
		if(IS_POST) {
			$data['title'] = I('post.title');
			$data['username'] = I('post.username');
			$data['phone'] = I('post.phone');
			$data['email'] = I('post.email');
			$data['content'] = I('post.content');
			$data['date'] = time();
			if($msg->create($data)) {
				if($msg->add()) {
					$this->success('留言成功，请等待审核！', U('index'));
				}else {
					$this->error('留言失败!');
				}
			}else {
				$this->error($msg->getError());
			}
			return;
		}
		$this->display();
	}
	
	public function verify() {
		$Verify = new \Think\Verify();
		$Verify->length = 4;
		$Verify->fontSize = 40;
		$Verify->entry();
	}
}