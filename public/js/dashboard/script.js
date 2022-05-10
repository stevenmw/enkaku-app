// const charts = document.querySelectorAll(".chart");

// charts.forEach(function (chart) {
//   var ctx = chart.getContext("2d");
//   var myChart = new Chart(ctx, {
//     type: "bar",
//     data: {
//       labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//       datasets: [
//         {
//           label: "# of Votes",
//           data: [12, 19, 3, 5, 2, 3],
//           backgroundColor: [
//             "rgba(255, 99, 132, 0.2)",
//             "rgba(54, 162, 235, 0.2)",
//             "rgba(255, 206, 86, 0.2)",
//             "rgba(75, 192, 192, 0.2)",
//             "rgba(153, 102, 255, 0.2)",
//             "rgba(255, 159, 64, 0.2)",
//           ],
//           borderColor: [
//             "rgba(255, 99, 132, 1)",
//             "rgba(54, 162, 235, 1)",
//             "rgba(255, 206, 86, 1)",
//             "rgba(75, 192, 192, 1)",
//             "rgba(153, 102, 255, 1)",
//             "rgba(255, 159, 64, 1)",
//           ],
//           borderWidth: 1,
//         },
//       ],
//     },
//     options: {
//       scales: {
//         y: {
//           beginAtZero: true,
//         },
//       },
//     },
//   });
// });

// $(document).ready(function () {
//   $(".data-table").each(function (_, table) {
//     $(table).DataTable();
//   });
// });

const chart = document.querySelector("#chart").getContext('2d');

// create a new instance
new Chart(chart, {
    type: 'line',
    data: {
        labels: ['23:30:18.184', '23:30:18.323', '23:30:18.416', '23:30:18.555', '23:30:18.650', '23:30:18.744', '23:30:18.883', '23:30:18.976', '23:30:19.115', '23:30:19.209', '23:30:19.302', '23:30:19.442'],

        datasets: [
            {
                label: 'Arus',
                data: [0.004, 0.008, 0.004, 0.012, 0.012, 0.012, 0.012, 0.012, 0.012, 0.016, 0.008, 0.036],
                borderColor: 'red',
                borderWidth: 2
            },
            {
                label: 'Kecepatan',
                data: [31500, 299076, 401506, 567843, 33572, 48874, 39973, 39973, 76543, 31164, 46578],
                borderColor: 'green',
                borderWidth: 2
            }
        ]
    },
    option: {
        responsive: true
    }
})