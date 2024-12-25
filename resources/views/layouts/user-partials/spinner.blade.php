<!-- Spinner Start -->
<div id="spinner"
    class="d-none bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<script>
    // Show spinner on page load
    document.addEventListener("DOMContentLoaded", function() {
        var spinner = document.getElementById('spinner');
        spinner.classList.remove('d-none');
        spinner.classList.add('show');

        // Simulate loading
        setTimeout(function() {
            spinner.classList.remove('show');
            spinner.classList.add('d-none');
        }, 3000); // Adjust as needed
    });
</script>
