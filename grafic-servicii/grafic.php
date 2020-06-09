<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Stardos+Stencil:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div class="values">
            <?php foreach($_GET as $value) { ?>
            <span><?php echo $value?></span>
            <?php } ?>
        </div>
        <div class="chart-marca chart"></div>
        <div class="chart-year">
            <?php foreach(array_keys($_GET) as $key) { ?>
            <div><?php echo $key?></div>
            <?php } ?>
        </div><a href="" download="graph.svg">Salveaza</a>
        <a href="" download="graph.webp">Salveaza ca Webp</a>
        <script src="js/code.js"></script>
    </body>
</html>
