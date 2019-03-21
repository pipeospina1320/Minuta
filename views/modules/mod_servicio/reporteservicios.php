<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Servicios</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>

<div class="x_panel">
  <div class="x_title">
    <h2 class="titlereporteservicio">Reporte De Servicio Virtual</h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <br />
    <form id="demo-form2" data-parsley-validate  class="form-horizontal form-label-left" name="frmservicio[]">

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Del Cliente: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmservicio[]" required="required" id="selecionclienteser">
            <option value=""></option>
            <?php
            $selectsede = new NovedadController();
            $selectsede -> selectClient();
             ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nit: <span class="required">*</span></label>
        <div class="col-md-4 col-sm-3 col-xs-12">
          <input type="text" class="form-control" id="nitclienteser">
          <span class="fa fa-building-o form-control-feedback right" aria-hidden="true"></span>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dirección: <span class="required">*</span></label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="text" name="frmservicio[]" class="form-control" required="required" id="direccionclienteser">
          <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
        </div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12">Teléfono: <span class="required">*</span></label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="text" name="frmservicio[]" class="form-control" required="required" id="telefonoclienteser">
          <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Número Abonado: <span class="required">*</span></label>
        <div class="col-md-4 col-sm-6 col-xs-12">
        <input type="text" name="frmservicio[]" class="form-control" required="required" id="abonadoser">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha Reporte: <span class="required">*</span>
        </label>
        <div class="col-sm-4">
               <div class="input-group date">
                   <input type="date" name="frmservicio[]" class="form-control" required="required" id="fechareporte" >
                   <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
       </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Persona Que Reporta Servicio:<span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
        <input type="text" name="frmservicio[]" class="form-control" required="required" id="personaser">
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Síntomas Reportado Por Cliente <span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <textarea required="required" id="sintomaser" name="frmservicio[]" class="form-control" rows="2" placeholder="Descripción Síntomas Reportado Por Cliente"></textarea>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Equipo: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <select class="select2_single form-control" tabindex="-1" name="frmservicio[]" required="required" id="disposotivoser">
            <option value=""></option>
            <?php
            $selectsede = new ReparacionEquipoController();
            $selectsede -> selectDispositivo();
             ?>
          </select>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha De Ejecución: <span class="required">*</span>  </label>
        <div class="col-sm-4">
               <div class="input-group date">
                   <input type="date" name="frmservicio[]" class="form-control" required="required" id="fechaejecucion">
                   <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
       </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Hora Entrada: <span class="required">*</span> </label>
        <div class="col-sm-3">
          <div class="form-group">
          <div class="input-group date">
              <input type="time" name="frmservicio[]" class="form-control" required="required" id="horaentrada" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$">
              <span class="input-group-addon">
                 <span class="fa fa-clock-o"></span>
              </span>
          </div>
          </div>
        </div>
        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="textarea" >Hora Salida: <span class="required">*</span> </label>
        <div class="col-sm-3">
           <div class="form-group">
          <div class="input-group date">
              <input type="time" name="frmservicio[]" class="form-control" required="required"  id="horasalida">
              <span class="input-group-addon">
                 <span class="fa fa-clock-o"></span>
              </span>
          </div>
        </div>
        </div>
      </div>

      <div class="item form-group" >
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo De Servicio: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="x_content">
            <div class="radio" >
              <label>
                <input type="radio" name="opcionservicio[]" class="flat" value="Mantenimiento" required="required" checked> Mantenimiento
              </label>
              <label>
                <input type="radio" name="opcionservicio[]" class="flat" value="Instalación"> Instalación
              </label>
              <label>
                <input type="radio" name="opcionservicio[]" class="flat" value="Garantía"> Garantía
              </label>
          </div>
        </div>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción Del Servicio Realizado:  <span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <textarea required="required" name="frmservicio[]" class="form-control" rows="10" placeholder="Descripción del servicio realizado; (¿Qué?, Por qué?, ¿Causa?) " id="descripcionser"></textarea>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Causas Del Servicio: <span class="required">*</span>  </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_content">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="1" class="flat" data-parsley-mincheck="1" checked> 1. Inducción De Manejo</td>
                          <td><input type="checkbox" name="iCheckser[]" value="10" class="flat"> 10. Falla Funcionamiento Equipo</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="2" class="flat"> 2. Asignación / Cambio De Clave</td>
                          <td><input type="checkbox" name="iCheckser[]" value="11" class="flat"> 11. Falla Electrónica Del Equipo</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="3" class="flat"> 3. Pruebas Del Sistema</td>
                          <td><input type="checkbox" name="iCheckser[]" value="13" class="flat"> 12. Falla Por Tercero</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="4" class="flat"> 4. Bloqueo Del Sistema </td>
                          <td><input type="checkbox" name="iCheckser[]" value="13" class="flat"> 13. Falla De Comunicación </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="5" class="flat"> 5. Siguimiento Del Servicio Anterior</td>
                          <td><input type="checkbox" name="iCheckser[]" value="14" class="flat"> 14. Falla Por Daño En Cable </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="6" class="flat"> 6.Traslado / Reubicación De Equipo </td>
                          <td><input type="checkbox" name="iCheckser[]" value="15" class="flat"> 15. Falla De Batería </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="7" class="flat"> 7. Desmonte / Retiro Equipo  </td>
                          <td><input type="checkbox" name="iCheckser[]" value="16" class="flat"> 16. Falla De Programación Equipo </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="8" class="flat"> 8. Adición / Cambio Equipo  </td>
                          <td><input type="checkbox" name="iCheckser[]" value="17" class="flat"> 17. Falla Manejo Del Sistema </td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" name="iCheckser[]" value="9" class="flat"> 9. Daño Físico / Mecánico Del Equipo  </td>
                          <td><input type="checkbox" name="iCheckser[]" value="18" class="flat"> 18. Otros: </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>

              </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Servicio Terminado: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="x_content">
            <div class="radio">
              <label>
                <input type="radio" name="opcionterminado[]" class="flat" value="Si" required="required" checked> Si
              </label>
              <label>
                <input type="radio" name="opcionterminado[]" class="flat" value="No"> No
              </label>
          </div>
        </div>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Daños o Faltas: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="x_content">
            <div class="radio">
              <label>
                <input type="radio" name="opciondano[]" class="flat"  value="Si" required="required" checked> Si
              </label>
              <label>
                <input type="radio" name="opciondano[]" class="flat" value="No"> No
              </label>
          </div>
        </div>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Seguimiento <span class="required">*</span>
        </label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <textarea required="required" name="frmservicio[]" class="form-control" rows="2" placeholder="Descripción Del Seguimiento a Seguir" id="seguimientoser"></textarea>
        </div>
      </div>

      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Se Factura: <span class="required">*</span></label>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="x_content">
            <div class="radio">
              <label>
                <input type="radio" name="opcionfactura[]" class="flat"  value="Si" required="required" checked> Si
              </label>
              <label>
                <input type="radio" name="opcionfactura[]" class="flat" value="No"> No
              </label>
          </div>
        </div>
        </div>
      </div>

      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button class="btn btn-primary" type="reset">Restaurar</button>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </div>

    </form>
  </div>
</div>

</div>
