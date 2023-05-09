<div class="StationflexContainer">
    <?php
    include 'chart-style.php';
    include 'site-list.html';
    ?>
</div>
<div class="container-fluid bg60-1 p-3 m-0">
    <div class="row">
        <div class="col-lg-6">
            <canvas class="chart" id="myChartBar"></canvas>
            <p class="p-space">Daily maximum temperature from the reserach tower. In case the 
                max. tempname is not available we get the data from the nearest 
                HPRCC weather station.
            </p>
        </div>
        <div class="col-lg-6">
        <canvas class="chart" id="myChartLine"></canvas>
        <p class="p-space">hello world first chart.</p>
    </div>
    </div>
</div>
<script src="./pages/chart-data.js"></script>
