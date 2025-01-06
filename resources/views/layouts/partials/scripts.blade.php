<!-- JavaScript Libraries -->
<!-- Add DataTables dependencies -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" /> --}}

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
<script>
    $(document).ready(function() {
        // Initialize DataTable with pagination, search, and custom language settings
        $('#usersTable').DataTable({
            paging: true, // Enable pagination
            searching: true, // Enable search
            responsive: true, // Make the table responsive
            order: [
                [0, 'asc']
            ], // Default order by the first column (ID/Counter)
            language: {
                search: "Search:", // Label for the search box
                lengthMenu: "Show _MENU_ entries", // Dropdown to select the number of rows
                info: "Showing _START_ to _END_ of _TOTAL_ entries", // Footer info text
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
