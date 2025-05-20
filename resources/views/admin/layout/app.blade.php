<!doctype html>
<html lang="en">
  <!--begin::Head-->
  @include('layout.head')
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->

      @include('admin.layout.navbar')
      <!--end::Header-->
      <!--begin::Sidebar-->
      @include('admin.layout.sidebar')
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">

          <!--end::Container-->

        <div class="app-content">
        @yield('content')
        </div>

        <!--end::App Content-->
      </main>

      {{-- </footer> --}}
      @include('admin.layout.footer')
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    @include('admin.layout.script')
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
