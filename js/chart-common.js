const args = document.currentScript.dataset.args;
d3.csv(args).then(function (data) {
    const parseDate = d3.timeParse("%Y-%m-%d");
    // var lable_formatted = [];
    // Convert date strings to JavaScript Date objects
    data.forEach(function (d) {
        // console.log(d);
        d.date = parseDate(d.DateTime);
        // console.log(d.date);
        // lable_formatted.push(d.date);
    });
    //.toLocaleDateString('en-US')
    const labels = data.map(d => d.date);
    // const labels = lable_formatted;
    const vpdmaxData = data.map(d => d.VPDmax);

    const tmaxData = data.map(d => d.Tmax_F);
    const tminData = data.map(d => d.Tmin_F);
    const cum_gddData = data.map(d => d.GDD_cum);
    const ETc_mmData1 = data.map(d => d.ETc_mm);
    const ETc_mmData2 = data.map(d => d.ETc_mm);

    Chart.defaults.color = '#665555';
    Chart.defaults.font.size = 14;
    Chart.defaults.font.weight = 'bold';

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
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Max. Vapor Pressure Deficit (Pa)'
                    }
                },

            },
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
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'T Max (F)'
                    }
                },

            }
        },
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
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'T Min (F)'
                    }
                },

            }
        },
    });

    const gddChart = new Chart(document.getElementById("gddChart"), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                data: cum_gddData,
                label: "Cumulative GDD",
                borderColor: "#830306",
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Cumulative Growing Degree Days (F)'
                    }
                },

            }
        },
    });

    const ETc_mmChart = new Chart(document.getElementById("ETc_mmChart"), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                data: ETc_mmData1,
                label: "Evapotranspiration (mm)",
                backgroundColor: "#c45850",
                fill: false
            },
            {
                data: ETc_mmData2,
                label: "Evapotranspiration 2(mm)",
                backgroundColor: "#0033dd",
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Daily Evapotranspiration 2(mm)'
                    }
                },

            }
        },
        
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
        connect: true,
        behaviour: 'drag',
        start: [new Date(dateRange[1]).getTime() - (21 * 86400000), new Date(dateRange[1]).getTime()] //Default view: with last 21 days of data. Checked if the entire datast is less then start location is just at the beginning of the slider.
    });

    // Update the charts when the slider range changes
    slider.noUiSlider.on("update", function (values, handle) {
        const startDate = new Date(+values[0]);
        const endDate = new Date(+values[1]);
        document.getElementById("StartDate").innerText = startDate.toLocaleDateString();
        document.getElementById("EndDate").innerText = endDate.toLocaleDateString();

        // Filter the data based on the selected range
        const filteredData = data.filter(function (d) {
            return d.date >= startDate && d.date <= endDate;
        });

        // Update the labels and data arrays for each chart
        const filteredLabels = filteredData.map(d => d.date.toLocaleDateString('en-US'));
        const filteredVpdmaxData = filteredData.map(d => (d.VPDmax === "") ? NaN : d.VPDmax);
        const filteredTmax_FData = filteredData.map(d => (d.Tmax_F === "") ? NaN : d.Tmax_F);
        const filteredTmin_FData = filteredData.map(d => (d.Tmin_F === "") ? NaN : d.Tmin_F);
        const filteredGDD_cumData = filteredData.map(d => (d.GDD_cum === "") ? NaN : d.GDD_cum);
        const filteredETc_mmData1 = filteredData.map(d => (d.ETc_mm === "" || d.ETc_mm === "0.0") ? NaN : d.ETc_mm);
        const filteredETc_mmData2 = filteredData.map(d => (d.ETc_mm === "" || d.ETc_mm === "0.0") ? NaN : d.ETc_mm*0.75);


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
        ETc_mmChart.data.datasets[0].data = filteredETc_mmData1;
        ETc_mmChart.data.datasets[1].data = filteredETc_mmData2;
        ETc_mmChart.update();
    });
});
