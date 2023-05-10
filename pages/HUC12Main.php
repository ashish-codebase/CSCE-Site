<h1>HUC12 Weather Station Data</h1>

<div class="container">
    <div class="row">
        <div class="col-lg">  <canvas id="vpdmaxChart"></canvas>
</div>
        <div class="col-lg">  <canvas id="tmaxChart"></canvas>
</div>
    </div>
    <div class="row">
        <div class="col-lg">  <canvas id="tminChart"></canvas>
</div>
        <div class="col-lg">  <canvas id="gddChart"></canvas>
</div>
    </div>
    <div class="row">
        <div class="col-lg">  <canvas id="airPressureChart"></canvas>
</div>

    </div>
</div>

  <script>
    d3.csv("./Data/HUC12_compiled.csv").then(function(data) {
      const labels = data.map(d => d.DateTime);
      const vpdmaxData = data.map(d => d.VPDmax);
      const tmaxData = data.map(d => d.Tmax_F);
      const tminData = data.map(d => d.Tmin_F);
      const gddData = data.map(d => d.GDD_cum);
      const ETc_Sum = data.map(d => d.ETc_mm);

      const vpdmaxChart = new Chart(document.getElementById("vpdmaxChart"), {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{ 
            data: vpdmaxData,
            label: "VPD max (Pa)",
            borderColor: "#3e95cd",
            fill: false
          }]
        }
      });

      const tmaxChart = new Chart(document.getElementById("tmaxChart"), {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{ 
            data: tmaxData,
            label: "Max Temperature (F)",
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
            label: "Min Temperature (F)",
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
            label: "Cumulative GDD (F)",
            borderColor: "#e8c3b9",
            fill: false
          }]
        }
      });

      const airPressureChart = new Chart(document.getElementById("airPressureChart"), {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{ 
            data: ETc_Sum,
            label: "Evapotranspiration (mm)",
            borderColor: "#c45850",
            fill: false
          }]
        }
      });
    });
  </script>
</div>