<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- Node Waves -->
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>

<!-- Menu JS -->
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
@yield('vendor-script')

<!-- Theme JS -->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>
<!-- Pricing Modal JS -->
@stack('pricing-script')
<!-- Page JS -->
@yield('page-script')

@stack('modals')
@livewireScripts
