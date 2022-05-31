<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/dashboard/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard/dataTables.bootstrap5.min.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}" type="text/css"/>
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Enkaku Dashboard</title>
  </head>
  <body>
    <!-- top navigation bar -->
    @include('templates.layouts.topbar')
    <!-- sidebar navigation bar -->
    @include('templates.layouts.sidebar')
    <!-- offcanvas -->
    @yield('page_content')
    <!-- offcanvas -->

    <script src="{{ asset('./js/dashboard/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('./js/dashboard/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('./js/dashboard/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('./js/dashboard/dataTables.bootstrap5.min.js') }}"></script>

    @yield('script_chart')
    
    <script>
      feather.replace()
    </script>
  </body>
</html>