<?php
	require_once("db_connect.php");
	session_start();
	class dbFunction{
		function __construct(){
			$bd = new dbConnect();
		}
		function __destruct(){
			
		}
		public function user_register($user_name, $emailid, $password){
			$rs = mysql_query("insert into users(user_name, emailid, password) values('$user_name', '$emailid', '$password')");
			return $rs;
		}
		public function login($emailid, $password){
			$rs = mysql_query("select * from users where emailid = '".$emailid."' and password = '".$password."'");
			$rw = mysql_fetch_array($rs);
			$no_rows = mysql_num_rows($rs);
			if($no_rows == 1){
				$_SESSION['login'] == true;
				$_SESSION['idu'] = $rw['id'];
				$_SESSION['user_name'] = $rw['user_name'];
				$_SESSION['emailid'] = $rw['emailid'];
				return true;
			}else{
				return false;
			}
		}
		public function is_user_exist($emailid){
			$rs = mysql_query("select * from users where emailid = '".$emailid."'");
			$no_rows = mysql_num_rows($rs);
			if($no_rows > 0){
				return true;
			}else{
				return false;
			}
		}
	}
?>