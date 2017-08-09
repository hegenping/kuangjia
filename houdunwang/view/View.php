<?php
namespace houdunwang\view;
//houdunwang\view创建类View
class View{
//	创建一个自动载入的静态方法执行一个不存在的方法时，会触发此类方法
	public static function __callStatic( $name, $arguments ) {
//		返回对象是为了将来链式调用的时候使用，保证对象能调用方法
		return call_user_func_array([new Base(),$name],$arguments);
	}
}