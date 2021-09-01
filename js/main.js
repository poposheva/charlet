
function Charlet_DialogClose() {
    document.getElementById("charlet_systemdialog").close();
}

function Charlet_CreateDomain(){
    Charlet_DialogClose();
    ExecuteAjax({
        type: "GET",
        url: "?mode=domain&case=create",
        datatype: "html"
    },
    function(data) {
        $("#charlet_systemdialog_dialogcontent").html(data);
        document.getElementById("charlet_systemdialog").showModal();
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("エラーが発生しました。しばらく待ってやり直してください。");
        $("#charlet_systemdialog").attr("open","true");
    });
}

function Charlet_CreateGroupDialog(id){
    Charlet_DialogClose();
    ExecuteAjax({
        type: "GET",
        url: "?mode=group&case=create&hashid="+id,
        datatype: "html"
    },
    function(data) {
        $("#charlet_systemdialog_dialogcontent").html(data);
        document.getElementById("charlet_systemdialog").showModal();
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("エラーが発生しました。しばらく待ってやり直してください。");
        $("#charlet_systemdialog").attr("open","true");
    });
}

function Charlet_CreateGroupButton(obj) {
    if ($(obj).val() != ""){
        $("#charlet_systemdialog input[type=\"submit\"]").removeAttr("disabled");
    }else{
        $("#charlet_systemdialog input[type=\"submit\"]").attr("disabled","true");
    }
}

function Charlet_RegistorHashtagWithGroup(id){
    ExecuteAjax({
        type: "GET",
        url: "?mode=group&case=registhash&hashid="+id,
        datatype: "html"
    },
    function(data) {
        $("#charlet_systemdialog_dialogcontent").html(data);
        document.getElementById("charlet_systemdialog").showModal();
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("エラーが発生しました。しばらく待ってやり直してください。");
        $("#charlet_systemdialog").attr("open","true");
    });
}

function Charlet_RegistHashDialogButton(obj){
    if ($(obj).val() != ""){
        $("#charlet_systemdialog input[type=\"submit\"]").removeAttr("disabled");
    }else{
        $("#charlet_systemdialog input[type=\"submit\"]").attr("disabled","true");
    }
}

function Charlet_RegistorGroupWithDomain(id){
    ExecuteAjax({
        type: "GET",
        url: "?mode=domain&case=registgroup&groupid="+id,
        datatype: "html"
    },
    function(data) {
        $("#charlet_systemdialog_dialogcontent").html(data);
        document.getElementById("charlet_systemdialog").showModal();
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("エラーが発生しました。しばらく待ってやり直してください。");
        $("#charlet_systemdialog").attr("open","true");
    });
}

function Charlet_RegistGroupDialogButton(obj){
    if ($(obj).val() != ""){
        $("#charlet_systemdialog input[type=\"submit\"]").removeAttr("disabled");
    }else{
        $("#charlet_systemdialog input[type=\"submit\"]").attr("disabled","true");
    }
}

function Charlet_RemoveHashTagFromGroup(id){
    ExecuteAjax({
        type: "GET",
        url: "?mode=group&case=removehashtag&id="+id,
        datatype: "html"
    },
    function(data){
        $("#charlet_systemdialog_dialogcontent").html(data);
        document.getElementById("charlet_systemdialog").showModal();
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("エラーが発生しました。しばらく待ってやり直してください。");
        $("#charlet_systemdialog").attr("open","true");
    });
}

function Charlet_TweetDialog(){
    ExecuteAjax({
        type: "GET",
        url: "?mode=tweet&case=tweetdialog",
        datatype: "html"
    },
    function(data){
        $("#charlet_systemdialog_dialogcontent").html(data);
        document.getElementById("charlet_systemdialog").showModal();
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("エラーが発生しました。しばらく待ってやり直してください。");
        $("#charlet_systemdialog").attr("open","true");
    });
}

function Charlet_TweetDialogButton(obj) {
    if ($(obj).val() != ""){
        $("#charlet_systemdialog input[type=\"submit\"]").removeAttr("disabled");
    }else{
        $("#charlet_systemdialog input[type=\"submit\"]").attr("disabled","true");
    }
}

//---

function Charlet_Reply(id) {
    ExecuteAjax({
        type: "GET",
        url: "?mode=tweet&case=replytweetdialog&reply="+id,
        datatype: "html"
    },
    function(data){
        $("#charlet_systemdialog_dialogcontent").html(data);
        document.getElementById("charlet_systemdialog").showModal();
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("<h3>ログインしてください。</h3><p>この機能はログインしていないと使用することができません。</p>");
        document.getElementById("charlet_systemdialog").showModal();
    });
}

function Charlet_Favorite(obj,id) {
    ExecuteAjax({
        type: "GET",
        url: "?mode=tweet&case=favorite&id="+id,
        datatype: "html"
    },
    function(data){
        $(obj).children("span.favorite").html(data);
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("<h3>ログインしてください。</h3><p>この機能はログインしていないと使用することができません。</p>");
        document.getElementById("charlet_systemdialog").showModal();
    });
}

function Charlet_ReTweet(obj,id) {
    ExecuteAjax({
        type: "GET",
        url: "?mode=tweet&case=retweet&id="+id,
        datatype: "html"
    },
    function(data){
        $(obj).children("span.retweet").html(data);
        location.href = location.href;
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("<h3>ログインしてください。</h3><p>この機能はログインしていないと使用することができません。</p>");
        document.getElementById("charlet_systemdialog").showModal();
    });
}

function Charlet_ImagePosting(obj){
    var file = $(obj).prop('files')[0];
    var imgid = $(obj).parent().children("[type='hidden']").attr('value');
    
    if(imgid > 4) return;

    if(!file.type.match('image.*')){
        $(obj).val('');
        return;
    }

    var reader = new FileReader();
    reader.onload = function() {
        var img = $('<img>').attr('src',reader.result);
        var hidden = $('<input>')
                    .attr('type','hidden')
                    .attr('name','images_'+imgid)
                    .attr('value',reader.result);
        var div = $('<div>').addClass("systemdialog_thumbnail");
        $(div).html(img);
        $(div).append(hidden);
        $("span.dialog_tweetdialog_thumbnail").append(div);
    }
    reader.readAsDataURL(file);
    $(obj).parent().children("[type='hidden']").attr('value',Number(imgid) + 1);
}

function Charlet_ImageDetailDisplay(obj){

    source = $(obj).attr("src");
    data = "<img src='"+source+"' style='width:80vw;'>";

    $("#charlet_systemdialog_dialogcontent").html(data);
    document.getElementById("charlet_systemdialog").showModal();
}