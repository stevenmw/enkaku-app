<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/dashboard/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/dashboard/style.css" />
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
    
    <script src="./js/dashboard/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/dashboard/jquery-3.5.1.js"></script>
    <script src="./js/dashboard/jquery.dataTables.min.js"></script>
    <script src="./js/dashboard/dataTables.bootstrap5.min.js"></script>
    <script src="./js/dashboard/script.js"></script>
  </body>
</html>