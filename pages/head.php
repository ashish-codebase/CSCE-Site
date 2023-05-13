<?php
@session_start();
// header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
// header("Pragma: no-cache"); // HTTP 1.0.
// header("Expires: 0"); // Proxies.
?>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JNPG6CTKFN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-JNPG6CTKFN');
    </script>
    <script src="./js/jquery.js"></script>
    <script src="./js/chart.js"></script>
    <script src="./js/d3.min.js"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="./js/nouislider.min.js"></script>
    <link rel="stylesheet" href="./CSS/nouislider.min.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Daily EC data from towers.</title>
    <link href="./CSS/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="./js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php if ($page_css != "./CSS/Main.css") {
        echo '<link rel="stylesheet" type="text/css" href=' . $page_css . '>';
    }
    ?>
    <link rel="stylesheet" type="text/css" href="./CSS/Main.css">
    <link rel="stylesheet" type="text/css" href="./pages/NavBar.css">

    <link rel="stylesheet" type="text/css" href="./CSS/stations.css">
</head>