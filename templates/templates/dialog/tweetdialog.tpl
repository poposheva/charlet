<form class="dialog_tweetdialog" method="POST" action="?mode=tweet&case=execute">
    <img src="image/icon.png" aria-hidden="true">
    <div>
        <textarea autofocus name="tweet" placeholder="ここにコメントを入力" onkeyup="Charlet_TweetDialogButton($(this))"></textarea>
        <hr />
        <input type="submit" value="コメントする" disabled="true">
    </div>
</form>
