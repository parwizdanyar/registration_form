<?php
	class dbConnect{
		function __construct(){
			require_once("config.php");
			$connect = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			mysql_select_db(DB_DATABASE, $connect);
			if(!$connect){
				die( "can not select the database!" );
			}
			return $connect;
		}
		public function colse(){
			mysql_close();
		}
	}
?>