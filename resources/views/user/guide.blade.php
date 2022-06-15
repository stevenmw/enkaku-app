@extends('templates.layouts.home')

@section('page_content')
    
<main class="mt-5 pt-3 px-4">
    <div class="d-flex justify-content-center">
      {{-- <h2 class="font-weight-bold">GuideBook Enkaku App</h2> --}}
    </div>
    <div class="d-flex justify-content-center">
      <div class="img-fluid" alt="Responsive image">
          <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <br><br>
                    <span class="align-bottom">
                        <h2 class="font-weight-bold text-center">GuideBook Enkaku App</h2>
                        <br>
                        <p class="text-justify">Enkaku telerehab is an application that is intended for post-stroke sufferers and similar comorbid diseases so that they can be motivated to recover quickly through the analysis feature of the progress of the rehabilitation program. This application is also expected to help the rehabilitation center to provide data reports related to the progress of each patient undergoing the medical rehabilitation process. This will be very helpful, especially for health centers that still use conventional methods for recording patient progress systems. In this application, patients will get a history of rehabilitation results that are packaged in the form of a rehabilitation progress record so that patients can continue to monitor their progress. In addition, this web application will also be designed with an application programming interface to make it easier for further developers to develop it into a mobile or tablet device.</p>
                    </span>
                </div>
                <div class="col-md-7">
                    <img src="images/instruction.svg" alt="instruction" style="max-width: 75%;">
                </div>
                {{-- <div class="col-md-5"><span class="pull-right">$42</span></div> --}}
            </div>
        </div>
        <div class="content px-3">
          <h2>Please follow the instructions below!</h2>
          <h4 class="text-justify">A. Velocity Charts</h4>
          <img class="img-fluid" src="images/velocity chart.png" alt="velocity_chart">
          <p class="text-justify">The velocity is set based on the set point determined at the beginning before the rehabilitation process. The predetermined velocity set point will be a command for the microcontroller to drive the motor. Then when the motor moves based on a predetermined ROM, the angle measurement data from the track will be generated. The change in torque is also measured to determine the motor velocity and can also be used to read the effect of movement produced by the muscle torque of the subject. When the subject is able to produce a muscle turque, the subject has benefited from the rehabilitation process.</p>
          <p class="text-justify">Then for velocity, it is first determined in advance the set point for the desired velocity. Then when the motor is run with a microcontroller command, the motor will move at the entered velocity. The result of the reduction between the velocity at the set point and the measured velocity is the error value that will be input for the PID controller. The output of the PID calculation at this angle will be a control for the motor to compensate for the error value so that the actual velocity value will be as close as possible to the set point. Using a PID controller to adjust the velocity will also result in a more stable velocity. Then the test is carried out by comparing the results of the angle and velocity using a PID controller and without a PID controller.</p>
          <p>Testing on the subject is done by attaching an exoskeleton to the subject. The patient's hand is in a passive state while the exoskeleton is active as an external force. Then the exoskeleton moves the patient's hand. The elbow joint is moved in flexion-extension while the shoulder joint is moved in abduction-adduction and flexion-extension. The sequence of movements of the shoulder and elbow flexion-extension can be performed sequentially or in parallel. The trajectory of the exoskeleton angle is determined based on the ROM for each movement pattern and also the speed is set directly by the therapist by slowly asking the subject to move the hand by holding the exoskeleton grip or moving along with the exoskeleton movement. When a patient's movement is detected that produces muscle torque, the patient has benefited from rehabilitation. Data is recorded and sent to a computer for monitoring which is then used as consideration for further training treatment.</p>
          <h4 class="text-justify">B. Current Charts</h4>
          <img src="images/current chart.png" alt="current_chart" style="max-width: 95%">
          <p>The current in the motor is measured to determine changes in torque and can also be used to read the effect of movement produced by the muscle torque of the subject. Changes in current in the motor when a torque is applied against the direction of rotation will be detected by the current sensor installed on the motor. Torque and voluntary movement detection tests on the subject were carried out by monitoring changes in the motor current when the subject's hand was passive and comparing it with changes in motor current when the subject's hand was active. Experiments were carried out on two normal subjects with the following information:</p>
          <li>
            Elbow and shoulder flexion without voluntary movement is a condition in which the patient's hand is passive and the hand is fully moved by the exoskeleton.
          </li>
          <li>
            Elbow and shoulder flexion with voluntary movement is a condition when the patient's hands also move along with the movement of the exoskeleton.
          </li>
          <li>
            Shoulder abduction without voluntary movement is a condition in which the patient's hand is passive and the hand is fully moved by the exoskeleton.
          </li>
          <li>
            Shoulder abduction with voluntary movement is a condition when the patient's hand also moves along with the movement of the exoskeleton.
          </li>
          <li>
            Shoulder adduction without voluntary movement is a condition in which the patient's hand is passive and the hand is fully moved by the exoskeleton.
          </li>
          <li>
            Shoulder adduction with voluntary movement is a condition in which the hand exerts a force by resisting the exoskeleton similar to an abduction motion.
          </li>
          <br>
          <p>
            In testing the change in motor current, it was found that when a movement is carried out away from the direction of gravity (flexion and abduction), the change in current will be greater when there is no voluntary movement. When the change in current gets smaller and there is even no change in current, it can be said that the torque due to voluntary movement by the subject is getting bigger. On the other hand, when the movement is approaching the direction of gravity (extension and adduction), the change in current will be smaller and even if there is no voluntary movement, and vice versa when the subject is trying to resist the movement of the exoskeleton (meaning the subject is holding his hand in place or even in the opposite direction to the movement of the exoskeleton). then the change in current in the motor will be greater and it can be said that the torque due to voluntary movement by the subject is getting bigger.
          </p>
          <h4 class="text-justify">C. Trajectory Charts</h4>
          <img src="images/trajectory chart.png" alt="trajectory-chart" style="max-width: 95%">
          <p>Before determining the trajectory target, it is necessary to observe the maximum and minimum sensor values when the upper limb is moved according to the desired trajectory. Based on the data recorded by the sensor, the cyclic movement of elbow flexion will form a cosine function. The angle recorded when the hand is straight down is 170 degrees, while when the elbow is bent it is 90 degrees.</p>
          <p class="font-weight-bold">On the graph it is clear, the red graph is the trajectory target, if the trajectory target is in the form of cos at 170-90 then the patient is doing 'flexion' movements, but if the trajectory target has an angle of 60-10 then the patient is doing 'extension' movements</p>
        </div>
      </div>      
    </div>
  </main>

@endsection
