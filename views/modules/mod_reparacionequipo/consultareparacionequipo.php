<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Consulta <small>Equipos En Reparación</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>
<div class="x_panel">
                  <div class="x_title">
                    <h2>Reparación de Equipo <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Dispositivo</th>
                          <th>Fecha Reporte</th>
                          <th>Cliente</th>
                          <th>Statu</th>
                          <th>Serial</th>
                          <th>Descripción</th>
                          <th>Acciónes</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $vistaUsuariocreados = new ReparacionEquipoController();
                  			$vistaUsuariocreados -> ConsultReparacionEquipos();
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


              <div id="demo-form2"></div>
