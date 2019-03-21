<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Consulta <small>Novedades</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>
    <div class="x_panel">
      <div class="x_title">
        <h2>Minuta virtual</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Fecha Novedad</th>
              <th>Tipo Novedad</th>
              <th>Novedad</th>
              <th>Nombre Sede</th>
              <th>Servicio</th>
              <th>Turno</th>
              <th>Reporta Novedad</th>
              <th>Evidencia</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $vistaUsuario = new NovedadController();
      			$vistaUsuario -> consultaNovedad();
             ?>
          </tbody>
        </table>
      </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel" style="text-align: center;" >Foto De Evidencia</h3>
      </div>
      <div class="modal-body">
        <div id="fotoevidenciamarco">
          <img id="fotoevidencia" style="width:360px; height:480px;" >
        </div>
      </div>
      <div class="modal-footer">
        <div class="centrarbotonesfoto">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="text-align: center" class="modal-title" id="exampleModalLabel">Observación</h3>
      </div>
      <div class="modal-body">
        <form id="demo-form2" data-parsley-validate name="frmObservacion[]">
        <textarea disabled id="verobservaciones1" class="form-control" rows="3" name="message"></textarea>
        <br>
        <label for="fullname">Persona Quién Hace La Observación : </label>
        <input type="text" id="reportadopor3" class="form-control" name="fullname" disabled="disabled" />


      </div>
      <div class="modal-footer">
        <div class="centrarbotonesfoto">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>      </div>
        </form>
    </div>
  </div>
</div>


<div id="demo-form2"></div>
