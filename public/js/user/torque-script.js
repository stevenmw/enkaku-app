console.log('Torque');

const shoulderFlexionExtensionChart = document.querySelector("#shoulder-flexion-enxtension-chart").getContext('2d');
const shoulderAbductionAdductionChart = document.querySelector("#shoulder-abduction-adduction-chart").getContext('2d');
const elbowFlexionExtensionChart = document.querySelector("#elbow-flexion-extension-chart").getContext('2d');

const shoulderFlexionExtensionGraph = new Chart(shoulderFlexionExtensionChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Maximum Joint Torque [Nm]'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Joint Angle (Degree)'
                }
            }
        }
    }
})

const shoulderAbductionAdductionGraph = new Chart(shoulderAbductionAdductionChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Maximum Joint Torque [Nm]'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Joint Angle (Degree)'
                }
            }
        }
    }
})

const elbowFlexionExtensionGraph = new Chart(elbowFlexionExtensionChart, {
    type: 'line',
    options: {
        responsive: true,
        scales: {
            y: {
                title: {
                    display: true,
                    text: 'Maximum Joint Torque [Nm]'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Joint Angle (Degree)'
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
    shoulderFlexionExtensionGraph.clear();
    shoulderAbductionAdductionGraph.clear();
    elbowFlexionExtensionGraph.clear();

    axios.post('/process-file',form)
    .then(function(response){
        errorMsg.setAttribute('hidden',true);
        if(response.data){
            processTorque(response.data);
        }
    }).catch(function(error){
        console.log(error);
        errorMsg.innerHTML = error.response.data.error;
        errorMsg.removeAttribute('hidden');
    });
}

// Process Data Torque and draw graph
function processTorque(data={}){
    // Shoulder Flexion Extension
    yAxis = [
        {
            label: 'Flexion',
            data: data.torqueShoulderFlexion,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red',
            pointRadius: 0
        },
        {
            label: 'Extension',
            data: data.torqueShoulderExtension,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red',
            pointRadius: 0
        }
    ];
    xAxis = data.jointangleShoulderFlexExten;
    drawChart(shoulderFlexionExtensionGraph,xAxis,yAxis);

     // Shoulder Adduction Abduction
     yAxis = [
        {
            label: 'Adduction',
            data: data.torqueShoulderAdduction,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red',
            pointRadius: 0
        },
        {
            label: 'Abduction',
            data: data.torqueShoulderAbduction,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red',
            pointRadius: 0
        }
    ];
    xAxis = data.jointangleShoulderAddAbd;
    drawChart(shoulderAbductionAdductionGraph,xAxis,yAxis);

     // Elbow Flexion Extension
     yAxis = [
        {
            label: 'Flexion',
            data: data.torqueElbowFlexion,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red',
            pointRadius: 0
        },
        {
            label: 'Extension',
            data: data.torqueElbowExtension,
            borderColor: 'red',
            borderWidth: 0.5,
            backgroundColor:'red',
            pointRadius: 0
        }
    ];
    xAxis = data.jointangleElbowFlexExten;
    drawChart(elbowFlexionExtensionGraph,xAxis,yAxis);
}
