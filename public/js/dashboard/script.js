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
const currentFlexNoMoveChart = document.querySelector("#current-flex-no-move-chart").getContext('2d');
const currentExtenNoMoveChart = document.querySelector("#current-exten-no-move-chart").getContext('2d');
const currentFlexMoveChart = document.querySelector("#current-flex-move-chart").getContext('2d');
const currentExtenMoveChart = document.querySelector("#current-exten-move-chart").getContext('2d');
const velocityChart = document.querySelector("#velocity-chart").getContext('2d');


// create a new instance
const trayektoriGraph = new Chart(trayektoriChart, {
    type: 'line',
    option: {
        responsive: true
    }
})

const velocityGraph = new Chart(velocityChart, {
    type: 'line',
    option: {
        responsive: true
    }
})

const currentFlexNoMoveGraph = new Chart(currentFlexNoMoveChart, {
    type: 'line',
    option: {
        responsive: true
    }
})

const currentExtenNoMoveGraph = new Chart(currentExtenNoMoveChart, {
    type: 'line',
    option: {
        responsive: true
    }
})

const currentFlexMoveGraph = new Chart(currentFlexMoveChart, {
    type: 'line',
    option: {
        responsive: true
    }
})

const currentExtenMoveGraph = new Chart(currentExtenMoveChart, {
    type: 'line',
    option: {
        responsive: true
    }
})

// Update Chart 
function drawChart(graph={},X=[],Y=[]){
   
    graph.data.labels = X;
    graph.data.datasets = Y;
    graph.update();
}

// Send Request To Server to get File Data
function showData(){
    const form = new FormData(document.getElementById('form-show'));

    axios.post('/process-file',form)
    .then(function(response){
        // console.log(response.data);
        if(response.data.TRAYEKTORI){
            processTrayektori(response.data.TRAYEKTORI);
        }
        if(response.data.ARUS){
            processArus(response.data.ARUS);
        }
        if(response.data.KECEPATAN){
            processVelocity(response.data.KECEPATAN);
        }
    }).catch(function(error){
        console.log(error);
    });
}

// Process Data Trayektori and draw graph
function processTrayektori(data={}){
    yAxis = [
        {
            label: 'Elbow',
            data: data.elbow,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red'
        },
        {
            label: 'Shoulder',
            data: data.shoulder,
            borderColor: 'green',
            borderWidth: 0.5,
            backgroundColor:'green'
        }
    ];
    xAxis = data.realTime;
    drawChart(trayektoriGraph,xAxis,yAxis);
}

// Process Data Arus and draw graph
function processArus(data={}){
    // Flexion No Voluntary Move
    yAxis = [
        {
            label: 'Arus',
            data: data.arusFlekNoVol,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red'
        },
    ];
    xAxis = data.timeFlekNoVol;
    drawChart(currentFlexNoMoveGraph,xAxis,yAxis);

     // Extension No Voluntary Move
     yAxis = [
        {
            label: 'Arus',
            data: data.arusEksNoVol,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red'
        },
    ];
    xAxis = data.timeEksNoVol;
    drawChart(currentExtenNoMoveGraph,xAxis,yAxis);

     // Flexion Voluntary Move
     yAxis = [
        {
            label: 'Arus',
            data: data.arusFlekVol,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red'
        },
    ];
    xAxis = data.timeFlekVol;
    drawChart(currentFlexMoveGraph,xAxis,yAxis);

     // Flexion No Voluntary Move
     yAxis = [
        {
            label: 'Arus',
            data: data.arusEksVol,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red'
        },
    ];
    xAxis = data.timeEksVol;
    drawChart(currentExtenMoveGraph,xAxis,yAxis);
}

// Process Data Velocity and draw graph
function processVelocity(data={}){
    yAxis = [
        {
            label: 'velocity',
            data: data.velocityConv,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red'
        },
        {
            label: 'set point',
            data: data.setPoint,
            borderColor: 'green',
            borderWidth: 0.5,
            backgroundColor:'green'
        }
    ];
    xAxis = data.xData;
    drawChart(velocityGraph,xAxis,yAxis);
}