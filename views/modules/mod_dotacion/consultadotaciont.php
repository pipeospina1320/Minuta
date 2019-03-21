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
                  <th>Fecha Reporte</th>
                  <th>Elemento</th>
                  <th>Serie</th>
                  <th>Estado</th>
                  <th>Observación</th>
                  <th>Persona Reporta</th>
                  <th>Fecha Real R.</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $vistaUsuario = new DotacionController();
          			$vistaUsuario -> consultaDotacionTotal();
                 ?>
              </tbody>
            </table>
          </div>
      </div>
</div>




<div id="demo-form2"></div>
