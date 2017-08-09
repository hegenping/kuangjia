<?php

function p($var){
	echo '<pre style="background: #ccc;padding: 10px;border-radius: 5px;">';
	print_r($var);
	echo '</pre>';
}

//用c函数调用数据库
function c($path){
	$arr = explode('.',$path);
	$config = include '../system/config/' . $arr[0] . '.php';
	return isset($config[$arr[1]]) ? $config[$arr[1]] : NULL;
}






