@extends('templates.layouts.home')

@section('page_content')
    
<main class="mt-5 pt-3">
  <div class="container-fluid">
      <div class="col-md-12">
        {{-- <h4>Welcome Home, {{ auth()->user()->name }} </h4> --}}
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        @if (session('error'))
          <div class="alert alert-warning">
            {{ session('error') }}
          </div>
       @endif
      </div>
    </div>

    {{-- /dashboard --}}
    <div class="d-flex justify-content-center">
      <div class="img-fluid" alt="Responsive image">
        <img src="images/terms.png" alt="terms.image" style="max-width:100%;">
        {{-- <div class="content">
          <h3>Telerehabilitation Prodigy in Medical History</h3>
          <p>We build a Telerehabilitation information system that offers one solution in providing rehabilitation services for medical industry</p>
        </div> --}}
      </div>      
    </div>

    <div class="col-12 mb-3 ms-4">
      <h2 class="text-justify">I. GENERAL PROVISIONS</h2>
      <h5 class="text-justify">PLEASE READ THE ENTIRE ENTIRE PRIVACY POLICY CAREFULLY AND CAREFULLY BEFORE USING ANY FEATURES AND/OR SERVICES AVAILABLE IN THE ENKAKU APP.</h5>
      <p class="text-justify">This Privacy Policy is an agreement between the user (“User”) and the Enkaku Application System Operator to provide telerehabilitation reporting facilities and this Privacy Policy governs the access and use of Web Application content and products.This Privacy Policy forms part of the Terms and Conditions of Use. By using the Application, the User is deemed to agree to be bound by the terms of this Privacy Policy.
      If the User does not agree with one, part, or all of the contents contained in this Privacy Policy, then the User is allowed to delete the Application on the electronic device and/or not access the Application and/or not use the Application. The Application is released from all responsibility for all losses that the User receives in connection with the decision not to use this Application.</p>

      <h2 class="text-justify">II. DEFINITION</h2>
      <p class="text-justify">
        Each of the following words or terms used in this Privacy Policy has the following meanings below, unless the word or term concerned in its use expressly stipulates otherwise:

        “Application” is an application and website “PeduliLindung” that is used in monitoring telerehabilitation for medical health facilities and post-stroke patients.
        
        “User”, means any person who uses the Application.
        
        “Personal Data” or “Personal Information”, means any and all personal data provided by the Application User, including but not limited to name, identification number, health data, user location, user contact, and other documents and data as requested on the form. account registration or other forms when using the Application.
      </p>

      <h2 class="text-justify">III. COLLECTED INFORMATION</h2>
      <p class="text-justify">1. User's Personal Data that has been recorded will be stored in the Application that has gone through a verification process and is encrypted as long as the service operates.</p>
      <p class="text-justify">2. If the Application is not used or its utilization is stopped, the Application will continue to store and use the User's Personal Data in accordance with the provisions of the legislation.</p>

      <h2 class="text-justify">IV. SENDING AND DISTRIBUTION OF PERSONAL DATA</h2>
      <p class="text-justify">User's Personal Data will not be sent and disseminated to other parties, except:
      Parties who are appointed and have an interest in supporting the efforts of Telerehabilitation Monitoring by various Rehabilitation Centers
      Legitimate requests from law enforcement officers based on the provisions of laws and regulations.
      The parties based on the agreement will use the Application data for the benefit of supporting the efforts of Telerehabilitation Monitoring by various Rehabilitation Centers</p>

      <h2 class="text-justify">V. DELETION OF PERSONAL DATA</h2>
      <p class="text-justify">Personal Data will be deleted from the Application server at least 2 (two) years since the Application is not operating.</p>

      <h2 class="text-justify">VI. DELETION OF PERSONAL DATA</h2>
      <p class="text-justify">For the security of the User and the public, the User is expected to grant access permission to the User's device. Users can cancel permission to access the Application device at any time through the settings menu contained in the User's device.
      Users can submit a request to the Application to access and/or correct the User's Personal Data that is in the possession and control of the Application, by contacting the contact listed in this Privacy Policy.</p>

      <h2 class="text-justify">VII. LINKS TO THIRD PARTY SITES</h2>
      <p class="text-justify">Applications may contain links or links to sites/applications belonging to third parties (“Third Party Sites/Applications”) that cooperate under an agreement with the Application.
      The Application does not have any control and is not responsible for any Third Party Sites/Applications and/or Third Party content, therefore, the User's use of such links or links to such Third Party Sites/Applications is based on the User's own responsibility.
      Users are advised to study and read carefully the personal information handling policies that apply to Third Party Sites/Applications and/or Third Party content.</p>

      <h2 class="text-justify">VIII. CHANGES TO THIS PRIVACY POLICY</h2>
      <p class="text-justify">This Privacy Policy may be changed or updated from time to time by notification to the User through the Application. By continuing to access the Application, the User is deemed to have read, understood and agreed to this Privacy Policy, including its changes and/or updates.</p>

      <h2 class="text-justify">IX. NOTIFICATION</h2>
      <p class="text-justify">In the event that the User finds a security gap in the Application system, the User must immediately report the findings in writing to the Application. Users are prohibited from using this for personal or certain group interests and publishing it to the general public for any reason.
      Users can submit questions, complaints and/or complaints in connection with the use of Personal Data or Personal Information on the Application. All responses, suggestions, and or findings provided by the User regarding the Application are not considered confidential information. The application reserves the right to use this information freely without limits. Users are prohibited from abusing the findings so that it can affect the operation of the Application.
      Reports of security findings, questions, complaints and/or complaints in connection with the use of the Application are submitted in writing via email enkaku@gmail.com by attaching the User's identity.
      The Application will verify Personal Data by referring to the Personal Data stored in the Application system. The application has the right to reject questions, complaints and/or complaints submitted in the event that the Personal Data has not been verified.
      In the event that there are additions, reductions and/or changes to the Application complaint channel, it will be informed later through Application notifications or through other official channels.</p>

    </div>
  </div>
</main>

@endsection
