 </div>
 <!-- End of Main Content -->

 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; Your Website 2020</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= BASE_URL ?>Login/logout">Logout</a>
             </div>
         </div>
     </div>
 </div>


 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <!-- Bootstrap core JavaScript-->
 <script src="<?= BASE_URL ?>assets/vendor/jquery/jquery.min.js"></script>
 <script src="<?= BASE_URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= BASE_URL ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= BASE_URL ?>assets/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= BASE_URL ?>assets/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= BASE_URL ?>assets/js/demo/chart-area-demo.js"></script>
 <script src="<?= BASE_URL ?>assets/js/demo/chart-pie-demo.js"></script>
 <!-- Page level plugins -->
 <script src="<?= BASE_URL ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= BASE_URL ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= BASE_URL ?>assets/js/demo/datatables-demo.js"></script>
 <script type="text/javascript">
var base_url = "<?= BASE_URL; ?>";
 </script>
 <?php

    if (!empty($data['js'])) {
        foreach ($data['js'] as $key => $value) {
            echo '<script src="' . BASE_URL . 'assets/js/' . $value . '"></script>';
        }
    }
    ?>

 <script
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwVoaqyCzvPJKC9Kz80HAHaNn0wbBHZDU&callback=initMap&libraries=&v=weekly"
     async>
 </script>
 </body>

 </html>