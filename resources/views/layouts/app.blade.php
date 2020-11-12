<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
     

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ISC') }}</title>
         <!-- google chart -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
        
      <!--  <script src="/assets/js/jquery.slimscroll.js"></script>         verify later -->
  <!-- DATA TABLE -->     
  <script src="//code.jquery.com/jquery-1.12.3.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script>https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js</script>
    <script>https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js</script>
    <script>https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js</script>
    <script>https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js</script>
    <script>https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js</script>

  <script
      src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
      
 

      <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
   
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">

            <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <div class="card-body">

            <!-- Brand -->
           
          
        <!-- User -->
            
            </div>
        </div>
    </nav>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="header-body">
                <!-- Card stats -->
            </div>
        </div>
    </div>

            @include('layouts.navbars.navbar')
            @include('inc.messages')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>


        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
       
        @stack('js')

        
    </body>
    <script>
        $('#employees123').DataTable({
            "aaSorting": [[1,'asc']],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
</html>
