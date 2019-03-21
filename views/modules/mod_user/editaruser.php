<div class="x_panel">
  <div class="x_title">
    <h2>Editar Usuario <small></small></h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left"  name="frmeditar[]">
      <?php
      $editaruser = new HomeController();
      $editaruser -> editUser();
       ?>
       <div class="ln_solid"></div>
       <div class="form-group">
         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           <button class="btn btn-primary" type="reset">Restaurar</button>
           <button type="submit" class="btn btn-success">Realizar Cambios</button>
         </div>
       </div>
    </form>
  </div>
</div>
