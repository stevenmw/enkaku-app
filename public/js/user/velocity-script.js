console.log('Velocity');

const velocityChart = document.querySelector("#velocity-chart").getContext('2d');

const velocityGraph = new Chart(velocityChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Angular velocity (rpm)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Time (ms)'
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
    velocityGraph.clear();

    axios.post('/process-file',form)
    .then(function(response){
        errorMsg.setAttribute('hidden',true);
        if(response.data){
            processVelocity(response.data);
        }
    }).catch(function(error){
        console.log(error);
        errorMsg.innerHTML = error.response.data.error;
        errorMsg.removeAttribute('hidden');
    });
}

// Process Data Velocity and draw graph
function processVelocity(data={}){
    yAxis = [
        {
            label: 'velocity',
            data: data.velocityConv,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red',
            pointRadius: 0
        },
        {
            label: 'set point',
            data: data.setPoint,
            borderColor: 'green',
            borderWidth: 0.5,
            backgroundColor:'green',
            pointRadius: 0
        }
    ];
    xAxis = data.xData;
    drawChart(velocityGraph,xAxis,yAxis);
}