console.log('trajektory');

const trayektoriChart = document.querySelector("#trayektori-chart").getContext('2d');

// create a new instance
const trayektoriGraph = new Chart(trayektoriChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Angle (Degree)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Time (s)'
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
    trayektoriGraph.clear();

    axios.post('/process-file',form)
    .then(function(response){
        errorMsg.setAttribute('hidden',true);
        if(response.data){
            processTrayektori(response.data);
        }
    }).catch(function(error){
        console.log(error);
        errorMsg.innerHTML = error.response.data.error;
        errorMsg.removeAttribute('hidden');
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
            backgroundColor:'red',
            pointRadius: 0
        },
        {
            label: 'Shoulder',
            data: data.shoulder,
            borderColor: 'green',
            borderWidth: 0.5,
            backgroundColor:'green',
            pointRadius: 0
        }
    ];
    xAxis = data.realTime;
    drawChart(trayektoriGraph,xAxis,yAxis);
}

