<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Configuración <small>Usuarios</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>
<div class="x_panel">
  <div class="x_title">
    <h2>Crear Usuario <small></small></h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left" name="frmregister[]">

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de Identificación: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="number" name="frmregister[]"  required="required" id="frmregisternumber" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Primer Nombre: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="frmregister[]"  required="required" id="frmregisteruser1" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Segundo Nombre: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="frmregister[]" id="frmregisteruser2" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Primer Apellido: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="frmregister[]"  required="required" id="frmregisterlast1" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Segundo Apellido: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="frmregister[]" required="required" id="frmregisterlast2" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo: <span class="required">*</span> </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control"  name="frmregister[]" required="required" id="frmregistercargo">
          <option value="0"></option>
          <?php
          $selectsede = new HomeController();
          $selectsede -> selectCarg();
           ?>
        </select>
      </div>
      </div>

      <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente: <span class="required">*</span> </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control"  name="frmregister[]" id="frmregistercliente">
          <option value="0"></option>
          <?php
          $selectsede = new NovedadController();
          $selectsede -> selectClient();
           ?>
        </select>
      </div>
      </div>

      <input type="hidden" name="frmregister[]" value="1" id="frmregisterestado">

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button class="btn btn-primary" type="reset">Restaurar</button>
          <button type="submit" class="btn btn-success">Crear Usuario</button>
        </div>
      </div>

    </form>
  </div>
</div>
