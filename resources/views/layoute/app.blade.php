<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.head')
  
</head>
<body>
    @include('layout.navbar')
     <main class="min-h-screen">
        @yield('content')
    </main>
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>