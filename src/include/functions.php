<?php
	
	// This file is the place to store all basic functions
	function mysql_prep($value){
		$ma=get_magic_quotes_gpc();
		$new=function_exists("mysql_real_escape_string");
		if($new){
			if($ma){$value=stripslashes($value);}
			$value=mysql_real_escape_string($value);
		} else {
			if (!$ma){$value=addslashes($value);}
		}
		return $value;
	}
	function br2nl($text) {    return  preg_replace('/<br\\s*?\/??>/i', '', $text);}
	//Random Number Generator
	function genRandomString() {
    $length = 11;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = " ";    

		for ($p = 1; $p <= $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters)-1)];
		}

    return $string;
	}
	
	// Redirect Function
	function redirect_to( $location) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	// Select Query only with simple where clause
	function Select_Query( $parameter , $tablename , $condition , $conn){
		if($condition != NULL) {
			$query = "select ".$parameter." from ".$tablename." where ".$condition ;
			
		}else{
			$query = "select ".$parameter." from ".$tablename;
		}
		$data = array();
		$sel = mysql_query($query,$conn);
		while($datas = mysql_fetch_array($sel)){
		   $data[] = $datas;
		}
		if($data != NULL)
	 		return $data;
		else
			return 0;
	}
	
	//Delete Query
	function Delete_Query( $tablename , $condition , $conn , $limit = "20"  ){
		if($condition != NULL) {
			$query = "DELETE from ".$tablename." where ".$condition." limit ".$limit ;
			
		}else{
			$query = "DELETE from ".$tablename." limit ".$limit;
		}
		
		$del = mysql_query($query,$conn);
		return $del;
	}
	
	//Update Query
	function Update_Query( $parameter , $tablename , $condition , $conn , $limit = "1"  ){
		if($condition != NULL) {
			$query = "UPDATE ".$tablename." SET ".$parameter." where ".$condition." limit ".$limit ;
			
		}else{
			$query = "UPDATE ".$tablename." SET ".$parameter." limit ".$limit;
		}
		//exit;
		$update = mysql_query($query,$conn);
		return $update;
	}
date_default_timezone_set('Asia/Kolkata');
?>