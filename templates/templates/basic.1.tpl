<!DOCTYPE html5>
<html>
    <head>
        <title>Charlet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/main.js"></script>
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
