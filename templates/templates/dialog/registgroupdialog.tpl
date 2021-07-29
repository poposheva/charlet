<form class="dialog_registhash" method="POST" action="?mode=domain&case=registgroup">
    <select autofocus name="domain" onchange="Charlet_RegistGroupDialogButton($(this))">
        <option value="">登録先を選択してください・・・</option>
        {foreach from=$domainlist item=com}
            {if $com.id neq 1}
                <option value="{$com.id}">{$com.name}</option>
            {/if}
        {/foreach}
    </select>
    <input type="hidden" name="groupid" value="{$groupid}">

    <input type="submit" value="登録する" disabled="true">
</form>
