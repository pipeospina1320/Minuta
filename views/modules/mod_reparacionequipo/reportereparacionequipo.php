<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Equipos En Reparación</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>

<div class="x_panel">
  <div class="x_title">
    <h2 class="titlereporteservicio">Reparacion de Equipo</h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmcreateRepaEquipo[]" enctype="multipart/form-data">

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Del Cliente: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="selecioncliente">
            <option value=""></option>
            <?php
$selectcliente = new NovedadController();
$selectcliente->selectClient();
?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nit: <span class="required">*</span></label>
        <div class="col-md-4 col-sm-3 col-xs-12">
          <input type="text" class="form-control" id="nitcliente">
          <span class="fa fa-building-o form-control-feedback right" aria-hidden="true"></span>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Puesto: </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <input type="text" name="frmcreateRepaEquipo[]" class="form-control" id="puestorequipo">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status: <span class="required">*</span></label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="selecionastatus">
            <option value=""></option>
            <?php
$selectstatu = new ReparacionEquipoController();
$selectstatu->selectStatus();
?>
          </select>
        </div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12">Costo: <span class="required"></span></label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="number" class="form-control" name="frmcreateRepaEquipoAdd[]" required="required" id="modelorequipo">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Área Responsable: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="arearequipo">
            <?php
$selectarea = new ReparacionEquipoController();
$selectarea->selectArea();
?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipos De Dispositivo: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="disposotivorequipo">
            <option value=""></option>
            <?php
$selectdispositivo = new ReparacionEquipoController();
$selectdispositivo->selectDispositivo();
?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca: <span class="required">*</span></label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="marcarequipo">
            <option value=""></option>
            <?php
$selectmarca = new ReparacionEquipoController();
$selectmarca->selectMarca();
?>
          </select>
        </div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12">Modelo: <span class="required">*</span></label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="text" class="form-control" name="frmcreateRepaEquipo[]" required="required" id="modelorequipo">
        </div>
      </div>

      <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial: <span class="required">*</span></label>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" class="form-control" name="frmcreateRepaEquipo[]" required="required" id="serialrequipo">
          </div>
          <label class="control-label col-md-2 col-sm-4 col-xs-12">Tiene Garantía: <span class="required">*</span></label>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="x_content">
              <div class="radio">
                <label>
                  Si <input type="radio" class="flat" value="SI" name="frmcreateRepaEquipo[]">
                </label>
                <label>
                  No <input type="radio" class="flat"  value="NO" checked name="frmcreateRepaEquipo[]">
                </label>
            </div>
          </div>
          </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha Retiro: <span class="required">*</span> </label>
        <div class='col-sm-3'>
          <div class="form-group">
          <div class='input-group date'>
              <input type='date' class="form-control" name="frmcreateRepaEquipo[]" required="required" id="fecharetirorequipo">
              <span class="input-group-addon">
                 <span class="fa fa-calendar"></span>
              </span>
          </div>
          </div>
        </div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="textarea" >Fecha Ingreso: <span class="required">*</span> </label>
        <div class='col-sm-3'>
           <div class="form-group">
          <div class='input-group date'>
              <input type='date' class="form-control" name="frmcreateRepaEquipo[]" required="required" id="fechaingresorequipo">
              <span class="input-group-addon">
                 <span class="fa fa-calendar"></span>
              </span>
          </div>
        </div>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha Noficación al Cliente:</label>
        <div class='col-sm-3'>
          <div class="form-group">
          <div class='input-group date'>
              <input type='date' class="form-control" name="frmcreateRepaEquipo[]"  id="fechaclienterequipo">
              <span class="input-group-addon">
                 <span class="fa fa-calendar"></span>
              </span>
          </div>
          </div>
        </div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="textarea" >Fecha Envió Proveedor: </label>
        <div class='col-sm-3'>
           <div class="form-group">
          <div class='input-group date'>
              <input type='date' class="form-control" name="frmcreateRepaEquipo[]"  id="fechaenviorequipo">
              <span class="input-group-addon">
                 <span class="fa fa-calendar"></span>
              </span>
          </div>
        </div>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Proveedor: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="provedorrequipo" >
            <option value=""></option>
            <?php
$selectprovedor = new ReparacionEquipoController();
$selectprovedor->selectProveedor();
?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reparado por: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="reparadorequipo">
            <option value=""></option>
            <?php
$selectreparado = new ReparacionEquipoController();
$selectreparado->selectRepatado();
?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asesor: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="asesorrequipo">
            <option value=""></option>
            <?php
$selectasesor = new ReparacionEquipoController();
$selectasesor->selectAsesor();
?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tecnico Desmonte: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="tecnicorequipo">
            <option value=""></option>
            <?php
$selectecnico = new ReparacionEquipoController();
$selectecnico->selectTecnico();
?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Fisico del Equipo: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmcreateRepaEquipo[]" required="required" id="estadorequipo">
            <option value=""></option>
            <?php
$selectestado = new ReparacionEquipoController();
$selectestado->selectEstado();
?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción De La Falla: <span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <textarea required="required" name="frmcreateRepaEquipo[]" class="form-control" rows="2" id="fallarequipo"></textarea>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnóstico: <span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <textarea required="required" name="frmcreateRepaEquipo[]" class="form-control" rows="3" id="dianosticorequipo"></textarea>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones: <span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <textarea required="required" name="frmcreateRepaEquipo[]" class="form-control" rows="3" id="observacionrequipo"></textarea>
        </div>
      </div>

      <input type="hidden" name="frmcreateRepaEquipo[]" id="fecharequipo">

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Adjuntar Evidencia: </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="file" class="form-control" id="frmfileRepaEquipo" name="frmfilerepaEquipo" accept="application/msword, application/pdf">
        </div>
      </div>


      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="reset" class="btn btn-primary">Restaurar</button>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div>
