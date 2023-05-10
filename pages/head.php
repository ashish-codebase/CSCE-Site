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
    <script src="./jquery.js"></script>
    <script src="./resources/chart.js"></script>
    <script src="./resources/d3.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Daily EC data from towers.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php if ($page_css != "./CSS/Main.css") {
        echo '<link rel="stylesheet" type="text/css" href=' . $page_css . '>';
    }
    ?>
    <link rel="stylesheet" type="text/css" href="./CSS/Main.css">
    <link rel="stylesheet" type="text/css" href="./pages/NavBar.css">

    <link rel="stylesheet" type="text/css" href="./CSS/stations.css">
</head>