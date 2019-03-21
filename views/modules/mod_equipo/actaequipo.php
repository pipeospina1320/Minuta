<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Equipos</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>

<div class="x_panel">
  <div class="x_title">
    <h2 class="titlereporteservicio">Equipo</h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">

        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmcreateActa[]">

          <input type="hidden" name="frmcreateActa[]" value="<?php echo $data; ?>">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres Y Apellidos: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateActa[]" class="form-control" required="required" id="frmactanombreyapellido">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Cédula de Ciudadanía: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateActa[]" class="form-control" required="required" id="frmactacedula">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateActa[]" class="form-control" required="required" id="frmactacargo">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Nuevo (Si/No): <span class="required">*</span>  </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="x_content">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td><b>EQUIPO:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaNewEquipo[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaNewEquipo[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>PROTECTOR DE SILICONA:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaNewSilicona[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaNewSilicona[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>VIDRO TEMPLADO:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaNewVidrio[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaNewVidrio[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>CARGADOR:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaNewCargador[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaNewCargador[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>BATERIA:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaNewBateria[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaNewBateria[]" class="flat" value="0">
                                  </label>
                              </tr>
                          </table>
                        </div>
                    </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Entregado: <span class="required">*</span>  </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="x_content">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td><b>EQUIPO:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaEntreEquipo[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaEntreEquipo[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>PROTECTOR DE SILICONA:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaEntreSilicona[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaEntreSilicona[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>VIDRO TEMPLADO:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaEntreVidrio[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaEntreVidrio[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>CARGADOR:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaEntreCargador[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaEntreCargador[]" class="flat" value="0">
                                  </label>
                              </tr>
                              <tr>
                                <td><b>BATERIA:</b></td>
                                <td>
                                  <label>
                                    SI <input type="radio" name="frmcreateActaEntreBateria[]" class="flat" value="1" required="required" checked>
                                  </label>
                                  <label>
                                    NO <input type="radio" name="frmcreateActaEntreBateria[]" class="flat" value="0">
                                  </label>
                              </tr>
                          </table>
                        </div>
                    </div>
            </div>

          <input type="hidden" name="frmcreateActa[]" value="" id="fechaacta">

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="reset" class="btn btn-primary">Restaurar</button>
              <button type="submit" class="btn btn-success">Generar</button>
            </div>
          </div>

        </form>
    </div>
  </div>
</div>

</div>
