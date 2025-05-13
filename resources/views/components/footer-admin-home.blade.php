<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Sistem Informasi Apotek &copy; <span id="displayYear"></span> </strong>
</footer>
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="/assetsBS/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assetsBS/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- custom js -->
<script src="/js/custom.js"></script>

<!-- AdminLTE App -->
<script src="/assetsBS/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assetsBS/dist/js/demo.js"></script>

<!-- DataTables Core -->
<script src="/assetsBS/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assetsBS/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Responsive -->
<script src="/assetsBS/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assetsBS/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- DataTables Buttons -->
<script src="/assetsBS/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assetsBS/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assetsBS/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assetsBS/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assetsBS/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Export Dependencies -->
<script src="/assetsBS/plugins/jszip/jszip.min.js"></script>
<script src="/assetsBS/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assetsBS/plugins/pdfmake/vfs_fonts.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/assetsBS/plugins/chart.js/Chart.min.js"></script>
<script src="/assetsBS/plugins/chart.js/Chart.bundle.js"></script>

<script>
  $(document).ready(function() {
    //Data Table
    $("#datatable").DataTable({
      "paging": true,
      "pageLength": 5,
      "searching": true,
      "columnDefs": [{
        "width": "5%",
        "targets": 0,
        "orderable": true
      }],
      "order": [
        [3, 'desc']
      ]
    });
  });
</script>

