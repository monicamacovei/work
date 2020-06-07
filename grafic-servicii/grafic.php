<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <link href="https://fonts.googleapis.com/css?family=Stardos+Stencil:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div class="values">
            <span><?php echo $_GET["val2015"];?></span>
            <span><?php echo $_GET["val2016"];?></span>
            <span><?php echo $_GET["val2017"];?></span>
            <span><?php echo $_GET["val2018"];?></span>
            <span><?php echo $_GET["val2019"];?></span>
        </div>
        <div class="chart-marca chart"></div>
        <div class="chart-year">
            <div>2015</div>
            <div>2016</div>
            <div>2017</div>
            <div>2018</div>
            <div>2019</div>
        </div>
        <script src="js/code.js"></script>
    </body>
</html>
