<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Dotación</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>

<div class="x_panel">
  <div class="x_title">
    <h2>Entrega o Recibida de Puesto</h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmdotacion[]">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Elemento: <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmdotacion[]" id="frmdotacionelemto" required="required">
            <option value=""></option>
            <?php
            $selectelemt = new DotacionController();
            $selectelemt -> selectElement();
             ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Serie: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text"  name="frmdotacion[]" id="frmdotacionserie" required="required" class="form-control col-md-7 col-xs-12">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado: <span class="required">*</span> </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control" name="frmdotacion[]" id="frmdotacionestdo" required="required">
          <option value=""></option>
          <?php
          $selectelemt = new DotacionController();
          $selectelemt -> selectAspecto();
           ?>
        </select>
      </div>
      </div>

      <div class="form-group" id="dotacionmalo" >
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observación: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea required="required" name="frmdotacion[]" id="frmdotacionobservacion" class="form-control" rows="3" placeholder="DESCRIPCIÓN DE LA FALLA"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha y Hora: <span class="required">*</span>
        </label>
        <div class='col-sm-4'>
                <div class='input-group date' id='myDatepicker4'>
                    <input type='text' class="form-control" readonly="readonly" name="frmdotacion[]" id="frmdotacionestdofecha" required="required"/>
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
        </div>
      </div>

      <input type="hidden" name="frmdotacion[]" value="" id="fechadotacion">

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
