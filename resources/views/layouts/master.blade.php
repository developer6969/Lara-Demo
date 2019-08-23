<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Clinica | Dashboard</title>
        <link rel="icon" href="img/medical_logo_64.png" type="image/gif" sizes="16x16">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/app.css">
        
    </head>

    <body class="hold-transition sidebar-mini skin-blue">
            
        <div id="app" class="wrapper">

            <!-- Header Navbar -->
            @include('layouts.header')

            <!-- Sidebar Container -->
            @include('layouts.sidebar')
           
            <!-- Main content -->
            <div class="content-wrapper">
                <div class="content">
                    <div class="container-fluid">
                        {{-- Dynamic Contect by Vue Routers --}}
                        <router-view></router-view>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('layouts.footer')
            
        </div>
        <!-- ./wrapper -->
        <script src="js/app.js"></script>
    </body>
</html>