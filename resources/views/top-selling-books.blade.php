<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Selling Books Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div>
    <canvas id="top-selling-books-chart"></canvas>
</div>

<script>
    // Make AJAX request to fetch data
    fetch('/top-selling-books') // Make sure the URL matches your route
        .then(response => response.text())
        .then(data => {
            // Parse JSON data
            const jsonData = JSON.parse(data);

            // Log the data to console to verify format
            console.log(jsonData);

            // Data received, render the chart
            const ctx = document.getElementById('top-selling-books-chart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: jsonData.map(item => item.name),
                    datasets: [{
                        label: 'Number of Orders',
                        data: jsonData.map(item => item.orders_count),
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
</body>
</html>
