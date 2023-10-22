// // Include this code in mychart.js
// $(document).ready(function() {
//     // Fetch data from the database and populate it in the chart
//     $.ajax({
//         url: 'fetch_chart_data.php', // Create a PHP file to fetch data
//         type: 'POST',
//         dataType: 'json',
//         success: function(data) {
//             var productNames = data.productNames;
//             var quantities = data.quantities;

//             var ctx = document.getElementById("myAreaChart").getContext('2d');
//             var myChart = new Chart(ctx, {
//                 type: 'line',
//                 data: {
//                     labels: productNames,
//                     datasets: [{
//                         label: 'Quantity',
//                         data: quantities,
//                         fill: true,
//                         backgroundColor: 'rgba(75, 192, 192, 0.2)',
//                         borderColor: 'rgba(75, 192, 192, 1)',
//                         borderWidth: 1
//                     }]
//                 },
//                 options: {
//                     responsive: true,
//                     maintainAspectRatio: false,
//                     scales: {
//                         x: {
//                             beginAtZero: true
//                         },
//                         y: {
//                             beginAtZero: true
//                         }
//                     }
//                 }
//             });
//         }
//     });
// });
