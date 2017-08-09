<?php
namespace houdunwang\core;

//创建类 Entry继承这个类里面的方法
class Controller {
//    定义私有变量传递，默认返回地址
	private $url = 'window.history.back()';
//	定义一个变量，来储存地址template
	private $template;
	private $msg;

//	跳转
//	创建一个跳转方法，默认返回上一级
	protected function setRedirect($url){
		$this->url = "location.href='{$url}'";
//		向Entry返回一个对象
		return $this;
	}

//	成功时
	protected function success($msg){
//		保存子类传来的提示语，返回
		$this->msg = $msg;
//		要跳转的页面
		$this->template = './view/success.php';
//		返回一个对象
		return $this;
	}

//	失败时
	protected function error($msg){
//		保存子类传来的提示语，返回
		$this->msg = $msg;
//		要跳转的界面
		$this->template = './view/error.php';
//		返回一个对象
		return $this;
	}

	public function __toString() {
		include $this->template;
//		返回一个空数组 ，因为这个方法必须反回字符串
		return '';
	}
}