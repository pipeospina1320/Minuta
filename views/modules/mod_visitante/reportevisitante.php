<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Visitantes</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>
  <div class="x_panel">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="">

      <div class="x_title">
               <h2>Reportar un visitante <small></small></h2>
               <ul class="nav navbar-right panel_toolbox">
                 <li><a href="VisitantesConsultaHoy">Salida Visitante</a></li>
               </ul>
               <div class="clearfix"></div>
             </div>

      <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_content">
  <br />
  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmvisitanteregister[]" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">C.C: <span class="required">*</span></label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <input type="number" class="form-control" placeholder="DIGITE CÉDULA DE CIUDADANÍA" required="required" name="frmvisitanteregister[]" id="cedulavisitante">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres: <span class="required">*</span></label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <input type="text" class="form-control" placeholder="Digite Nombre Del Visitante" required="required" name="frmvisitanteregister[]" id="frmvisitantenombre">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos: <span class="required">*</span></label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <input type="text" class="form-control" placeholder="Digite Apellidos Del Visitante" required="required" name="frmvisitanteregister[]" id="frmvisitanteapellido">
    </div>
  </div>

  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Área Responsable: <span class="required">*</span></label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <select class="select2_single form-control" tabindex="-1" name="frmvisitanteregister[]" required="required" id="selecionaarea">
        <option value=""></option>
        <?php
        $selectarea = new VisitanteController();
        $selectarea -> selectAreaVisitar();
         ?>
      </select>
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12">Responsable: <span class="required">*</span> </label>
  <div class="col-md-8 col-sm-8 col-xs-12">
    <select class="form-control" name="frmvisitanteregister[]" required="required" id="selecionaresponsable">

    </select>
  </div>
  </div>

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Motivo De La Visita <span class="required">*</span>
    </label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <textarea required="required" name="frmvisitanteregister[]" class="form-control" rows="2" placeholder="Descripción de la visita" id="frmvisitantedescrp"></textarea>
    </div>
  </div>

  <input type="hidden" name="frmvisitanteregister[]" id="fechavisita">

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Empresa: <span class="required">*</span></label>
    <div class="col-md-8 col-sm-8 col-xs-12">
      <input type="text" class="form-control" placeholder="Digite De Que Empresa Viene El Visitante" required="required" name="frmvisitanteregister[]" id="frmvisitanteempresa">
    </div>
  </div>

</div>
      </div>
      <!-- Inicio foto -->
      <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
        <div id="preimagenvisitante">
          <div class="preimagenvisitante">
            <img id="foto" src="views/assets/images/user_250x187.png">
          </div>
        </div>
      </div>
      <!--fin foto -->

      <div class="clearfix"></div>
      <div id="resultadovisiante" style="color: red; text-align: center;"> </div>

      <div class="ln_solid"></div>
      <div class="form-group bottoncenter">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success">Registrar Visita</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title" style="text-align: center;">Tomar Foto Al Visitante</h4>
      </div>
      <div class="modal-body">
          <div id="preimagenvisitante2">
            <div id="preimagenfile">
              <img id="foto" src="views/assets/images/user_250x187.png">
            </div>
            <div id="my_camera"></div>
            <div id="results"></div>
          </div>
            <br>
          <div class="bottoncentermodal">
            <button type="button" class="btn btn-primary" id="permisotomarfoto">Tomar Foto</button>
            <button type="button" class="btn btn-primary" id="capturarfoto">Capturar</button>
            <button type="button" class="btn btn-primary" id="volveratomar">Volver a Tomar</button>
          </div>


      </div>
      <div class="modal-footer">
        <div class="bottoncentermodal">
          <button type="button" class="btn btn-success" id="subirfoto">Subir Foto</button>
        </div>
      </div>
    </div>
  </div>
</div>
