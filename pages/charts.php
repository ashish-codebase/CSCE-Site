    <div class="slider">
        <div id="slider"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg"> <canvas class="col-lg" id="vpdmaxChart"></canvas>
            </div>
            <div class="col-lg"> <canvas class="col-lg" id="tmaxChart"></canvas>
            </div>
            <div class="col-lg"> <canvas id="tminChart"></canvas>
            </div>
            <div class="col-lg"> <canvas id="gddChart"></canvas>
            </div>
            <div class="col-lg"> <canvas id="airPressureChart"></canvas>
            </div>
        </div>
        <div id="csv_path"><?php echo $_POST["CSV_path"]; ?></div>

    </div>

    <script>
        var csv_path = document.getElementById("csv_path");
        console.log(csv_path);
        d3.csv(csv_path).then(function(data) {
            const parseDate = d3.timeParse("%Y-%m-%d");
            // var lable_formatted = [];
            // Convert date strings to JavaScript Date objects
            data.forEach(function(d) {
                // console.log(d);
                d.date = parseDate(d.DateTime);
                // console.log(d.date);
                // lable_formatted.push(d.date);
            });
            //.toLocaleDateString('en-US')
            const labels = data.map(d => d.date);
            // const labels = lable_formatted;
            const vpdmaxData = data.map(d => isNan(d.VPDmax)? NaN:d.VPDmax);
            // console.log(vpdmaxData);
            // console.log(labels);

            const tmaxData = data.map(d => d.Tmax_F);
            const tminData = data.map(d => d.Tmin_F);
            const gddData = data.map(d => d.GDD_cum);
            const ETc_mmData = data.map(d => d.ETc_mm);

            const vpdmaxChart = new Chart(document.getElementById("vpdmaxChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        data: vpdmaxData,
                        label: "VPDmax",
                        borderColor: "#3e95cd",
                        fill: false
                    }]
                },
            });

            const tmaxChart = new Chart(document.getElementById("tmaxChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        data: tmaxData,
                        label: "Tmax",
                        borderColor: "#8e5ea2",
                        fill: false
                    }]
                }
            });

            const tminChart = new Chart(document.getElementById("tminChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        data: tminData,
                        label: "Tmin",
                        borderColor: "#3cba9f",
                        fill: false
                    }]
                }
            });

            const gddChart = new Chart(document.getElementById("gddChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        data: gddData,
                        label: "GDD",
                        borderColor: "#e8c3b9",
                        fill: false
                    }]
                }
            });

            const ETc_mmChart = new Chart(document.getElementById("ETc_mmChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        data: airPressureData,
                        label: "ETc (mm)",
                        borderColor: "#c45850",
                        fill: false
                    }]
                }
            });

            // Create the date range slider
            const slider = document.getElementById("slider");
            const dateRange = [labels[0], labels[labels.length - 1]];
            noUiSlider.create(slider, {
                range: {
                    min: new Date(dateRange[0]).getTime(),
                    max: new Date(dateRange[1]).getTime()
                },
                step: 24 * 60 * 60 * 1000, // One day in milliseconds
                // tooltips: [true, true],
                connect: true,
                behaviour: 'drag',
                start: [new Date(dateRange[0]).getTime(), new Date(dateRange[1]).getTime()]
            });

            // Update the charts when the slider range changes
            slider.noUiSlider.on("update", function(values, handle) {
                const startDate = new Date(+values[0]);
                const endDate = new Date(+values[1]);

                // Filter the data based on the selected range
                const filteredData = data.filter(function(d) {
                    return d.date >= startDate && d.date <= endDate;
                });

                // Update the labels and data arrays for each chart
                const filteredLabels = filteredData.map(d => d.date.toLocaleDateString('en-US'));
                const filteredVpdmaxData = filteredData.map(d => d.VPDmax);
                const filteredTmax_FData = filteredData.map(d => d.Tmax_F);
                const filteredTmin_FData = filteredData.map(d => d.Tmin_F);
                const filteredGDD_cumData = filteredData.map(d => d.GDD_cum);
                const filteredETc_mmData = filteredData.map(d => d.ETc_mm);

                // Update the chart data
                vpdmaxChart.data.labels = filteredLabels;
                vpdmaxChart.data.datasets[0].data = filteredVpdmaxData;
                vpdmaxChart.update();

                tmaxChart.data.labels = filteredLabels;
                tmaxChart.data.datasets[0].data = filteredTmax_FData;
                tmaxChart.update();

                tminChart.data.labels = filteredLabels;
                tminChart.data.datasets[0].data = filteredTmin_FData;
                tminChart.update();

                gddChart.data.labels = filteredLabels;
                gddChart.data.datasets[0].data = filteredGDD_cumData;
                gddChart.update();

                ETc_mmChart.data.labels = filteredLabels;
                ETc_mmChart.data.datasets[0].data = filteredETc_mmData;
                ETc_mmChart.update();
            });
        });
    </script>