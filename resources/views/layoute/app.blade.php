<!DOCTYPE html>
<html lang="en">
<head>
  @include('layoute.head')
  
</head>
<body>
    @include('layoute.header')
    @include('layoute.navbar')
     <main class="min-h-screen">
        @yield('content')
    </main>
    @include('layoute.footer')
    @include('layoute.scripts')
</body>

</html>