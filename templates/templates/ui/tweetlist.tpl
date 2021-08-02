{if count($data.tweet) == 0 && $recurtion == 0}
    <p>まだツイートが無いようです・・・</p>
{/if}
{foreach from=$data.tweet item=com}
{if $com.type eq ''}
    <div class="tweetbody">
        <a href="?mode=account&case=userpage&select={$com.poster}">
            <img alt="ユーザーアイコン" class="tweetbody_header_usericon" src="image/icon.png">
        </a>
        <div>
            <div class="tweetbody_header">
                <a href="?mode=account&case=userpage&select={$com.poster}">
                    <p class="tweetbody_header_username">{$data.user[$com.poster].name}</p>
                    <p class="tweetbody_header_usermail">{$data.user[$com.poster].mail}</p>
                </a>
                <p class="tweetbody_header_time">{TimeRelationship($com.time)}</p>
            </div>
            <div class="tweetbody_tweet">
                {TweetTransform($com.tweet)}
            </div>
            <div class="tweetbody_footer">
                <img alt="返信する" src="image/reply.png" onclick="Charlet_Reply({$com.id})"><span class="reply" onclick="Charlet_Reply({$com.id})">返信</span>
                <img alt="いいねする" src="image/favorite.png" onclick="Charlet_Favorite($(this),{$com.id})"><span class="favorite">{$com.favorite}</span>
                <img alt="リツイートする" src="image/retweet.png" onclick="Charlet_ReTweet($(this),{$com.id})"><span class="retweet">{$com.retweet}</span>
            </div>
        </div>
    </div>
    {include file='ui/tweetlist.tpl' data=TweetReplys($data,$com.id) recurtion=1}
{/if}

{if $com.type eq 'R'}
    <div class="tweetbody reply">
        <a href="?mode=account&case=userpage&select={$com.poster}">
            <img alt="ユーザーアイコン" class="tweetbody_header_usericon" src="image/icon.png">
        </a>
        <div>
            <div class="tweetbody_header">
                <a href="?mode=account&case=userpage&select={$com.poster}">
                    <p class="tweetbody_header_username">{$data.user[$com.poster].name}</p>
                    <p class="tweetbody_header_usermail">{$data.user[$com.poster].mail}</p>
                </a>
                <p class="tweetbody_header_time">{TimeRelationship($com.time)}</p>
            </div>
            <div class="tweetbody_tweet">
                {TweetTransform($com.tweet)}
            </div>
            <div class="tweetbody_footer">
                <img alt="返信する" src="image/reply.png" onclick="Charlet_Reply({$com.id})"><span class="reply" onclick="Charlet_Reply({$com.id})">返信</span>
                <img alt="いいねする" src="image/favorite.png" onclick="Charlet_Favorite($(this),{$com.id})"><span class="favorite">{$com.favorite}</span>
                <img alt="リツイートする" src="image/retweet.png" onclick="Charlet_ReTweet($(this),{$com.id})"><span class="retweet">{$com.retweet}</span>
            </div>
        </div>
    </div>
    {include file='ui/tweetlist.tpl' data=TweetReplys($data,$com.id) recurtion=1}
{/if}

{if $com.type eq 'RETWEET'}
    {assign var="retweeter" value=$data.user[$com.poster].name}
    {assign var="com" value=TweetReTweetData($data,$com.tweet) }
    <div class="tweetbody">
        <h4>{$retweeter}さんがリツイートしました。</h4>
        <a href="?mode=account&case=userpage&select={$com.poster}">
            <img alt="ユーザーアイコン" class="tweetbody_header_usericon" src="image/icon.png">
        </a>
        <div>
            <div class="tweetbody_header">
                <a href="?mode=account&case=userpage&select={$com.poster}">
                    <p class="tweetbody_header_username">{$data.user[$com.poster].name}</p>
                    <p class="tweetbody_header_usermail">{$data.user[$com.poster].mail}</p>
                </a>
                <p class="tweetbody_header_time">{TimeRelationship($com.time)}</p>
            </div>
            <div class="tweetbody_tweet">
                {TweetTransform($com.tweet)}
            </div>
            <div class="tweetbody_footer">
                <img alt="返信する" src="image/reply.png" onclick="Charlet_Reply({$com.id})"><span class="reply" onclick="Charlet_Reply({$com.id})">返信</span>
                <img alt="いいねする" src="image/favorite.png" onclick="Charlet_Favorite($(this),{$com.id})"><span class="favorite">{$com.favorite}</span>
                <img alt="リツイートする" src="image/retweet.png" onclick="Charlet_ReTweet($(this),{$com.id})"><span class="retweet">{$com.retweet}</span>
            </div>
        </div>
    </div>
{/if}
{/foreach}