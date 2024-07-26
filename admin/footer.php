<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <a href="https://unisla.ac.id/"><b>INFORMATIKA</b> UNIVERSITAS ISLAM LAMONGAN</a>
    </div>
    <strong>Copyright &copy; <script>
            document.write(new Date().getFullYear())
        </script> PRESENSI SMK SUNAN DRAJAT</a></strong> 
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $config['base_url']; ?>vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $config['base_url']; ?>vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= $config['base_url']; ?>vendor/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $config['base_url']; ?>vendor/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= $config['base_url']; ?>vendor/dist/js/demo.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="<?= $config['base_url']; ?>vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $config['base_url']; ?>vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $config['base_url']; ?>vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $config['base_url']; ?>vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $config['base_url']; ?>vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $config['base_url']; ?>vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>