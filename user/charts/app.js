document.addEventListener("DOMContentLoaded", function () {
    const ctx1 = document.getElementById('children').getContext('2d');
    const ctx2 = document.getElementById('stongone').getContext('2d');

    // Data for the first donut chart
    const emergingTrendsData = {
        labels: ['Emerging Trends'],
        datasets: [{
            data: [91, 9],  // 91% and 9% for the remaining part
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    // Data for the second donut chart
    const priceFluctuationsData = {
        labels: ['Price Fluctuations'],
        datasets: [{
            data: [43, 57],  // 43% and 57% for the remaining part
            backgroundColor: ['#2ECC71', '#D0D3D4'],
            hoverBackgroundColor: ['#27AE60', '#BFC9CA']
        }]
    };

    // Options for both charts
    const options = {
        responsive: true,
        plugins: {
            tooltip: {
                enabled: false
            },
            legend: {
                display: false
            },
            title: {
                display: true,
                text: (ctx) => {
                    if (ctx.chart.canvas.id === 'children') {
                        return 'Emerging Trends';
                    } else {
                        return 'Price Fluctuations';
                    }
                }
            }
        },
    };

    // Create the first donut chart
    new Chart(ctx1, {
        type: 'doughnut',
        data: emergingTrendsData,
        options: options
    });

    // Create the second donut chart
    new Chart(ctx2, {
        type: 'doughnut',
        data: priceFluctuationsData,
        options: options
    });
});