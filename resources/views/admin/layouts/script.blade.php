<!-- Vendor JS Files -->
<script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/quill/quill.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>


<!-- Template Main JS File -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize DataTables
        $('.datatable').DataTable({
            searching: true,
        });

        // Handle the status toggle with AJAX
        // $('.toggle-status').on('click', function() {
        //     var id = $(this).data('id');
        //     var statusElement = $(this);

        //     $.ajax({
        //         url: 'http://127.0.0.1:8000/admin/contacts/update-status',
        //         type: 'POST',
        //         data: {
        //             id: id,
        //             _token: '{{ csrf_token() }}'  // Make sure CSRF token is correct
        //         },
        //         success: function(response) {
        //             if (response.success) {
        //                 // Update the badge based on the new status
        //                 if (response.status == 1) {
        //                     statusElement.removeClass('bg-success').addClass('bg-danger').text('Unchecked');
        //                 } else {
        //                     statusElement.removeClass('bg-danger').addClass('bg-success').text('Checked');
        //                 }
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             alert('Something went wrong! Please try again.');
        //         }
        //     });
        // });
    });
</script>
@yield('script')
