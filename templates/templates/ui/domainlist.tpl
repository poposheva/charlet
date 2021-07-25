<div class="domainlist">
    {foreach from=$data item=com}
        <a class="domainlist_tablist {if $selector eq $com.id}selected{/if}"
            href="?mode=domain&case=main&select={$com.id}"
        >
            {$com.name}
        </a>
    {/foreach}
    {if $authority != false}
        <a class="domainlist_tablist"
            onclick="Charlet_CreateDomain()"
        >
            ＋追加する
        </a>
    {/if}
</div>