@include('admin.layouts.header')
<body>
  <div class="layout-wrapper d-flex flex-column min-vh-100">
    <div class="layout-container d-flex flex-grow-1">
      @include('admin.layouts.sidebar')
      <div class="layout-page d-flex flex-column flex-grow-1">
        @include('admin.layouts.navbar')
        <div class="content-wrapper p-0 flex-grow-1">
          @yield('content')
        </div>
        @include('admin.layouts.footer')
      </div>
    </div>
  </div>
</body>
