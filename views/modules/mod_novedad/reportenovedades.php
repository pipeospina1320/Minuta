<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Novedades</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>

<div class="x_panel">
  <div class="x_title">
    <h2>Minuta virtual</h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmnovedad[]" enctype="multipart/form-data">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre De La Sede: <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmnovedad[]" id="selecionasede" required="required">
            <option value=""></option>
            <?php
            $selectsede = new NovedadController();
            $selectsede -> selctSedes();
             ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Servicio:<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmnovedad[]" id="frmnovedadservicio" required="required">
            <option value=""></option>
            <?php
            $selectservi = new NovedadController();
            $selectservi -> selectServicio();
             ?>
          </select>
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Turno: <span class="required">*</span> </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control" name="frmnovedad[]" id="frmnovedadturno" required="required">
          <option>DIURNO</option>
          <option>NOCTUNO</option>
        </select>
      </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Novedad:<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmnovedad[]" id="frmnovedadtipo" required="required">
            <option value=""></option>
            <?php
            $selectiponovedad = new NovedadController();
            $selectiponovedad -> selecTipoNovedad();
             ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Novedad <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea required="required" name="frmnovedad[]" id="frmnovedadnovedad" class="form-control" rows="3" placeholder="DESCRIPCIÓN DE LA NOVEDAD"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha y Hora: <span class="required">*</span>
        </label>
        <div class='col-sm-4'>
                <div class='input-group date' id='myDatepicker4'>
                    <input type='text' class="form-control" readonly="readonly" name="frmnovedad[]" id="frmnovedadfecha" required="required"/>
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
        </div>
      </div>

      <input type="hidden" name="frmnovedad[]" id="fechanovedadreal">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Adjuntar Foto: </label>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <input type="file" class="form-control" id="frmnovedadfile" name="filenovedad" accept=".png, .jpg, .jpeg">
        </div>
      </div>

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input class="btn btn-primary" type="reset" value="Restaurar">
          <input type="submit" class="btn btn-success"  value="Enviar">
        </div>
      </div>

    </form>
  </div>
</div>
</div>
