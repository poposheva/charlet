<div class="header">
    {if $CharletLogin}
        <a class="header_icon_up" href="?mode=account&case=mypage">
            <img alt="マイページへ" src="image/home.png" title="マイページへ">
        </a>
    {/if}
        <a class="header_icon_up" href="?mode=domain&case=main">
            <img alt="トレンドページへ" src="image/hash.png" title="トレンド">
        </a>
    {if $CharletLogin}
        {if 0}
        <a class="header_icon_up" href="?mode=account&case=timeline">
            <img src="image/time.png">
        </a>
        <a class="header_icon_up" href="">
            <img src="image/icon.png">
        </a>
        {/if}
        <a class="header_icon_down" tabindex="0" onclick="Charlet_TweetDialog()" onkeypress="Charlet_TweetDialog()">
            <img alt="つぶやく" src="image/tweet.png" title="つぶやく">
        </a>    
    {else}
        <a class="header_icon_down" href="?mode=account&case=loginform">
            <img alt="ログインする" src="image/login.png" title="ログインする">
        </a>    
    {/if}
</div>