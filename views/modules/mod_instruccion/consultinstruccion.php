<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Consulta <small>Instrucciones</small> </h3>
  </div>

</div>
<div class="clearfix"></div>

<div class="x_panel">
  <div class="x_title">
    <h2>Ver Instrucciones</h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">

    <div class="row">
      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="select2_single form-control" tabindex="-1" name="frmconsigpart[]" required="required" id="selecionasedeinstrucciones">
              <option value=""></option>
              <?php
              $selectsede = new NovedadController();
              $selectsede -> selctSedes();
               ?>
            </select>
          </div>
        </div>
        <br>

        <div id="instruccionesresultados">

        </div>
      </form>
    </div>
  </div>
</div>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Consulta <small>Novedades</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Ver Instrucciones Manuales</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Fecha Novedad</th>
              <th>Nombre Sede</th>
              <th>Instrucción</th>
              <th>Reporta Instrucción</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $vistaUsuario = new InstruccionController();
            $vistaUsuario -> consultaInstruccion();
             ?>
          </tbody>
        </table>
      </div>
    </div>
</div>
</div>
