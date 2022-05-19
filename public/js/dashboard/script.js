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

const trayektoriChart = document.querySelector("#trayektori-chart").getContext('2d');


// create a new instance
const trayektoriGraph = new Chart(trayektoriChart, {
    type: 'line',
    option: {
        responsive: true
    }
})

function drawChart(X=[],Y=[]){
   
    graph.data.labels = X;
    graph.data.datasets = Y;
    graph.update();
}

function showData(){
    const form = new FormData(document.getElementById('form-show'));
    axios.post('/process-file',form)
    .then(function(response){
        console.log(response);
    }).catch(function(error){
        console.log(error);
    });
    // axios.get('/process-file')
    // .then(function(response){
    //     yAxis = [
    //         {
    //             label: 'Elbow',
    //             data: response.data.elbow,
    //             borderColor: 'red',
    //             borderWidth: 0.5,
    //             backgroundColor:'red'
    //         },
    //         {
    //             label: 'Shoulder',
    //             data: response.data.shoulder,
    //             borderColor: 'green',
    //             borderWidth: 0.5,
    //             backgroundColor:'green'
    //         }
    //     ];
    //     xAxis = response.data.realTime;
    //     drawChart(xAxis,yAxis);
    //     // console.log(response.data);
    // }).catch(function(err){
    //     console.log(err);
    // });
}