{if $formhead.headertext}
    <h1>{$formhead.headertext}</h1>
{/if}
    {if $formhead.errormessage}
        <p style="color:red;text-align:center">{$formhead.errormessage}</p>
    {/if}
<form class="webform" method="{$formhead.method}" action="{$formhead.action}">
    {foreach from=$formdata item=com}
        <label>{$com.label} {if $com.error}{$com.errormessage}{/if}
            <input type="{$com.type}" name="{$com.name}"
                {if $com.value}value="{$com.value}"{/if}
                placeholder="{$com.placeholder}"
                {if $com.required}required{/if}
                {if $com.autofocus}autofocus{/if}
            />
        </label>
    {/foreach}

    <input type="submit" value="{$formhead.submit}">
    {if $formhead.auxiliary_link}
        {$formhead.auxiliary_link}
    {/if}
</form>


