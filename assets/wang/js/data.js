$(document).ready(function() {
                  $('#bt_message').click(function(){
                                         if(checkIpt())
                                         {
                                          $(".fakeloader_body").html('<div class="fakeloader"></div>');
                                          $(".fakeloader").fakeLoader({
                timeToHide:20000,
                bgColor:"#3498db",
                spinner:"spinner6"
            });
                                          centerLoader();

                                         $.ajax({
                                                url : 'php/chk_code.php',
                                                type : 'post',
                                                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                                                data : getIpt(),
                                                success: function (data) {
                                                if(data.indexOf('success')>=0)
                                                {
                                                  showMessageAlert("here","Thank you. Your message has been sent to the server. </br>I will feedback ASAP.",null,null);
                                                  initIpt();
                                                }else if(data== "false"){
                                                  showMessageAlert("here","Sorry, the verification code is error.",null,null);
                                                }else{
                                                  console.log(data);
                                                  showMessageAlert("here","Sorry, the server is down right now. </br>Please try again later.",null,null);
                                                }
                                                document.getElementById("getcode_math").src = "php/code_math.php";
                                                setTimeout("closeFakeloader()", 200);
                                                }
                                                });
                                         }else{
                                         showMessageAlert("here","Sorry, please check the input.",null,null);
                                         }
                                         });
                  
                  $('#getcode_math').click(function(){
                                           document.getElementById("getcode_math").src = "php/code_math.php";
                                           });
                  });


function getPagearea(){
    　　if (document.compatMode == "BackCompat"){
        　　　　return {
            　　　　　　width: Math.max(document.body.scrollWidth,
                                  　　　　　　　　　　　　　　document.body.clientWidth),
            　　　　　　height: Math.max(document.body.scrollHeight,
                                   　　　　　　　　　　　　　　document.body.clientHeight)
            　　　　}
        　　} else {
            　　　　return {
                　　　　　　width: Math.max(document.documentElement.scrollWidth,
                                      　　　　　　　　　　　　　　document.documentElement.clientWidth),
                　　　　　　height: Math.max(document.documentElement.scrollHeight,
                                       　　　　　　　　　　　　　　document.documentElement.clientHeight)
                　　　　}
            　　}
}

function CheckMail(mail) {
 var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 if (filter.test(mail)) 
  return true;
 else {
 return false;
}
}

function checkIpt(){
    var success = true;
    document.getElementById("ipt_name").value = document.getElementById("ipt_name").value.replace(/ /g,"");
    document.getElementById("ipt_email").value = document.getElementById("ipt_email").value.replace(/ /g,"");
    document.getElementById("ipt_message").value = document.getElementById("ipt_message").value.replace(/ /g,"");
    document.getElementById("ipt_code").value = document.getElementById("ipt_code").value.replace(/ /g,"");
    if(document.getElementById("ipt_name").value == null||document.getElementById("ipt_name").value == ""){
        success = false;
    }
    if(document.getElementById("ipt_email").value == null||document.getElementById("ipt_email").value == ""){
        success = false;
    }
    if(document.getElementById("ipt_message").value == null||document.getElementById("ipt_message").value == ""){
        success = false;
    }
    if(document.getElementById("ipt_code").value == null||document.getElementById("ipt_code").value == ""){
        success = false;
    }

    if(!CheckMail(document.getElementById("ipt_email").value))
    {
      success = false;
    }
    return success;
}


function getIpt(){
    var params = "";
    params += 'code='+ document.getElementById("ipt_code").value;
    params += '&name='+ document.getElementById("ipt_name").value;
    params += '&email='+ document.getElementById("ipt_email").value;
    params += '&message='+ document.getElementById("ipt_message").value;
    if(document.getElementById("ipt_phone").value != null&&document.getElementById("ipt_phone").value != "")
    {
      params += '&phone='+ document.getElementById("ipt_phone").value;
    }
    return params;
}

function initIpt(){
    
    document.getElementById("ipt_name").value = "";
    document.getElementById("ipt_email").value = "";
    document.getElementById("ipt_message").value = "";
    document.getElementById("ipt_code").value = "";
    document.getElementById("ipt_phone").value = "";
}


function getDetails(id){
  var pix = $(window).height();
  showMessageAlert("",'<iframe style="width:100%;height:100%;min-height:90%;border:0;" src="web/views/appview/index.php?appid='+id+'" onLoad="iFrameHeight()" name="ifrmname" data="'+id+'" id="ifrmid"></iframe>',null,"'like()'") ;
  // 
  // document.frames('ifrmname').location.reload();
  document.getElementById('ifrmid').focus();
}

 function iFrameHeight() {

        var ifm= document.getElementById("ifrmid");

        var subWeb = document.frames ? document.frames["ifrmname"].document :

ifm.contentDocument;

            if(ifm != null && subWeb != null) {

            ifm.height = subWeb.body.scrollHeight;

            }

    }

function showMessageAlert(title, data, clickButtonType, callBackFun){
    if(data.replace(/ /g,"") == "")
    {
        return;
    }
    document.getElementById("dialog_message_detials").innerHTML = data;
    document.getElementById("alert_area").style.display = "";
    document.getElementById("alert_area").className += " panel-game-msg_layer_cover";
    var height = parseInt(getPagearea().height) + 100;
    document.getElementById("alert_area").style.height = height + "px";
    document.getElementById("dialog_message_button").setAttribute("onclick", "javascript:closeAlert(" + callBackFun + ")");
}

function closeAlert(callBackFun){
    document.getElementById("alert_area").style.display = "none";
    document.getElementById("dialog_message_detials").innerHTML = "";
    document.getElementById("alert_area").className = document.getElementById("alert_area").className.replace(/ panel-game-msg_layer_cover/,"");
    if(callBackFun != null){
        setTimeout(callBackFun, 100);
    }
}

function like()
{
  var id = document.getElementById('ifrmid').getAttribute("data");
   $.ajax({
                                                url : 'likeapp.php',
                                                type : 'get',
                                                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                                                data : 'appid='+id,
                                                success: function (data) {
                                                }
                                                });
 
}

function centerLoader() {

    var winW = $(window).width();
    var winH = $(window).height();

    var spinnerW = $('.fl').outerWidth();
    var spinnerH = $('.fl').outerHeight();

    $('.fl').css({
        'position':'absolute',
        'left':(winW/2)-(spinnerW/2),
        'top':(winH/2)-(spinnerH/2)
    });

}

function closeFakeloader(){
    $(".fakeloader_body").html('<div class="fakeloader"></div>');
}

function reload(url){
  var message = document.getElementById("welcomeMessge");
  switch(url)
  {
    case "apps.php":
       message.innerHTML = "Welcome to view my apps.";
       break;
       case "resume.php":
       message.innerHTML = "Welcome to view my info.";
       break;
       case 'photos.php':
       message.innerHTML = "Welcome to view my photos.";
       break;
       case 'contact.php':
       message.innerHTML = "Welcome to contact me.";
       break;
       default:
       message.innerHTML = "Sorry, the page you are looking for is not exists.";
       break;
  }
  $(".fakeloader_body").html('<div class="fakeloader"></div>');
   $(".fakeloader").fakeLoader({
                timeToHide:20000,
                bgColor:"#3498db",
                spinner:"spinner5"
            });
centerLoader();
    $.ajax({
                                                url : url,
                                                type : 'get',
                                                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                                                data : '',
                                                success: function (data) {
                                                
                                                document.getElementById("innerbody").innerHTML = data;
                                                setTimeout("closeFakeloader()", 1000);
                                                baguetteBox.run('.baguetteBoxOne', {
    animation: 'fadeIn',
});
                                                }
                                                });
}
