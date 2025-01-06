<script type="text/javascript" src="{{ asset('assets/user_assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user_assets/js/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user_assets/js/jquery.collapsible.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user_assets/js/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user_assets/js/jquery.countdown.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user_assets/js/circle-progress.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user_assets/js/jquery.countTo.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/user_assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    @if (session('message'))
        Swal.fire({
            icon: 'info',
            title: 'Message',
            text: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 4000
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




{{-- <script>
    navigator.geolocation.getCurrentPosition(function(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        console.log(latitude, longitude);
        // إرسال الإحداثيات إلى الخادم
        fetch('/nearest-venues', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    latitude,
                    longitude
                }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // بيانات الأماكن الأقرب
            })
            .catch(error => console.error('Error:', error));
    });
</script> --}}
