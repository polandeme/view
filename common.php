<?php
function doDB(){
    global $mysql;
    $mysql_con = mysql_connect('localhost', 'root' , '');
    $mysql = mysql_select_db("register",$mysql_con);
    if(mysql_errno()){
        die(mysql_error());
        
    }
}
