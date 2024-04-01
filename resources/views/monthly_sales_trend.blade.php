<!-- resources/views/monthly_sales_trend.blade.php -->
<div>
    <canvas id="monthly-sales-trend-chart"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Make AJAX request to fetch data
    fetch('/charts/monthly-sales-trend')
        .then(response => response.json())
        .then(data => {
            // Data received, render the chart
            const ctx = document.getElementById('monthly-sales-trend-chart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.map(item => item.month_year),
                    datasets: [{
                        label: 'Total Revenue',
                        data: data.map(item => item.total_revenue),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
        });
</script>
