@include('admin.layouts.header')
<body>
  <div class="layout-wrapper d-flex flex-column min-vh-100">
    <div class="layout-container d-flex flex-grow-1">
      @include('admin.layouts.sidebar')
      <div class="layout-page flex-grow-1">
        @include('admin.layouts.navbar')
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    @include('admin.layouts.footer')
  </div>
</body>
