<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Consulta <small>Equipos</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>
<div class="x_panel">
                  <div class="x_title">
                    <h2>Equipos <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Dispositivo</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Serial</th>
                          <th>Estado</th>
                          <th>Fecha Restristrada</th>
                          <th>Accciónes</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $vistaEquipos = new EquipoController();
                  			$vistaEquipos -> consultaEquipo();
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


              <div id="demo-form2"></div>
