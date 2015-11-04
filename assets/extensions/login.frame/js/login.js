jQuery(document).ready(function($){
                       $('.wrx_login_bt').on('click', function(){
                       	 var name = $('#wrx_username')[0].value;
    md5_name = hex_md5(name);
    if($.cookie(md5_name) == '1' && $('#wrx_hidden_code').is(":hidden"))
    {
       $('#wrx_hidden_code').show();
       $('#wrx_code_img').attr("src") = "http://localhost/wrx/website/index.php/interface/code/rnd/" + Math.random();
    }else{
      var password = $('#wrx_password')[0].value;
      var code = $('#wrx_code')[0].value;
    password = hex_md5(password);
    params = "username=" + name + "&password=" + password + "&code=" + code + "&session=" + getSessionId();

                                                           var login  = login_popup.createNew();
                                                           $("#info").html("");
                                                           intervalid = setTimeout(function() {login.login(params);}, 800);
                                                       }
                                                           });
                       });


var login_popup = {

　　　　createNew: function(){

　　　　　　var login = {}; 
            
            login.name = "login";

            login.loginSuccess = function(){
            	location.reload();
            }

             login.loginFail = function(params){ 
             	console.log("response text: " + params);
             	$("#wrx_login_form_bt").trigger("click");
            }

            login.jsonHandler = function(json){
    var data = null;
    try 
    { 
        data = eval('('+ json +')');
    } 
    catch (e) 
    {
        data = new Array();
        data["result_type"] = "js";
    }
    return data;
}


            login.login = function(params){ 
            	//var url = "../../index.php/interface/login";
            	var url = "http://localhost/wrx/website/index.php/interface/login";
    
    $.ajax({
           //提交数据的类型 POST GET
           type:"POST",
           //提交的网址
           url:url,
           //提交的数据
           data:params,
           //返回数据的格式
           datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
           //在请求之前调用的函数
           //beforeSend:function(){$("#msg").html("logining");},
           //成功返回之后调用的函数
           success:function(data){
           //console.log("response text: " + data);
           var jsonobj = login.jsonHandler(data);
           //if(result[])
           if(jsonobj.result_type == "1")
           {
           document.getElementById("info").innerHTML = "<label>登陆成功</label>";
           $('#wrx_process_info').html("登陆成功");
           intervalid = setTimeout(function() {login.loginSuccess();}, 1200);
           }else if(jsonobj.result_type == "2" || jsonobj.result_type == "4" ){
           $('#wrx_process_info').html("登陆失败");
           document.getElementById("info").innerHTML = "<label>用户名或密码错误，请重新登陆</label>";
           intervalid = setTimeout(function() {login.loginFail();}, 1200);
           }else if(jsonobj.result_type == "5" ){
           	$('#wrx_process_info').html("登陆失败");
           document.getElementById("info").innerHTML = "<label>验证码错误，请重新输入</label>";
           intervalid = setTimeout(function() {login.loginFail(1);}, 1200);
           }else if(jsonobj.result_type == "7" ){
           	$('#wrx_process_info').html("登陆失败");
           document.getElementById("info").innerHTML = "<label>用户名或密码错误，请重新登陆</label>";
           intervalid = setTimeout(function() {login.loginFail(1);}, 1200);
           }else if(jsonobj.result_type == "6" ){
           	$('#wrx_process_info').html("登陆失败");
           document.getElementById("info").innerHTML = "<label>用户状态异常，已被锁定</label>";
           intervalid = setTimeout(function() {login.loginFail();}, 1200);
           }else{
           $('#wrx_process_info').html("登陆失败");
           console.log("response text: " + data + "; result_type: " + jsonobj.result_type);
           document.getElementById("info").innerHTML = "<label>登陆服务出现问题，请稍后再试</label>";
           intervalid = setTimeout(function() {login.loginFail();}, 2300);
           }
           }   ,
           //调用执行后调用的函数
           complete: function(XMLHttpRequest, textStatus){
           //success;
           },
           //调用出错执行的函数
           error: function(XMLHttpRequest, textStatus, errorThrown){
           //请求出错处理
//            alert(XMLHttpRequest.status);
// alert(XMLHttpRequest.readyState);
// alert(textStatus);
           $('#wrx_process_info').html("登陆失败");
           document.getElementById("info").innerHTML = "<label>服务暂停使用，请稍后再试</label>";
           intervalid = setTimeout(function() {login.loginFail(params);}, 2300);
           }
           }
           );

 };

　　　　　　return login;

　　　　}

　　};


