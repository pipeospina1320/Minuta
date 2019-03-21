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
        <ul class="nav navbar-right panel_toolbox">
          <li><a href="VisitantesConsultaHoy">Referescar</a></li>
          <li><a>|</a></li>
          <li><a href="VisitantesRegistro">Rigistrar Visitante</a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Cedula</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Fecha y Hora Ingreso</th>
              <th>Areá</th>
              <th>Foto</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $vistaUsuario = new VisitanteController();
      			$vistaUsuario -> consultaVisitanteHoy();
             ?>
          </tbody>
        </table>
      </div>
    </div>

</div>






<div id="demo-form2"></div>
