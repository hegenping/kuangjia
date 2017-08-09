<?php
namespace houdunwang\core;

class Boot{

    public static function run(){


        self::init();
//      执行应用
        self::appRun();

    }

    private static function appRun(){
//        echo 333;die;
//        没有$_GET['s']参数时默认访问 ?home/entry/index
//        判断是否含有$_GET['s']参数
        $s=isset($_GET['s'])?strtolower($_GET['s']):'home/entry/index';
//        把$s转化成一个数组，方便组合
        $arr=explode('/',$s);
//        home可能是前台应用也可能是后台应用所以不是固定的，所以不能写死，可以定义一个常量，在组合模板的时候也会用到/

//        //        1把应用比如"home"定义为常量APP
//        2在houdunwang/viem/View.php文件里的View类的make方法组合模板路径，
//        需要的应用比如：home的名字
//        3home是默认应用，有可能为admin后台应用，所以不能写死home
        define('APP',$arr[0]);
//        把controller里面的控制器类文件定义为常量，因为可能是其它作用类
        define('CONTROLLER',$arr[1]);
//        把方法定义为常量因为方法可能有好多种
        define('ACTION',$arr[2]);
//        组合类名
        $className= "\app\\{$arr[0]}\controller\\".ucfirst($arr[1]);
//        调用控制器里面的方法,
          echo call_user_func_array([new $className,$arr[2]],[]);
    }

//	初始化
    private static function init(){
//      开启session
//      如果session开启则执行左边，否则执行右边开启session
        session_id()||session_start();
//      设置区时东八区
        date_default_timezone_set("PRC");
//     定义一个常量判断是否POST提交方式
        define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST'?true:false);

    }
}