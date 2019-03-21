<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Configuración <small>Usuarios</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>
    <div class="x_panel">
      <div class="x_title">
        <h2>Ver Usuario <small>Creados</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Cedula</th>
              <th>Cargo</th>
              <th>Cliente</th>
              <th>Estado </th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $vistaUsuariocreados = new HomeController();
      			$vistaUsuariocreados -> verUserNormal();
             ?>
          </tbody>
        </table>
      </div>
    </div>
</div>



<div id="demo-form2"></div>
