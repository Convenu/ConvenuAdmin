<?php 
$conn=mysql_connect("DBCONNECTION","DBUSER","DBPASS");
$db_name="convenudev";
if(!$conn)
{
die ("connection not found" .mysql_error());
}
$select_db=mysql_select_db($db_name,$conn);
 if (!$select_db)
 {
 die ("database not found" .mysql_error());
 }


?>
