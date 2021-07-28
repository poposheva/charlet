<div class="pageheader">
    {if $type eq 'HashTag'}
        <h3>{$data.name}</h3>
        {if $link}
            <a class="pageheader_link" {if $link.href}href="{$link.href}"{/if} onclick="{$link.onclick}">
                {$link.text}
            </a>
        {/if}
        <hr />
        <div class="pageheader_categorylist">
            <a class="domainlist_tablist {if $category eq 1}selected{/if}"
                href="?mode=hashtag&case=page&select={$select}&category=1"
            >
                新着順
            </a>
            <a class="domainlist_tablist {if $category eq 2}selected{/if}"
                href="?mode=hashtag&case=page&select={$select}&category=2"
            >
                人気順
            </a>
        </div>
    {/if}

    {if $type eq 'Group'}
        <h3>{$data.name}</h3>
        <p>{$data.description}</p>
        {if $link}
            <a class="pageheader_link" {if $link.href}href="{$link.href}"{/if} onclick="{$link.onclick}">
                {$link.text}
            </a>
        {/if}
        <hr />
        <div class="pageheader_categorylist">
            <a class="domainlist_tablist {if $category eq 1}selected{/if}"
                href="?mode=group&case=page&select={$select}&category=1"
            >
                新着順
            </a>
            <a class="domainlist_tablist {if $category eq 2}selected{/if}"
                href="?mode=group&case=page&select={$select}&category=2"
            >
                人気順
            </a>
            <a class="domainlist_tablist {if $category eq 3}selected{/if}"
                href="?mode=group&case=page&select={$select}&category=3"
            >
                ハッシュタグ一覧
            </a>
        </div>
    {/if}

    {if $type eq 'My'}
        <h3>{$data.name}</h3>
        <p>{$data.mail}</p>
        {if $link}
            <a class="pageheader_link" href="{$link.href}" onclick="{$link.onclick}">
                {$link.text}
            </a>
        {/if}
        <hr />
        <div class="pageheader_categorylist">
            <a class="domainlist_tablist {if $category eq 1}selected{/if}"
                href="?mode=account&case=mypage&category=1"
            >
                新着順
            </a>
            <a class="domainlist_tablist {if $category eq 2}selected{/if}"
                href="?mode=account&case=mypage&category=2"
            >
                人気順
            </a>
        </div>
    {/if}

    {if $type eq 'Account'}
        <h3>{$data.name}</h3>
        <p>{$data.mail}</p>
        <hr />
        <div class="pageheader_categorylist">
            <a class="domainlist_tablist {if $category eq 1}selected{/if}"
                href="?mode=account&case=userpage&select={$select}&category=1"
            >
                新着順
            </a>
            <a class="domainlist_tablist {if $category eq 2}selected{/if}"
                href="?mode=account&case=userpage&select={$select}&category=2"
            >
                人気順
            </a>
        </div>
    {/if}
</div>