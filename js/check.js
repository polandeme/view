// function check(){
// 	// var judge = $("upassword").value 
// 	var right = $("#reupassword").append("<span>两次密码一致</span>");
// 	var wrong = $("#reupassword").append("<span>两次密码不一致</span>").end().value;
// 	// var right1 =  $("#reupassword").text;
// 	alert(wrong);
// 	// return ($("#upassword").value == $("#reupassword")).value ? right : wrong; 
// }

/*=
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
一种比较笨的方法提示密码是否一样，待优化，用jquery优化，获取表单中的值？ 用remove 或者append方法
 =*/

function pwdIsEquel(){                                                          
    var password1 = $("#upassword").val();             
    var password2 = $("#reupassword").val();           
    // alert(password2);                                                           
    if(password1 != password2 )                                                  
    {                                                                           
        //alert("密码不一样");                                                  
        $("span").css("display" , "none");                                                   
        $("#pwdwrong").css("display", "inline");                           
        //alert("test");                                                        
    }                                                                           
    else{    
        $("span").css("display" , "none");                                                                                                                      
        $("#pwdright").css("display", "inline");                              
    }                                                                           
} 



                                                                                                                   

                                                                                                                   
                                                                                                                           
                                                                                                                                                                                             
                                                                                                                           
                                                                          
                                                                                                                                                                                             
                                                                          
                                                                          
                                                                          






