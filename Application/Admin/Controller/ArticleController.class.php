<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
	public function lst() {
        $article = D('ArticleView');
        $count = $article->count();
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $limit = $Page->firstRow.','.$Page->listRows;
        $condition['status'] = 1;
        $list = $article->order('cateid ASC')->limit($limit)->where($condition)->select();
        $this->assign('list', $list);
        $this->assign('page', $show);

		$this->display();
	}

    public function trach() {
        $article = D('ArticleView');
        $count = $article->count();
        $Page = new \Think\Page($count, 10);
        $show = $Page->show();
        $limit = $Page->firstRow.','.$Page->listRows;
        $condition['status'] = 0;
        $list = $article->order('id DESC')->limit($limit)->where($condition)->select();
        $this->assign('list', $list);
        $this->assign('page', $show);

        $this->display();
    }

	public function add() {
		$article = D('Article');
		if(IS_POST) {
			$data['title'] = I('post.title');
			$data['author'] = I('post.author');
			$data['rental'] = I('post.rental'); 
			$data['num'] = I('post.num');
			$data['cateid'] = I('post.cateid');
			$data['content'] = I('post.content');
			$data['recommend'] = I('post.recommend');
			$data['date'] = time();
			if($_FILES['pic']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Public/Uploads/'; // 设置附件上传目录
                $upload->rootPath = './'; // 设置附件上传根目录
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {
                    $this->error($upload->getError());
                }else{
                   $data['pic'] = $info['savepath'].$info['savename'];
                }
            }
            if($article->create($data)) {
            	if($article->add()) {
            		$this->success('添加文章成功！',U('lst'));
            	}else {
            		$this->error('添加文章失败！');
            	}
            }else {
            	$this->error($article->getError());
            }
            return;
		}

		$cate = D('Cate')->where('status=1')->select();
		$this->assign('cate',$cate);	
		$this->display();
	}

    public function edit() {
        $article = D('Article');
        if(IS_POST) {
            $data['id']  = I('post.id');
            $data['title'] = I('post.title');
            $data['author'] = I('post.author');
            $data['rental'] = I('post.rental'); 
            $data['num'] = I('post.num');
            $data['cateid'] = I('post.cateid');
            $data['content'] = I('post.content');
            $data['recommend'] = I('post.recommend');
            $data['date'] = time();
            if($_FILES['pic']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Public/Uploads/'; // 设置附件上传目录
                $upload->rootPath = './'; // 设置附件上传目录
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {
                    $this->error($upload->getError());
                }else{
                   $data['pic'] = $info['savepath'].$info['savename'];
                }
            }
            if($article->create($data)) {
                if($article->save()) {
                    $this->success('修改文章成功！',U('lst'));
                }else {
                    $this->error('修改文章失败！');
                }
            }else {
                $this->error($article->getError());
            }
            return;
        }

        $articles = $article->find(I('get.id'));
        $this->assign('articles',$articles);
        $cates = D('Cate')->select();
        $this->assign('cates', $cates);
        $this->display();
    }

    public function toTrach() {
        $article = M('Article');
        $map['id'] = I('get.id');
        $update = $article->where($map)->setField('status','0');
        if($update) {
            $this->success('删除到回收站成功',U('Article/trach'));
        }else {
            $this->error('删除失败！');
        }
    }

    public function del() {
        $article = M('Article');
        $id = I('get.id');
        if($article->delete($id)) {
            $this->success('文章删除成功！',U('trach'));
        }else {
            $this->error('文章删除失败！');
        }
    }

    public function delall() {
        $article = M('Article');
        $ids = I('post.ids');
        $ids = implode(',', $ids);
        if($ids) {
            if($article->delete($ids)) {
                $this->success('批量删除文章成功！',U('trach'));
            }else{
                $this->error('批量删除文章失败！');
            }
        }else {
            $this->error('未选中任何内容');
        }
    }

    public function tolst() {
        $article = M('Article');
        $map['id'] = I('get.id');
        $update = $article->where($map)->setField('status','1');
        if($update) {
            $this->success('还原成功',U('Article/lst'));
        }else {
            $this->error('还原失败失败！');    
        }
    }

    public function search() {
        $data = I('post.keywords');
        if(empty($data)) {
            echo "<script>alert('输入不能为空，请重新输入！');history.go(-1);</script>";
        }else{
            $keywords = '%' . $data . '%';
            $cate = D('ArticleView');
            $map['title'] = array('like', $keywords);
            $list = $cate->where($map)->select();
            $this->assign('list', $list);
        }
        $this->display('lst');
    }
}