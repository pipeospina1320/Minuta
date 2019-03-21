<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Consulta <small>Visitantes</small> </h3>
    </div>

  </div>
  <!-- <div class="clearfix"></div> -->
    <div class="x_panel">
      <div class="x_title">
        <h2>Consultar Visitantes</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Cedula Del Visitante</th>
              <th>Visitante Del Visitante</th>
              <th>Empresa Del Visitante</th>
              <th>Motivo Visita</th>
              <th>Areá</th>
              <th>Visitado</th>
              <th>Fecha Hora Entrada</th>
              <th>Fecha Hora Salida</th>
              <th>Registra Visita Ingreso</th>
              <th>Registra Visita Salida</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $vistaUsuario = new VisitanteController();
      			$vistaUsuario -> consultaVisitante();
             ?>
          </tbody>
        </table>
      </div>
    </div>

</div>






<div id="demo-form2"></div>
