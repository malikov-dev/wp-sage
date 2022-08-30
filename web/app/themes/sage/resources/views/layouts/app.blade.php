<!doctype html>
<html {!! get_language_attributes() !!}>
@include('components.head.wrap')
<body @php body_class() @endphp>
<div class="wrapper">

  @php do_action('get_header') @endphp
  @include('components.header.wrap')

  <main id="main" class="main">
    @yield('content')
  </main>

  @hasSection('sidebar')
    @yield('sidebar')
  @endif

</div>
@include('components.footer.wrap')
@php do_action('get_footer') @endphp
@php wp_footer() @endphp
</body>
</html>
