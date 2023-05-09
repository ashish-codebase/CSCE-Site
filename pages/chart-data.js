const ctxBar = document.getElementById('myChartBar');
const ctxline = document.getElementById('myChartLine');

const date = new Date();
var mSec = 86400000;
var daysCount = 366;


let vals = [];
let label = [];
vals.push("Pear");
for (let step = 0; step < daysCount; step++) {
    if (step > 10 && step < 40) {
        vals.push(NaN);
    }
    else
    {
        vals.push(Math.random() * 100);
    }
    var oldDate = new Date(date - mSec * step);
    var oldShortDate = oldDate.toLocaleDateString();
    label.push(oldShortDate);
}
label.reverse();

d3.csv('https://s3-us-west-2.amazonaws.com/s.cdpn.io/2814973/atp_wta.csv')
  .then(makeChart);
function makeChart() {
new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label: 'Sutherland bar graph',
            data: vals,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});
}

new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label: 'Sutherland bar graph',
            data: vals,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});

new Chart(ctxline, {
    type: 'line',
    data: {
        labels: label,
        datasets: [{
            label: 'Sutherland line graph',
            data: vals,
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
