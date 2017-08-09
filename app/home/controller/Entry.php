<?php
namespace app\home\controller;
//houdunwang\core\命名空间下的Controller类
use houdunwang\core\Controller;
//houdunwang\\命名空间下的View类
use houdunwang\view\View;
//houdunwang\model\命名空间下的Model类
use houdunwang\model\Model;

class Entry extends Controller {
//    首页
	public function index(){
//	    获取数据库的信息存到变量$data里面
		$data = Model::q("SELECT * FROM arc");
//  	对象执行制作模板方法
		return View::with(compact('data','aid'))->make();
	}

//	添加
	public function add(){
//	    判断是否提交
		if(IS_POST){
//		    $aql操作
			$sql = "INSERT INTO arc (title) VALUES ('{$_POST['title']}')";
			Model::e($sql);
//			返回添加后的提示性文字
			return $this->success('添加成功!')->setRedirect('index.php');
		}
//		返回一个对象，是为了toString输出一个对象时载入模板
		return View::make();
	}

//    删除
	public function remove(){
//        $sql 操作
		$sql = "DELETE FROM arc WHERE aid=" . $_GET['aid'];
		Model::e($sql);
//		返回删除后的提示性的文字
		return $this->success('删除成功!');
	}
}