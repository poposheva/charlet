<div class="hashtaglist">
    {foreach from=$data item=com}
        <div class="hashtaglist_row">
            <a href="?mode=domain&case=main&word={urlencode($com.name)}">{$com.name}</a>

            <a tabindex="0" class="remove" onclick="Charlet_RemoveHashTagFromGroup({$com.id});">グループから外す</a>
        </div>
    {/foreach}
</div>