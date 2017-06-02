<?php
namespace Admin\Controller;
use Think\Controller;
class MessageController extends CommonController {
	public function lst() {
		$msg = M('Message');
		$count = $msg->count();
		$Page = new \Think\Page($count, 20);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$map['status'] = 0;
		$list = $msg->order('id ASC')->where($map)->limit($limit)->select();
        $this->assign('list', $list);
        $this->assign('page', $show);
		$this->display();
	}
	public function trach() {
		$msg = M('Message');
		$count = $msg->count();
		$Page = new \Think\Page($count, 20);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$map['status'] = 1;
		$list = $msg->order('id ASC')->where($map)->limit($limit)->select();
        $this->assign('list', $list);
        $this->assign('page', $show);
		$this->display();
	}

	public function checked() {
		$msg = M('Message');
		if(IS_POST){
			$data['checked'] = I('post.checked');
			$data['id'] = I('post.id');
			if($msg->create($data)){
				if($msg->save()) {
					$this->success('审核通过', U('lst'));
				}else {
					$this->error('审核不予通过');
				}
			}else {
				$this->error($msg->getError());
			}
			return;
		}

		$id = I('get.id');
		$data = $msg->find($id);
		$this->assign('message', $data);
		$this->display();
	}

	public function reply() {
		$msg = M('Message');
		$reply = D('Reply');
		if(IS_POST) {
			$data['mid'] = I('post.mid');
			$data['content'] = I('post.content');
			$data['date'] = time();
			if($reply->create($data)) {
				if($reply->add()) {
					$this->success('留言回复成功！', U('lst'));
				}else {
					$this->error('留言回复失败！');
				}
			}else {
				$this->error($reply->getError());
			}

			return;
		}
		$id = I('get.id');
		$replylist = $reply->where("mid=$id")->select();
		$data = $msg->find($id);
		$this->assign('message', $data);
		$this->assign('replylist',$replylist);
		$this->display();
	}

	public function toTrach() {
        $article = M('Message');
        $map['id'] = I('get.id');
        $update = $article->where($map)->setField('status','1');
        if($update) {
            $this->success('删除到回收站成功',U('trach'));
        }else {
            $this->error('删除失败！');
        }
    }

    public function toTrachAll() {
    	$article = M('Message');
    	$ids = I('post.ids');
    	$ids = implode(',', $ids);
    	if($ids) {
    		$map['id'] = array('in', $ids);
    		$update = $article->where($map)->setField('status','1');
    		if($update) {
            	$this->success('批量删除到回收站成功',U('trach'));
        	}else {
            	$this->error('批量删除失败！');
        	}
    	}else {
    		 $this->error('未选中任何内容');
    	}
    	
    }

    public function toLst() {
        $article = M('Message');
        $map['id'] = I('get.id');
        $update = $article->where($map)->setField('status','0');
        if($update) {
            $this->success('还原成功',U('lst'));
        }else {
            $this->error('还原失败失败！');    
        }
    }
    public function del() {
    	$article = M('Message');
        $id = I('get.id');
        if($article->delete($id)) {
            $this->success('文章留言成功！',U('trach'));
        }else {
            $this->error('文章留言失败！');
        }
    }

    public function delall() {
        $article = M('Message');
        $ids = I('post.ids');
        $ids = implode(',', $ids);
        if($ids) {
            if($article->delete($ids)) {
                $this->success('批量删除留言成功！',U('trach'));
            }else{
                $this->error('批量删除留言失败！');
            }
        }else {
            $this->error('未选中任何内容');
        }
    }
}