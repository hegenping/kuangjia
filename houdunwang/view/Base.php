<?php
namespace houdunwang\view;


class Base {
	//保存分配变量的属性，默认是空数组
	private $data = [];
	//模板路径
	private $template;


//	 分配变量
	public function with($data){
//		数据库通过参数传来的数据存入$this->data属性
		$this->data = $data;
//		返回当前对象
		return $this;
	}

//	 制作模板

	public function make(){
//		组合模板路径
		$this->template = '../app/' . APP . '/view/' . CONTROLLER . '/' . ACTION . '.php';
		//1.返回当前对象，
		//(1)返给\houdunwang\view\View里面的__callStatic
		//(2)View里面的__callStatic再返回给\app\home\controller\Entry里面的index方法(View::make())
		//(3)Entry里面的index方法又返回给\houdunwang\core\Boot里面的appRun方法，在appRun方法用了echo 输出这个对象
		//2.为了触发__toString
		return $this;
	}


//	  载入模板
//		创建此方法是为了链式调用方法with() 方便分配变量和make()
	public function __toString() {
		//把键名变为变量名，键值变为变量值 相当于 $data = ['title'=>'我是文章标题'];
		extract($this->data);
		//载入模板
		include $this->template;
		//这个方法必须返回字符串
		return '';
	}
}