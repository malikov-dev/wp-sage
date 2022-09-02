<header class="header">
  <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  <div style="padding: 30px;">
    {!! bem_menu('primary_navigation','menu-main') !!}
  </div>

  <div style="border: 1px solid black;padding: 15px;">
    @include('icons.like', ['iClass' => 'banner__link-svg'])
  </div>
</header>
