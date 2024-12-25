<!-- JavaScript Libraries -->
<script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin_assets/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('assets/admin_assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/admin_assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/admin_assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/admin_assets/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin_assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assets/admin_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="https://kit.fontawesome.com/a66e0953eb.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/admin_assets/js/main.js') }}"></script>


<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000
        });
    @endif
</script>
<script>
    function confirmDelete(button) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    }
</script>
