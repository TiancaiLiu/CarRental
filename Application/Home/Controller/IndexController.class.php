<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){ 
    	$article = D('Article');
    	$msg = D('Message');
    	$carlist = $article->field('id,title,rental,pic')->order('id ASC')->where('cateid=7')->limit(4)->select();
    	$msglist = $msg->field('id,title,date')->order('id desc')->where('checked=1')->limit(5)->select();
    	$activity = $article->field('id,title,pic,content,date')->order('id ASC')->where('cateid=6')->limit(4)->select();
    	$money =  $article->field('id,title,date')->order('id ASC')->where('cateid=5')->limit(5)->select();
    	$this->assign('money', $money);
    	$this->assign('activity', $activity);
    	$this->assign('msglist', $msglist);
    	$this->assign('carlist', $carlist);
    	$this->display();
    }
}