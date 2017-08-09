<?php
namespace houdunwang\model;
use PDO;
use PDOException;

class Base {
	//保存PDO对象的静态属性
	private static $pdo = null;
//	自动执行连接数据库的方法
	public function __construct() {
		$this->connect();
	}

//	连接数据库
	private function connect() {
		if ( is_null( self::$pdo ) ) {
			try {
//				定义变量储存连接数据库
				$dsn = 'mysql:host='.c('database.db_host').';dbname=' . c('database.db_name');
//				实例化一个PDO对象存到$pdo
				$pdo = new PDO( $dsn, c('database.db_user'), c('database.db_password') );
				$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$pdo->exec( "SET NAMES " . c('database.db_charset') );
				//把PDO对象放入到静态属性中
				self::$pdo = $pdo;
//				捕获PDO的异常错误$e异常对象
			} catch ( PDOException $e ) {
				exit( $e->getMessage() );
			}
		}

	}

	/*
	 * 获取全部数据
	 */
	public function get( $table ) {
		$sql    = "SELECT * FROM {$table}";
		$result = self::$pdo->query( $sql );
		//获得关联数组
		$data = $result->fetchAll( PDO::FETCH_ASSOC );
//		返回数据库信息，为输出模板时能使用
		return $data;
	}


//	  执行有结果集的操作
	public function q( $sql ) {
		try {
//			执行从Model 传来的$sql
			$result = self::$pdo->query( $sql );
			return $result->fetchAll( PDO::FETCH_ASSOC );
			//捕获PDO异常错误 $e 是异常对象
		} catch ( PDOException $e ) {
			exit( "SQL错误：" . $e->getMessage() );
		}
	}


//	 执行没有结果集的操作

	public function e( $sql ) {
		try {
//			静态调用没结果集操作
			$afRows = self::$pdo->exec( $sql );
//			获取表中的所有和这个sql相关的语句，把它返回到Model
			return $afRows;
//			捕获PDO异常错误 $e 是异常对象
		} catch ( PDOException $e ) {
			exit( "SQL错误：" . $e->getMessage() );
		}
	}
}