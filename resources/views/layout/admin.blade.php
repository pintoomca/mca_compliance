

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags-->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="au theme template">
      <meta name="author" content="Hau Nguyen">
      <meta name="keywords" content="au theme template">
      <!-- Title Page-->
      <title>@yield('title')</title>
      @include('dashboard.header')
   </head>
   <body class="animsition ">
      <div class="page-wrapper">
         <!-- HEADER MOBILE-->
         <header class="header-mobile d-block d-lg-none">
            @include('dashboard.sidebar')
         </header>

         <!-- MENU SIDEBAR-->
         <aside class="menu-sidebar d-none d-lg-block">
            @include('dashboard.sidebar1')
         </aside>

         <!-- PAGE CONTAINER-->
         <div class="page-container">

            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
               @include('dashboard.topheader')
            </header>

            <!-- MAIN CONTENT-->
            @yield('content')

            <!-- FOOTER CONTENT-->
            @include('dashboard.footer')
            <!-- END PAGE CONTAINER-->
         </div>
      </div>
   </body>
</html>
<!-- end document-->

