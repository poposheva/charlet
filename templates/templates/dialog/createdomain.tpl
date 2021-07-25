<form class="dialog_registhash" method="POST" action="?mode=domain&case=create">
    <h3>新しいドメインを作成します。</h3>
    <h4>ドメイン名</h4>
    <input type="text" name="name" required autofocus value="" onkeyup="Charlet_CreateGroupButton($(this))">
    <h4>ドメインの説明</h4>
    <textarea name="desc"></textarea>
    <input type="hidden" name="hashid" value="{$hashid}">

    <input type="submit" value="登録する" disabled="true">
</form>
