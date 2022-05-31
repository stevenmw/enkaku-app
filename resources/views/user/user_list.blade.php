@extends('templates.layouts.home')

@section('page_content')
  <main class="mt-5 pt-3">
    {{-- <div class="container-fluid"> --}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2 border-bottom">
            <h2 class="text-justify" class="font-weight-bold">User List</h2>
        </div>
            <div class="table-responsive-sm col-lg-8">
                    @if (session('success'))
                      <div class="alert alert-success">
                      {{ session('success') }}
                      </div>
                    @endif
                      <table class="table table-striped table-sm">
                          <thead>
                              <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Role</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($accounts as $account)                          
                              <tr>
                                  <th scope="row">{{ $loop->iteration }}</th>
                                  <td>{{ $account->name }}</td>
                                  <td>{{ $account->email }}</td>
                                  <td>{{ $account->role }}</td>
                                  <td>
                                      @if ($account->role == 'Admin')
                                        <a href="/user-list/admin/{{ $account->uuid }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                        <a href="/user-list/edit/admin/{{ $account->uuid }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <a href="/user-list/delete/admin/{{ $account->uuid }}" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                                      @endif
                                      @if ($account->role == 'Doctor')
                                        <a href="/user-list/doctor/{{ $account->uuid }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                        <a href="/user-list/edit/doctor/{{ $account->uuid }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <a href="/user-list/delete/doctor/{{ $account->uuid }}" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                                      @endif
                                      @if ($account->role == 'Patient')
                                        <a href="/user-list/patient/{{ $account->uuid }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                        <a href="/user-list/edit/patient/{{ $account->uuid }}" class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <a href="/user-list/delete/patient/{{ $account->uuid }}" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                                      @endif
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{ $accounts->links() }}
            </div>
  </main>
@endsection

@section('script_chart')
  <script src="./js/user/current-script.js"></script>
@endsection