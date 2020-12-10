      <!--End Dashboard Content-->
	  
	<!--start overlay-->
    <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 PRAYOGA ABDI SETIAWAN
        </div>
      </div>
    </footer>
	<!--End footer-->
	

   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="<?= BASE_URL ?>assets/vendor/js/jquery.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/js/popper.min.js"></script>
  <script src="<?= BASE_URL ?>assets/vendor/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="<?= BASE_URL ?>assets/vendor/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="<?= BASE_URL ?>assets/vendor/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="<?= BASE_URL ?>assets/vendor/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="<?= BASE_URL ?>assets/vendor/plugins/Chart.js/Chart.min.js"></script>
    
  <!-- datatables -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    var base_url = "<?= BASE_URL; ?>";
  </script>
  <?php
    if(!empty($data['js'])){
      foreach ($data['js'] as $key => $value) {
        echo '<script src="'. BASE_URL . 'assets/js/' .$value.'"></script>';
      }
    }
  ?>

</body>
</html>
