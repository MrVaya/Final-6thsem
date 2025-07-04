<footer class="py-5 animate-footer" style="background:#111; color:#fff;">
  <div class="container-lg">
    <div class="row align-items-start">
      <!-- Logo and Description -->
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 text-center text-lg-start">
        <h2 class="fw-bold mb-2 text-white" style="font-family:'Poppins','Nunito','Inter',sans-serif;letter-spacing:2px;">FUTBOOK</h2>
        <div class="mb-2 text-white">Premium Futsal Booking</div>
        
        <div class="d-flex justify-content-center justify-content-lg-start gap-3 mb-3">
          <a href="#" class="d-inline-block text-white" style="font-size:1.3rem;"><i class="bi bi-facebook"></i></a>
          <a href="#" class="d-inline-block text-white" style="font-size:1.3rem;"><i class="bi bi-instagram"></i></a>
          <a href="#" class="d-inline-block text-white" style="font-size:1.3rem;"><i class="bi bi-twitter"></i></a>
        </div>
      </div>
      <!-- Support/Links -->
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-center">
        <div class="row">
          <div class="col-6">
            <h5 class="fw-bold mb-3 text-white">Support</h5>
            <ul class="list-unstyled">
              <li><a href="http://localhost:8000/faq" class="text-white text-decoration-none">FAQ</a></li>
              <li><a href="http://localhost:8000/contact" class="text-white text-decoration-none">Contact</a></li>
            </ul>
          </div>
          <div class="col-6">
            <h5 class="fw-bold mb-3 text-white">Links</h5>
            <ul class="list-unstyled">
              <li><a href="http://localhost:8000/about" class="text-white text-decoration-none">About us</a></li>
              <li><a href="{{ route('frontend.terms') }}" class="text-white text-decoration-none">Conditions</a></li>
              <li><a href="{{ route('frontend.privacy') }}" class="text-white text-decoration-none">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Contacts -->
      <div class="col-lg-3 col-md-8 text-center text-lg-end">
        <h5 class="fw-bold mb-3 text-white">Contacts</h5>
        <div class="mb-1 text-white">+977 9805802329</div>
        <div class="mb-1 text-white">Pokhara, Nepal</div>
        <div class="mb-1 text-white">info@futbook.com</div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 text-center text-white small">
        Copyright © 2025 | Powered by MR VAYA
      </div>
    </div>
  </div>
</footer>
    <script src="{{ asset('frontend-assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTPVePUkhP1xu7Nf6rvvmK3k9UGi1Pu65dWNTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/script.js') }}"></script>
    <script src="{{ asset('backend-assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('backend-assets/js/main.js') }}"></script>
  </body>
</html>

@push('styles')
<style>
/* Footer fade-in animation */
.animate-footer {
  opacity: 0;
  transform: translateY(40px);
  animation: footerFadeIn 1.2s cubic-bezier(.23,1.01,.32,1) 0.2s forwards;
}
@keyframes footerFadeIn {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
/* Social icon hover animation */
.d-inline-block.text-white {
  transition: transform 0.25s cubic-bezier(.23,1.01,.32,1), box-shadow 0.25s;
  box-shadow: 0 0 0 rgba(0,0,0,0);
}
.d-inline-block.text-white:hover {
  transform: scale(1.18) rotate(-6deg);
  box-shadow: 0 4px 16px 0 rgba(111,207,151,0.18);
  color: #6fcf97 !important;
}
</style>
@endpush