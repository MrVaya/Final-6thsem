@include('frontend.layouts.header')
@include('frontend.layouts.navbar')
@yield('content')
@include('frontend.layouts.footer')

@push('styles')
<style>
/* Card hover animation */
.card, .venue-card {
  transition: box-shadow 0.25s cubic-bezier(.23,1.01,.32,1), transform 0.22s cubic-bezier(.23,1.01,.32,1);
}
.card:hover, .venue-card:hover {
  box-shadow: 0 8px 32px 0 rgba(60,72,88,.18);
  transform: translateY(-6px) scale(1.025);
}
/* Button hover animation */
.btn, .venue-card-btn {
  transition: background 0.18s, color 0.18s, transform 0.18s;
}
.btn:hover, .venue-card-btn:hover {
  transform: scale(1.06);
  filter: brightness(1.08);
}
/* Image hover animation */
.card-img-top, .venue-card-img img, img.img-hover {
  transition: transform 0.32s cubic-bezier(.23,1.01,.32,1);
}
.card-img-top:hover, .venue-card-img img:hover, img.img-hover:hover {
  transform: scale(1.07) rotate(-2deg);
}
</style>
@endpush
