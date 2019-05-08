<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="page-title">
      <div class="title_left">
        <h3>Consulta <small>Equipos En Reparación</small> </h3>
      </div>
    </div>
  <div class="clearfix"></div>
  <div class="x_panel">
    <div class="x_title">
      <div class="col-md-5 col-sm-5 col-xs-12">
        <h2>Reparación de Equipo <small></small></h2>
       </div>

      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="tablereparacionequipo" class="table table-bordered table-hover dt-responsive">
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
      </table>
    </div>
  </div>
  </div>

 <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="clearfix"></div>
      <div class="x_panel">
          <div class="x_title">
            <div class="col-md-5 col-sm-5 col-xs-12">
              <h2>Exportar a Excel<small></small></h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="well" style="overflow: auto">
                      <div class="col-md-5">
                        Exportar a Excel quipos En Reparación
                            <form class="form-inline" >
                                <div class="form-group">
                                    <div class="input-prepend input-group">
                                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                      <input type="text" style="width: 200px" name="frmexportreqrep" id="reservation" class="form-control" value="" >
                                    </div>
                                </div>
                                  <a id="fechaExcel" data-fechas="" class="btn btn-success exportexcel"> <i class="fa fa-file"></i> Exportar</a>
                            </form>
                      </div>

                      <div class="col-md-7">
                                     Exportar a Excel Equipos En Reparación En Prestamo
                            <form class="form-inline" >
                                <div class="form-group">
                                    <div class="input-prepend input-group">
                                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                      <input type="text" style="width: 200px" name="frmexportreqreprestamo" id="reservationPretamo" class="form-control" value="" >
                                    </div>
                                </div>
                                  <a id="fechaExcelPrestamo" data-fechas="" class="btn btn-success exportexcel"> <i class="fa fa-file"></i> Exportar</a>
                            </form>
                      </div>
                    </div>
          </div>
      </div>
  </div>

  <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="clearfix"></div>
      <div class="x_panel">
          <div class="x_title">
            <div class="col-md-5 col-sm-5 col-xs-12">
              <h2>Reparación de Equipo Prestamos<small></small></h2>
             </div>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="tablereparacionequipoprestamo" class="table table-bordered table-hover dt-responsive">
              <thead>
                <tr>
                  <th>Dispositivo</th>
                  <th>Fecha Reporte</th>
                  <th>Cliente</th>
                  <th>Statu</th>
                  <th>Serial</th>
                  <th>Descripción</th>
                  <th>Dias</th>
                  <th>Acciónes</th>
                </tr>
              </thead>
            </table>
          </div>
      </div>
  </div>
</div>

<div id="demo-form2"></div>
