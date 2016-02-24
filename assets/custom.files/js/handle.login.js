jQuery(document).ready(function($){

  $('[data-type="login-trigger"]').on('click', function(){

    var username = $("#login_username").val();

    var password = $("#login_password").val();

    var code = $("#login_code").val();

    var ajax_login  = login_class.createNew(username, password, code);

    ajax_login.check();

  });

});



var login_class = {



  createNew: function(login_username, login_password, login_code){



    var login = {}; 

    login.name = "login";

    login.username = login_username;

    login.password = hex_md5(login_password);

    login.code = login_code;

    

    login.check = function(){

      var md5_name = hex_md5(login.username);

      if($.cookie(md5_name) == '1' && $('#hidden_code').is(":hidden"))

      {

        $('#hidden_code').show();

        var code_url = $("#login_code_url").val() + Math.random();

        $("#hidden_code_img").attr("src", code_url);

      }else{

        $("#hidden_form").html($("#mainbody").html());

        var params = "username=" + login.username;

        params += "&password=" + login.password;

        params += "&code=" + login.code;

        params += "&session=" + getSessionId();

        $("#info").html("<label>登陆中,请稍后...</label>");

        $("#mainbody").html("<div ng-spinner-bar class='page-spinner-bar'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>");

        intervalid = setTimeout(function() {login.start(params);}, 1200);

      }

    }



    login.start = function(params){

      var url = $("#login_url").val();

      $.ajax({

           type:"POST",

           url:url,

           data:params,

           datatype: "json",

           beforeSend:function(){



           },

           success:function(data){

            console.log("response text: " + data);

            var jsonobj = jsonHandler(data);

            var result = "";

            var code = jsonobj.result_type;

            if(code == "1")

            {

              result = "登录成功";

              intervalid = setTimeout(function() {login.loginSuccess("");}, 1000);

            }else if(code == "2" || code == "3" || code == "4" || code == "6"){

              result = jsonobj.error;

              intervalid = setTimeout(function() {login.loginFail();}, 1000);

            }else if(code == "5" || code == "7"){

              result = jsonobj.error;

              intervalid = setTimeout(function() {login.loginFail("code");}, 1000);

            }else{

              console.log(code);

              result = "登陆服务出现问题，请稍后再试";

              intervalid = setTimeout(function() {login.loginFail();}, 3000);

            }

            $("#info").html("<label>"+result+"</label>");

           },

           complete: function(XMLHttpRequest, textStatus){

           },

           error: function(){

            $("#info").html("<label>服务暂停使用，请稍后再试</label>");

            intervalid = setTimeout(function() {login.loginFail();}, 3000);

           }

      });

    }



    login.loginSuccess = function(){

      var name = $("#login_username").val();

      name = hex_md5(name);

      if($.cookie(name) != null){

        $.cookie(name, '0', { expires: 10, path: '/' });

      }

      window.location.href = $("#redirect_url").val(); 

    }



    login.loginFail = function(code){

      $('#info').html("");

      $('#mainbody').html($('#hidden_form').html());

      $('#hidden_form').html("");

      $('#hidden_code').hide();

      $('[data-type="login-trigger"]').on('click', function(){

        var username = $("#login_username").val();

        var password = $("#login_password").val();

        var code = $("#login_code").val();

        var ajax_login  = login_class.createNew(username, password, code);

        ajax_login.check();                                                     

      });

      $('.login-form input').keypress(function (e) {

        if (e.which == 13) {

          if ($('.login-form').validate().form()) {

            var username = $("#login_username").val();

            var password = $("#login_password").val();

            var code = $("#login_code").val();

            var ajax_login  = login_class.createNew(username, password, code);

            ajax_login.check();

          }

          return false;

        }

      });

      if(code == 'code')

      {

        var username = $("#login_username").val();

        $.cookie(hex_md5(username), '1', { expires: 7 , path: '/'});

        //show code;

        var code_url = $('#login_code_url').val() + Math.random();

        $("#hidden_code_img").attr("src", code_url);

        $('#hidden_code').show();

      }

    }



    return login;

  }

}





function loginSuccess(){

   

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