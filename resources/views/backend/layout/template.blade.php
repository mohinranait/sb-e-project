
<!DOCTYPE html>
<html lang="en">
  <head>
   
    @include('backend.includes.header')
    @include('backend.includes.css')

    
  </head>

  <body>

    @include('backend.includes.leftmenu')
    @include('backend.includes.headermenu')
    @include('backend.includes.rightmenu')
 



    <!-- ########## START: MAIN PANEL ########## -->
   @yield('body-content')
    <!-- ########## END: MAIN PANEL ########## -->

    @include('backend.includes.script')
   
  </body>
</html>
