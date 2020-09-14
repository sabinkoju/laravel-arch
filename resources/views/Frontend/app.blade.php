<!DOCTYPE html>
<html lang="en">
  @include('Frontend.layouts.head')

<body>
    @include('Frontend.layouts.nav')

    <!-- Page Header -->
    @include('Frontend.layouts.pageheader')
  
    <!-- Main Content -->
      @yield('main-content')
          {{-- @show --}}

    <!-- Footer -->
    @include('Frontend.layouts.footer')
</body>

</html>
