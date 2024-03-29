console.log('Current');

const currentFlexNoMoveChart = document.querySelector("#current-flex-no-move-chart").getContext('2d');
const currentExtenNoMoveChart = document.querySelector("#current-exten-no-move-chart").getContext('2d');
const currentFlexMoveChart = document.querySelector("#current-flex-move-chart").getContext('2d');
const currentExtenMoveChart = document.querySelector("#current-exten-move-chart").getContext('2d');

const currentFlexNoMoveGraph = new Chart(currentFlexNoMoveChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Current (Ampere)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Timestamp'
                }
            }
        }
    }
})

const currentExtenNoMoveGraph = new Chart(currentExtenNoMoveChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Current (Ampere)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Timestamp'
                }
            }
        }
    }
})

const currentFlexMoveGraph = new Chart(currentFlexMoveChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Current (Ampere)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Timestamp'
                }
            }
        }
    }
})

const currentExtenMoveGraph = new Chart(currentExtenMoveChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Current (Ampere)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Timestamp'
                }
            }
        }
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
    errorMsg = document.getElementById('error-message');
    currentFlexNoMoveGraph.clear();
    currentFlexMoveGraph.clear();
    currentExtenNoMoveGraph.clear();
    currentExtenMoveGraph.clear()

    axios.post('/process-file',form)
    .then(function(response){
        errorMsg.setAttribute('hidden',true);
        if(response.data){
            processArus(response.data);
        }
    }).catch(function(error){
        console.log(error);
        errorMsg.innerHTML = error.response.data.error;
        errorMsg.removeAttribute('hidden');
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
