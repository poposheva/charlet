<form class="dialog_tweetdialog" method="POST" action="?mode=tweet&case=execute" enctype="multipart/form-data">
    <img src="image/icon.png" aria-hidden="true">
    <div>
        <textarea autofocus name="tweet" placeholder="ここにコメントを入力" onkeyup="Charlet_TweetDialogButton($(this))"></textarea>
        <hr />
        <span class="dialog_tweetdialog_thumbnail"></span>
        <label class="image_button">
            <input onchange="Charlet_ImagePosting($(this));" type="file" accept="image/*">
            <img src="image/tweet_image.png" alt="画像を投稿する">
        </label>
        <input type="submit" value="コメントする" disabled="true">
    </div>
</form>
