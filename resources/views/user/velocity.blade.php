@extends('templates.layouts.home')

@section('page_content')
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-justify" class="font-weight-bold">Velocity</h2>

          @include('templates.layouts.notif')

          <div class="img-fluid" alt="Responsive image">
            <div class="content">
            </div>
          </div>

          <div class="row">
            <div class="row">
              <div class="col-12 mb-3">
                {{-- Pasien Tidak Bisa Import File --}}
                @if (auth()->user()->isDoctor() || auth()->user()->isAdmin())
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
                                    <option value="KECEPATAN" selected>Kecepatan</option>
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
                            <option value="KECEPATAN" selected>Kecepatan</option>
                          </select>
                          @if (auth()->user()->isDoctor() || auth()->user()->isAdmin())
                          <select class="form-select" aria-label="pasien Select" name="patient_id" required>
                            <option value="" selected>---Pasien---</option>
                            @foreach ($patients as $patient)
                            <option value="{{$patient->id}}" >{{$patient->account->name}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback">
                            Please choose a name.
                          </div>
                          @endif
                          @if(auth()->user()->isPatient())
                          <input type="hidden" name="patient_id" value="{{auth()->user()->patient->id}}">
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
                            <option value="KECEPATAN" selected>Kecepatan</option>
                          </select>
                          @if (auth()->user()->isDoctor() || auth()->user()->isAdmin())
                          <select class="form-select" aria-label="pasien Select" name="patient_id" required>
                            <option value="" selected>---Pasien---</option>
                            @foreach ($patients as $patient)
                            <option value="{{$patient->id}}" >{{$patient->account->name}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback">
                            Please choose a name.
                          </div>
                          @endif
                          @if(auth()->user()->isPatient())
                          <input type="hidden" name="patient_id" value="{{auth()->user()->patient->id}}">
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
                <div class="card h-100">
                  <div class="card-header">
                    <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                    Velocity Chart
                  </div>
                  <div class="card-body">
                    <canvas id="velocity-chart" width="400" height="200"></canvas>
                  </div>
                </div>
              </div>
      
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
@endsection

@section('script_chart')
    <script src="./js/user/velocity-script.js"></script>
@endsection