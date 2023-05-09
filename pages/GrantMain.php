<div class="StationflexContainer">
    <?php
    include 'chart-style.php';
    include 'site-list.html';
    ?>
</div>
<div class="flexContainer chartarea">
    <div class="flexItem">
        <canvas class="chart" id="myChartBar"></canvas>
    </div>
    <div class="flexItem">
        <canvas class="chart" id="myChartLine"></canvas>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChartBar');
    const ctxline = document.getElementById('myChartLine');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Grant line bar',
                data: [12, 19, 20, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    new Chart(ctxline, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Grant line graph',
                data: [12, 19, 10, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>