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
                              <th>Nombre Sede</th>
                              <th>Novedad</th>
                              <th>Servicio</th>
                              <th>Turno</th>
                              <th>Fecha Novedad</th>
                              <th>Reporta Novedad</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $vistaUsuario = new NovedadController();
                      			$vistaUsuario -> ConsultaNovedad();
                             ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
</div>
