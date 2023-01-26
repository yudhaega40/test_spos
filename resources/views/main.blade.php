<!DOCTYPE html>
<html>

<head>

      {{-- Bootstrap 4 --}}
      {{-- <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}
      {{-- Bootstrap 5 --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous">
      {{-- FontAwesome Kit --}}
      <script src="https://kit.fontawesome.com/fdf4b30049.js"
                  crossorigin="anonymous"></script>
      {{-- Boxicons --}}
      <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
            rel="stylesheet" />
      {{-- Google Font --}}
      <link rel="preconnect"
            href="https://fonts.googleapis.com">
      {{-- Google Font --}}
      <link rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin>
      {{-- Font Poppins --}}
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
            rel="stylesheet">
      {{-- Style JSTree --}}
      <link rel="stylesheet"
            href="{{ asset('jstree/themes/default/style.min.css') }}" />
      {{-- Style Sidebar dan Topbar --}}
      <link rel="stylesheet"
            href="{{ asset('css/navigation.css') }}" />
      {{-- Style Listbox --}}
      <link rel="stylesheet"
            type="text/css"
            href="{{ asset('css/listbox.css') }}" />
      <link rel="stylesheet"
            type="text/css"
            href="{{ asset('css/global.css') }}" />
      <link rel="stylesheet" 
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            
      <title> @yield('title') </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> {{-- JQuery 3.6 --}}
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>

<body id="body-pd">

      @include('sidebar')
      {{-- <div class="height-100 bg-light"> --}}
      @include('topnav')
      @yield('content')

      {{-- JQuery 3.6 --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      {{-- Bootstrap.js 5.1 --}}
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                  crossorigin="anonymous"></script>
      {{-- Script Sidebar dan Topbar --}}
      <script src="{{ URL::asset('js/navigation.js') }}"></script>
      {{-- Script Spinner dan Listbox --}}
      <script src="{{ URL::asset('js/script.js') }}"></script>
      {{-- Script Spinner dan Listbox --}}
      <script src="{{ URL::asset('jstree\jstree.min.js') }}"></script>
      {{-- Script Datatables --}}
      <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
      
      <?php
      $login = session('username');
      if(!isset($login)){
        ?><script>window.location.href = '{{url("/login")}}'</script><?php
      }
      ?>
</body>

</html>
