<!DOCTYPE html>
<html lang="en">
@include('parts.head')

<body>
  <div id="app">
    <div class="main-wrapper">
		@include('parts.navbar')
		@include('parts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
			@yield('content')
      </div>
	  @include('parts.footer')
    </div>
  </div>

@include('parts.script')
</body>
</html>
