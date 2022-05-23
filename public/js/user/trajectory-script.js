console.log('trajektory');

const trayektoriChart = document.querySelector("#trayektori-chart").getContext('2d');

// create a new instance
const trayektoriGraph = new Chart(trayektoriChart, {
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
        if(response.data){
            processTrayektori(response.data);
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

