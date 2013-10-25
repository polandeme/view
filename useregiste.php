<?php
session_start();
if(isset($_SESSION['uname']))
{
    header("Location:my.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
         <!-- <script type="text/javascript" src="js/check.js"></script> -->
        <title> 注册</title>
    </head>
    <body>
        <fieldset>
            <legend> 注册</legend>
            <form method="post" action="registe.php" class="login-area">
                <p><label for="uname"> 用户名</label>
                <input type="text" name="uname" id="uname" ><span id = "Acheck_name"> </span></p>
                <p> <label for="uemail">邮箱</label>
                <input type="email" name="uemail" id="uemail"></p>
                <p><label for="upassword"> 密码</label>
                <input type="password" name="upassword" id="upassword">
                <span class = "check_pwd"></span>
                </p>
                <p>
                    <label for="reupassword">重复密码</label>
                    <input type="password" name="reupassword" id="reupassword">
                    <span id = "pwdwrong"> 密码不一样</span>
                    <span id = "pwdright"> 密码一样</span>
                    <span id = "pwdnull"> 密码不能为空</span>
                </p>
                <input type="submit" name="submit" class="resubmit" >
            </form>
        </fieldset>
        <script type="text/javascript">
        $(".resubmit").attr('disabled' , true);

                $().ready(check());
                var judge_name = null, judge_email, judge_password,
                judge_repassword;
                function check(){

                function check_all(){
                    // alert(1);
                    if((judge_name =='yes') && (judge_email =='yes') && (judge_repassword=="yes")){
                        $(".resubmit").attr('disabled' , false);
                    } else{
                        $(".resubmit").attr('disabled' , true);
                    }
                }

                    //检测用户名是否重复
                $("#uname").change(function(){
                    //创建xmlHTTPRequest 对象
                    function CreatXmlHttp(){
                      var xmlhttp = null
                      try{
                        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                      } catch(e){
                        try{
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch(E){
                          xmlhttp = new XMLHttpRequest();
                        }
                      }
                      return xmlhttp;
                    }

                    //通过ajax 取回数据 并显示
                    var ajax = null;
                    var name = $("#uname").val();
                    function show(){

                      ajax = new CreatXmlHttp();
                      ajax.open("get", "check_name.php?name=" + name + "&" + Math.random(), true);

                      // alert("check_name.php?name=" + name + "&" + Math.random());
                      
                      ajax.onreadystatechange = function() {
                         if(ajax.readyState == 4 && ajax.status)
                            {
                                var check_name = $("#Acheck_name");
                                var data = ajax.responseText;
                                if(data == 'yes'){
                                    check_name.html("重复");
                                    judge_name = 'no';
                                    // check_all(); //作用于问题，放到show()后无法达到效果？
                                } else{
                                    check_name.html("可用");
                                    judge_name = 'yes';                     
                            }                   
                        }
                        check_all(); //注意调用位置，变量作用域问题
                      }
                     
                     ajax.send(null);
                    }
                    show();                
                });

                //检测邮箱地址是否可以  允许一个邮箱注册多个用户
                $("#uemail").change(function(){
                    judge_email = 'yes';
                    check_all();
                });

                //检测密码
                //长度>= 6 
                

                $("#upassword").keyup(function(){
                    var psdlong = $("#upassword").val().length;
                    // alert(psdlong);
                    if(psdlong < 6)
                    {
                        $(".check_pwd").html("密码长度至少六位");
                        judge_password = '';
                    }
                    else
                    {
                        $(".check_pwd").html("ok");
                    }
                    // judge_password = 'yes';
                    check_all();
                });
                //检测密码是否重复
                $("#reupassword ,#upassword").keyup(function(){
                    var psdlong = $("#upassword").val().length;
                    if(psdlong >= 6 && !$("#reupassword").val() == '')
                    {
                            if($("#upassword").val() == $("#reupassword").val())
                        {
                            //密码匹配
                            $("#pwdright,#pwdwrong").css("display" , "none");                                                 
                            $("#pwdright").css("display", "inline"); 
                            judge_repassword = 'yes';                                            
                        }
                        else{
                            $("#pwdright,#pwdwrong").css("display" , "none");                             
                            $("#pwdwrong").css("display", "inline"); 
                            judge_repassword = '';
                        }    
                    }
                    
                    check_all();
                });
            }
        </script>
    </body>
</html>
        
