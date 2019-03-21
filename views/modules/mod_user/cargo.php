<div class="page-title">
  <div class="title_left">
    <h3>Configuración <small>Cargos</small> </h3>
  </div>

</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">

    <div class="col-md-12 col-xs-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear un Nuevo Cargo<small></small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmcargo[]" >
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo Nuevo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" placeholder="Nombre del Cargo Nuevo" required="required" id="frmcargonombre" name="frmcargo[]">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="reset">Limpiar</button>
                <button type="submit" class="btn btn-success">Crear Cargo</button>
              </div>
            </div>

          </form>
        </div>
      </div>


    <div class="x_panel">
      <div class="x_title">
        <h2>Cargos cargados</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Cargo</th>
              <th>Creado Por</th>
            </tr>
          </thead>
          <?php
          $vistacargos = new HomeController();
          $vistacargos -> verCargo();
           ?>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>

    </div>
  </div>
</div>
