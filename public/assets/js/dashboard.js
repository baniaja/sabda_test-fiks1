/* globals Chart:false */

document.addEventListener('DOMContentLoaded', () => {

  // Graphs
  const ctx = document.getElementById('myChart')
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        backgroundColor: '#007bff',
        borderColor: '#007bff',
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          boxPadding: 3
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  })
});
