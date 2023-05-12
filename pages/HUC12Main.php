<div class="general">
    <div class="text-div center strong-txt">
    <h2>HUC12 Weather Station Data</h1>
    </div>
</div>
<?php include './pages/site-list.html';?>

<?php include './pages/chart-template.html';?>
<?php 
    $_POST["CSV_path"]="./Data/HUC12_compiled.csv";
    include "./pages/chart-common.js";
 ?>

<!-- <script src="./pages/chart-common.js" data-args="./Data/HUC12_compiled.csv"></script> -->

</div>