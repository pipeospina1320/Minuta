<div id="Mymodals" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog ">
 <div class="modal-content">

   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" id="cerrar">×</span>
     </button>
     <h4 class="modal-title text-center" id="titlemodal"></h4>
   </div>
   <div class="modal-body" id="contenidomodal">

   </div>
   <div class="modal-footer">
    <div class="bottoncentermodal">
        <button type="button" class="btn btn-primary" id="cerrarnotificacion" data-dismiss="modal">Cerrar</button>
    </div>
   </div>

 </div>
</div>
</div>
      </div>
      <!-- /page content -->
  <!-- footer content -->
  <footer>
    <div class="pull-right">
      <a href="#">Covitec Ltda.</a> - Sistemas de Información orientado a la vigilacia fisíca
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>

  <!-- jQuery -->
  <script src="views/assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="views/assets/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- NProgress -->
  <script src="views/assets/nprogress/nprogress.js"></script>
  <!-- Datatables -->
  <script src="views/assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<?php
if ($_GET["c"] == "reparacionequipo" && $_GET["a"] == "consulReparacionEquipo") {
    echo '<script src="views/assets/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="views/assets/datatables.net-bs/js/responsive.bootstrap.min.js"></script>';
}
?>
  <!-- FastClick -->
  <script src="views/assets/fastclick/lib/fastclick.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="views/assets/moment/min/moment.min.js"></script>
  <script src="views/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-datetimepicker -->
  <script src="views/assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="views/assets/build/js/custom.min.js"></script>
  <!-- Ajax dinamico -->
  <script src="views/assets/js/main.js?<?php echo time(); ?>"></script>
  <!-- iCheck -->
  <script src="views/assets/iCheck/icheck.min.js"></script>
  <!-- SweetAlert -->
  <script src="views/assets/js/sweetalert.min.js"></script>
  <!-- Push -->
  <!-- <script src="views/assets/js/push.min.js"></script> -->
<?php if ($_GET["c"] == "reparacionequipo" && $_GET["a"] == "consulReparacionEquipo") {
    echo '  <script src="views/assets/js/equipoenreparacion.js?' . time() . '"></script>';
}?>
  <!-- Notifications -->
  <script src="views/assets/js/notifications.js?<?php echo time(); ?>"></script>
  <!-- Parsley -->
  <script src="views/assets/parsleyjs/dist/parsley.min.js"></script>
  <!-- Webcam-->
  <script src="views/assets/js/webcam.min.js"></script>



</body>
</html>
