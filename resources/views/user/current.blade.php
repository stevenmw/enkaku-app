@extends('templates.layouts.home')

@section('page_content')
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-justify" class="font-weight-bold">Current</h2>
          
          @include('templates.layouts.notif')
          
          <div id="error-message" class="alert alert-danger" hidden>
            error
          </div>

          <div class="img-fluid" alt="Responsive image">
            <div class="content">
            </div>
          </div>

          <div class="row">
            <div class="row">
              <div class="col-12 mb-3">
                {{-- Pasien Tidak Bisa Import File --}}
                @if (($user->role == 'Doctor') || ($user->role == 'Admin'))
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                      Import File
                    </button>
                    {{-- Modal Import File --}}
                        <div class="modal" id="importModal" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Import File</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                
                                <form action="/import-file" method="POST" enctype="multipart/form-data" class="needs-validation">
                                  @csrf
                                  <select class="form-select" aria-label="pasien Select" name="type" required>
                                    <option value="ARUS" selected>Arus</option>
                                  </select>
                                  <br>
                                
                                  <select class="form-select" aria-label="pasien Select" name="patient_id" required>
                                    <option value="" selected>---Pasien---</option>
                                    @foreach ($patients as $patient)
                                    <option value="{{$patient->id}}" >{{$patient->account->name}}</option>
                                    @endforeach
                                  </select>        
                                
                                  <div class="invalid-feedback">
                                    Please choose a name.
                                  </div>
                                  <br>
                                  <input type="file" name="file" id="file">
      
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      {{-- Modal Import File End --}}                
                @endif
      
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalShowData">Show Data</button>
                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#modalExportData">Export File</button>
      
              
                {{-- Modal Show Data --}}
                <div class="modal" id="modalShowData" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Show File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        
                        <form method="POST" enctype="multipart/form-data" class="needs-validation" id="form-show">
                          @csrf
                          <select class="form-select" aria-label="pasien Select" name="type" required>
                            <option value="ARUS" selected>Training Arus</option>
                          </select>
                          <br>

                          @if (($user->role == 'Doctor') || ($user->role == 'Admin'))
                            <select class="form-select" aria-label="pasien Select" name="patient_id" required onchange="selectFile(this,'file-name-show')">
                              <option value="" selected>---Pasien---</option>
                              @foreach ($patients as $patient)
                              <option value="{{$patient->id}}" >{{$patient->account->name}}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback">
                              Please choose a name.
                            </div>
                            <br>

                            <select class="form-select" aria-label="pasien Select" name="file_name" id="file-name-show" required>
                              <option value="" selected>---File Name---</option>
                              {{-- @foreach ($fileName as $file)
                                <option value="{{ $file->id }}">{{ $file->file_name }}</option>
                              @endforeach --}}
                            </select>
                          @endif

                          
                          @if(($user->role=='Patient'))
                            <br>
                            <select class="form-select" aria-label="pasien Select" name="file_name" id="file-name-show" required>
                              <option value="" selected>---File Name---</option>
                              @foreach ($fileName as $file)
                                <option value="{{ $file->id }}">{{ $file->file_name }}</option>
                              @endforeach
                            </select>
                            <input type="hidden" name="patient_id" value="{{$user->patient->id}}">
                          @endif
                          <br>
      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="showData()" data-bs-dismiss="modal">Show Data</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- Modal Show Data End --}}

                 {{-- Modal Export Data --}}
                 <div class="modal" id="modalExportData" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Export File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        
                        <form action="{{url("/download")}}" method="POST" enctype="multipart/form-data" class="needs-validation" id="form-export">
                          @csrf
                          <select class="form-select" aria-label="pasien Select" name="type" required>
                            <option value="ARUS" selected>Arus</option>
                          </select>
                          <br>

                          @if (($user->role == 'Doctor') || ($user->role == 'Admin'))
                            <select class="form-select" aria-label="pasien Select" name="patient_id" required onchange="selectFile(this,'file-name-export')">
                              <option value="" selected>---Pasien---</option>
                              @foreach ($patients as $patient)
                              <option value="{{$patient->id}}" >{{$patient->account->name}}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback">
                              Please choose a name.
                            </div>
                            <br>
                            <select class="form-select" aria-label="pasien Select" name="file_name" id="file-name-export" required>
                              <option value="" selected>---File Name---</option>
                              {{-- @foreach ($fileName as $file)
                                <option value="{{ $file->id }}">{{ $file->file_name }}</option>
                              @endforeach --}}
                            </select>
                          @endif

                          @if(($user->role=='Patient'))
                            <select class="form-select" aria-label="pasien Select" name="file_name" id="file-name-export" required>
                              <option value="" selected>---File Name---</option>
                              @foreach ($fileName as $file)
                                <option value="{{ $file->id }}">{{ $file->file_name }}</option>
                              @endforeach
                            </select>
                            <input type="hidden" name="patient_id" value="{{$user->patient->id}}">
                          @endif
                          <br>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Download Data</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- Modal Export Data End --}}
      
              <div class="col-12 mb-3">
                <div style="height: 12rem; width:69rem" class="card h-100">
                  <div class="card-header">
                    <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                    Current Chart (Flex No Move)
                  </div>
                  <div class="card-body">
                    <canvas id="current-flex-no-move-chart" width="1200" height="400"></canvas>
                  </div>
                </div>
              </div>
      
              <div class="col-12 mb-3">
                <div style="height: 12rem; width:69rem" class="card h-100">
                  <div class="card-header">
                    <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                    Current Chart (Exten No Move)
                  </div>
                  <div class="card-body">
                    <canvas id="current-exten-no-move-chart" width="1200" height="400"></canvas>
                  </div>
                </div>
              </div>
      
              <div class="col-12 mb-3">
                <div style="height: 12rem; width:69rem" class="card h-100">
                  <div class="card-header">
                    <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                    Current Chart (Flex Move)
                  </div>
                  <div class="card-body">
                    <canvas id="current-flex-move-chart" width="1200" height="400"></canvas>
                  </div>
                </div>
              </div>
              
              <div class="col-12 mb-3">
                <div style="height: 12rem; width:69rem" class="card h-100">
                  <div class="card-header">
                    <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                    Current Chart (Extem Move)
                  </div>
                  <div class="card-body">
                    <canvas id="current-exten-move-chart" width="1200" height="400"></canvas>
                  </div>
                </div>
              </div>
      
            </div>
          </div>

        </div>
      </div>
    </div>
    <p hidden id="data-patient">
      {{($patients) ? $patients : null;}}
    </p>
  </main>
@endsection

@section('script_chart')
  <script src="./js/user/current-script.js"></script>
  <script>
    const patientsJsonStr = document.getElementById("data-patient").innerHTML;
    const patientsObj = JSON.parse(patientsJsonStr);
    // console.log(patientsObj);

    // function select file dipanggil ketika user memilih pasien
    function selectFile(obj,fileElementId){
        const patientId = obj.value;
        // Get Data Patien dari array patientsObj sesuai dengan yang dipilih user
        const patient = patientsObj.find((patient)=>{
          return patient.id == patientId;
        });

        const fileNameSelect = document.getElementById(fileElementId);
        // Hapus semua options di file name select
        // Sehingga file name tidak bertumpuk dengan file pasien lain
        fileNameSelect.innerHTML = null;

        // Opsional, tambah option "---File Name---"
        const option = document.createElement("option");
          option.innerText = `---File Name---`;
          option.setAttribute('value',"");
          // Append to select:
          fileNameSelect.appendChild(option);
        
          // Update file name select dengan value file setiap pasien
        patient.training_paths.forEach(value => {
          // Create element:
        const option = document.createElement("option");
          option.innerText = `${value.file_name}`;
          option.setAttribute('value',value.id);

          // Append to select:
          fileNameSelect.appendChild(option);  
        });
      }
    
  </script>
@endsection