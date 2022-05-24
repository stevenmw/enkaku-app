console.log('Current');

const currentFlexNoMoveChart = document.querySelector("#current-flex-no-move-chart").getContext('2d');
const currentExtenNoMoveChart = document.querySelector("#current-exten-no-move-chart").getContext('2d');
const currentFlexMoveChart = document.querySelector("#current-flex-move-chart").getContext('2d');
const currentExtenMoveChart = document.querySelector("#current-exten-move-chart").getContext('2d');

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
        if(response.data){
            processArus(response.data);
        }
    }).catch(function(error){
        console.log(error);
    });
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
            backgroundColor:'red',
            pointRadius: 0
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
            backgroundColor:'red',
            pointRadius: 0
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
            backgroundColor:'red',
            pointRadius: 0
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
            backgroundColor:'red',
            pointRadius: 0
        },
    ];
    xAxis = data.timeEksVol;
    drawChart(currentExtenMoveGraph,xAxis,yAxis);
}
