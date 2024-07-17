// Sample data
const labels = ['June', 'July', 'August', 'September', 'October'];
const data = {
    labels: labels,
    datasets: [{
        label: 'Invoices Recorded',
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        data: [10, 20, 30, 25, 35],
    }]
};

// Configuration options
const config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            tooltip: {
                enabled: true,
                callbacks: {
                    labelColor: function(tooltipItem, chart) {
                        return {
                            color: 'black'
                        };
                    }
                }
            },
            legend: {
                labels: {
                    color: 'black' // Font color for legend
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
};

// Get the canvas element
const canvas = document.getElementById('myBarChart');

// Initialize the chart
var myChart = new Chart(canvas, config);