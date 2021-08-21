<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Charlet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="shortcut icon" href="image/charlet.png">

        {$Header}

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/common.js" defer></script>
        <script src="js/main.js" defer></script>
    </head>
    <body>
        {if $ContentHeader}
            <header>
                {$ContentHeader}
            </header>
        {/if}

        <main class="{$ContentDisplayOption}">
            {$ContentMain0}
            {$ContentMain1}
            {$ContentMain2}
            {$ContentMain3}
            {$ContentMain4}
            {$ContentMain5}
            {$ContentMain6}
        </main>

        {if $ContentFooter}
            <footer>
                {$ContentFooter}
            </footer>
        {/if}

        <dialog id="charlet_systemdialog">
            <button class="close_button" onclick="Charlet_DialogClose()">×</button>
            <hr />
            <div id="charlet_systemdialog_dialogcontent">

            </div>
        </dialog>
    </body>
</html>
