
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
        $(obj).parent().children("span.favorite").html(data);
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
        $(obj).parent().children("span.retweet").html(data);
    },
    function (XMLHttpRequest,textStatus,errorThrown) {
        $("#charlet_systemdialog_dialogcontent").html("<h3>ログインしてください。</h3><p>この機能はログインしていないと使用することができません。</p>");
        document.getElementById("charlet_systemdialog").showModal();
    });
}