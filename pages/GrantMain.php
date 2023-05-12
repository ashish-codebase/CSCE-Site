
<div class="general">
    <div class="text-div center strong-txt">
    <h2>Grant Weather Station Data</h1>
    </div>
</div>
<?php include './pages/site-list.html'?>
<!-- <?php include './pages/chart-template.html'?> -->
<?php
$_POST["CSV_path"]="./Data/Grant_compiled.csv";
 include './pages/charts.php';
 ?>

<!-- <script src="./pages/chart-common.js" data-args="./Data/Grant_compiled.csv"></script> -->

</div>