<?php
function doDB(){
    global $mysql;
    $mysql_con = mysql_connect('localhost', 'root' , '');
    $mysql = mysql_select_db("register",$mysql_con);
   mysql_query("set names utf8"); //解决中文乱码问题    
    if(mysql_errno()){
        die(mysql_error());
        
    }
}
