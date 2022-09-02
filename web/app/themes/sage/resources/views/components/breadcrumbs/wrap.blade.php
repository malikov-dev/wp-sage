@if ( function_exists( 'yoast_breadcrumb' ) )
  {{--  настроить можно в Yoast SEO->Отображение в поисковой выдаче->Цепочки навигации  --}}
  @php( yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' ) )
@endif
