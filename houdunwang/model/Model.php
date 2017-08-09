<?php
namespace houdunwang\model;
//houdunwang\model创建类Model
class Model {
	//	创建一个自动载入的静态方法执行一个不存在的方法时，会触发此类方法
	public static function __callStatic( $name, $arguments ) {
//		返回对象是为了将来调用链式调用的时候使用
		return call_user_func_array([new Base(),$name],$arguments);
	}
}