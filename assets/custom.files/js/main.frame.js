var nextpage = "welecome";


function reLoad(page){
    if(getCookie("login_state")=="success")
    {
    document.getElementById('mainbody').innerHTML = '<div ng-spinner-bar class="page-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div><!-- END PAGE SPINNER -->';
    nextpage = page;
    intervalid = setTimeout("getpage()", 100);
    intervalid = setTimeout("getpageMenu()", 100);
    }else{
        window.location.href = "../Login/logout.php";
    }
}

function getpage(){
    var params = "page="+nextpage;
    var url = "../../models/PageController.php";
    if (typeof XMLHttpRequest != "undefined") {
        if(window.XMLHttpRequest){
            oBao1=new XMLHttpRequest(); }else{
                oBao1=new ActiveXObject("Microsoft.XMLHTTP"); }
    }
    oBao1.open("post",url,false);
    oBao1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    oBao1.onreadystatechange = function(){
        if((oBao1.readyState==4)&&(oBao1.status==200)){
            var result = oBao1.responseText;
            document.getElementById('mainbody').innerHTML = result;
        }
    };
    oBao1.send(params);
}


function getpageMenu(){
    var params = "page="+nextpage;
    var url = "../../models/SystemMenu.php";
    if (typeof XMLHttpRequest != "undefined") {
        if(window.XMLHttpRequest){
            oBao1=new XMLHttpRequest(); }else{
                oBao1=new ActiveXObject("Microsoft.XMLHTTP"); }
    }
    oBao1.open("post",url,false);
    oBao1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    oBao1.onreadystatechange = function(){
        if((oBao1.readyState==4)&&(oBao1.status==200)){
            var result = oBao1.responseText;
            document.getElementById('systemMenu').innerHTML = result;
        }
    };
    oBao1.send(params);
}

function exit(){
    window.location.href = "../Login/logout.php";
}

function deleteMsg(id, ob)
{
    ob.parentNode.parentNode.style.display = "none";
   $.ajax({
    url : '../../models/deleteMsg.php',
    type : 'get',
    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
    data : 'id='+id,
    success: function (data) {
        if(data == 1)
        {
        }
    }
   });
}

function readMsg(id)
{
   var ob =  document.getElementById("msg_id_" + id);
   ob.innerHTML = '<span class="label label-sm label-info">已读</span>';
   $.ajax({
    url : '../../models/readMsg.php',
    type : 'get',
    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
    data : 'id='+id,
    success: function (data) {
        if(data == 1)
        {
        }
    }
   });
}

function getCookie(c_name){
    var arr = document.cookie.match(new RegExp("(^| )"+c_name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return "null";
}
            
function setCookie(c_name, value, expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    document.cookie=c_name+ "=" + escape(value) + ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}


function checkDetail(id,name){
    var detailsId = "detail_"+id;
    sub = document.getElementById(detailsId);
    if(sub == null || sub == "null" || sub == "")
    {
    var params = "id="+id+"&name="+name;
    var url = "../../models/getAPdetails.php";
    if (typeof XMLHttpRequest != "undefined") {
        if(window.XMLHttpRequest){
            oBao1=new XMLHttpRequest(); }else{
                oBao1=new ActiveXObject("Microsoft.XMLHTTP"); }
    }
    oBao1.open("post",url,false);
    oBao1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    oBao1.onreadystatechange = function(){
        if((oBao1.readyState==4)&&(oBao1.status==200)){
            var result = oBao1.responseText;
            var details = document.getElementById("content_details").innerHTML;
            document.getElementById("content_details").innerHTML = details + result;
             var html = document.getElementById("tabslist").innerHTML;
             document.getElementById("tabslist").innerHTML = html + '<li class=""><a href="#tab_1_'+id+'" id="detail_'+ id +'" data-toggle="tab" aria-expanded="false">'+ name +'</a></li>';
             sub = document.getElementById(detailsId);
        }else{
            alert("error");
        }
    };
    oBao1.send(params);
    }

    sub.click(); 
}  



function datahelper(method, params, divid){
    params = params + "&method=" + method;
    url = "../../models/DataHelper.php";
    var orgianal = document.getElementById(divid).innerHTML;
    document.getElementById(divid).innerHTML = "<div ng-spinner-bar class='page-spinner-bar'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div>";
    if (typeof XMLHttpRequest != "undefined") {
        if(window.XMLHttpRequest){
            oBao1=new XMLHttpRequest(); }else{
                oBao1=new ActiveXObject("Microsoft.XMLHTTP"); }
    }
    oBao1.open("post",url,false);
    oBao1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    oBao1.onreadystatechange = function(){
        if((oBao1.readyState==4)&&(oBao1.status==200)){
            if(oBao1.responseText == "error")
            {
                alert("发生错误，请稍后重试");
                document.getElementById(divid).innerHTML =orgianal;
                
            }else{
                document.getElementById(divid).innerHTML = oBao1.responseText;
            }
        }else{
            alert("系统异常，请稍后重试");
            document.getElementById(divid).innerHTML =orgianal;
        }

    };
    oBao1.send(params);
} 



function getParamesFromNewSchedule(){
    var params = "date=" + document.getElementById("date").value;
    params = params + "&ChannelId=" + document.getElementById("channelId").value;
    params = params + "&starth=" + document.getElementById("starth").value;
    params = params + "&startm=" + document.getElementById("startm").value;
    params = params + "&endh=" + document.getElementById("endh").value;
    params = params + "&endm=" + document.getElementById("endm").value;
    params = params + "&endm=" + document.getElementById("endm").value;
    if(document.getElementById("smethod").value == 1)
    {
        params = params + "&carnum=" + document.getElementById("carnum").value;
       
    }else{
        params = params + "&carid=" + document.getElementById("carid").value;
    }
    params = params + "&content=" + document.getElementById("content").value;

    setTimeout("datahelper('add_new_schedule','"+ params +"','portletbody_message')", 100);
}