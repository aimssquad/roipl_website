<!-- Vendor JS Files -->
<script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/quill/quill.js') }}"></script>
{{-- <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
<script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>



<!-- Template Main JS File -->
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<!-- CKEditor 5 CDN -->
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}

<script>
    $('#myTable').DataTable({
            searching: true,
            paging: false,
            lengthChange: false,
            info: true,
        });
    $(document).ready(function() {
        $('#exportForm').on('submit', function(e) {
            e.preventDefault();

            let tableData = [];
            let tableHeadings = [];
            let excludeColumnIndex = -1;
            let filename = $('#filenameInput').val();
            $('#myTable thead th').each(function(index) {
                let headingText = $(this).text().trim();
                if (headingText.toLowerCase() !== 'actions') {
                    tableHeadings.push(headingText);
                } else {
                    excludeColumnIndex = index;
                }
            });

            $('#myTable tbody tr').each(function() {
                let row = [];
                $(this).find('td').each(function(index) {
                    if (index !== excludeColumnIndex) {
                        let cellText;
                        if ($(this).find('span').length > 0) {
                            cellText = $(this).find('span').text().trim();
                        } else {
                            cellText = $(this).text().trim();
                        }

                        row.push(cellText);
                    }
                });
                tableData.push(row);
            });
            $('#data').val(JSON.stringify(tableData));
            $('#headings').val(JSON.stringify(tableHeadings));

            let today = new Date().toISOString().split('T')[0];
            $('#filename').val(filename + '_' + today + '.xls');
            $(this).off('submit').submit();
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#inputEventDescription'))
            .then(editor => {
                editor.ui.view.editable.element.style.minHeight = '200px';

                // Ensure the editor's content is added to the form before submission
                document.querySelector('form').addEventListener('submit', function() {
                    document.querySelector('#inputEventDescription').value = editor.getData();
                });
            })
    });
</script>


@yield('script')
