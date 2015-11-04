jQuery(document).ready(function($){
                       $('[data-type="login-trigger"]').on('click', function(){
                                                           login();
                                                           });
                       $.cookie("fuck", '1', { expires: 7 });
                       });


function login(){

    var name = document.getElementById("username").value;
    md5_name = hex_md5(name);
    if($.cookie(md5_name) == '1' && $('#hidden_code').is(":hidden"))
    {
       $('#hidden_code').show();
       var img = document.getElementById("hidden_code_img");  
    img.src = "http://localhost/wrx/website/index.php/interface/code/rnd/" + Math.random();
    }else{
      var password = document.getElementById("password").value;
      var code = document.getElementById("code").value;
    document.getElementById("hidden_form").innerHTML = document.getElementById("mainbody").innerHTML;
    password = hex_md5(password);
    params = "username=" + name + "&password=" + password + "&code=" + code + "&session=" + getSessionId();
    document.getElementById("info").innerHTML = "<label>登陆中,请稍后...</label>";
    document.getElementById("mainbody").innerHTML = "<div ng-spinner-bar class='page-spinner-bar'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div><!-- END PAGE SPINNER -->";
    intervalid = setTimeout("postData('"+params+"')", 100);
    }
}

function postData(params){
    var url = "../../index.php/interface/login";
    
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
            console.log("response text: " + data);
           var jsonobj = jsonHandler(data);
           //if(result[])
           if(jsonobj.result_type == "1")
           {
           document.getElementById("info").innerHTML = "<label>登陆成功</label>";
           intervalid = setTimeout("loginSuccess()", 1000);
           }else if(jsonobj.result_type == "2" || jsonobj.result_type == "4" ){
           document.getElementById("info").innerHTML = "<label>用户名或密码错误，请重新登陆</label>";
           intervalid = setTimeout("loginFail()", 2000);
           }else if(jsonobj.result_type == "5" ){
           document.getElementById("info").innerHTML = "<label>验证码错误，请重新输入</label>";
           intervalid = setTimeout("loginFail('code')", 2000);
           }else if(jsonobj.result_type == "7" ){
           document.getElementById("info").innerHTML = "<label>用户名或密码错误，请重新登陆</label>";
           intervalid = setTimeout("loginFail('code')", 2000);
           }else if(jsonobj.result_type == "6" ){
           document.getElementById("info").innerHTML = "<label>用户状态异常，已被锁定</label>";
           intervalid = setTimeout("loginFail()", 2000);
           }else{
           console.log("response text: " + data + "; result_type: " + jsonobj.result_type);
           document.getElementById("info").innerHTML = "<label>登陆服务出现问题，请稍后再试</label>";
           intervalid = setTimeout("loginFail()", 3000);
           }
           }   ,
           //调用执行后调用的函数
           complete: function(XMLHttpRequest, textStatus){
           //success;
           },
           //调用出错执行的函数
           error: function(){
           //请求出错处理
           document.getElementById("info").innerHTML = "<label>服务暂停使用，请稍后再试</label>";
           intervalid = setTimeout("loginFail()", 3000);
           }
           }
           );
    
    
    // if (typeof XMLHttpRequest != "undefined") {
    //     if(window.XMLHttpRequest){
    //         oBao1=new XMLHttpRequest(); }else{
    //             oBao1=new ActiveXObject("Microsoft.XMLHTTP"); }
    // }
    // oBao1.open("post",url,false);
    // oBao1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    // oBao1.onreadystatechange = function(){
    //     if((oBao1.readyState==4)&&(oBao1.status==200)){
    //         var result = oBao1.responseText;
    //         var cookie = getCookie("login_state");
    //         if(cookie == "success")
    //         {
    //             document.getElementById("info").innerHTML = "<label>登陆成功</label>";
    //             intervalid = setTimeout("loginSuccess()", 1000);
    //         }else if(cookie == "false"){
    //             document.getElementById("info").innerHTML = "<label>用户名或密码错误，请重新登陆</label>";
    //             intervalid = setTimeout("loginFail()", 2000);
    //         }else{
    //             console.log("response text: " + result);
    //             document.getElementById("info").innerHTML = "<label>登陆服务出现问题，请稍后再试</label>";
    //             intervalid = setTimeout("loginFail()", 3000);
    //         }
    //     }else{
    
    //     }};
    // oBao1.send(params);
}


function loginSuccess(){
   var name = document.getElementById("username").value;
    name = hex_md5(name);
    if($.cookie(name) != null)
    {
       $.cookie(name, '0', { expires: 10, path: '/' });
    }

    window.location.href="../site/index";
}

function loginFail(code){
  var name = document.getElementById("username").value;
  document.getElementById("info").innerHTML = "";
  document.getElementById("mainbody").innerHTML = document.getElementById("hidden_form").innerHTML;
  document.getElementById("hidden_form").innerHTML = "";
  $('#hidden_code').hide();
  $('[data-type="login-trigger"]').on('click', function(){
                                                           login();
                                                           });
  $('.login-form input').keypress(function (e) {
              if (e.which == 13) {
                  if ($('.login-form').validate().form()) {
                      login();
                  }
                  return false;
              }
          });
  if(code == 'code')
  {
    name = hex_md5(name);
    $.cookie(name, '1', { expires: 7 , path: '/'});
    //show code;
    var img = document.getElementById("hidden_code_img");  
    img.src = "http://localhost/wrx/website/index.php/interface/code/rnd/" + Math.random();
    $('#hidden_code').show();
  }
}

function backtomain(){
    window.location.href="../";
}

function jsonHandler(json){
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