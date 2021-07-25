<form class="dialog_registhash" method="POST" action="?mode=group&case=registhash">
    <select autofocus name="group" onchange="Charlet_RegistHashDialogButton($(this))">
        <option value="">登録先を選択してください・・・</option>
        {foreach from=$grouplist item=com}
            <option value="{$com.id}">{$com.name}</option>
        {/foreach}
    </select>
    <input type="hidden" name="hashid" value="{$hashid}">
    <a tabindex="0" onclick="Charlet_CreateGroupDialog({$hashid})">新しくグループを作成して登録する</a>

    <input type="submit" value="登録する" disabled="true">
</form>
