<div class="page-title">
  <div class="title_left">
    <h3>Reporte <small>Instrucciónes</small> </h3>
  </div>

</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">

    <div class="col-md-12 col-xs-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear un Instrucción<small></small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form class="form-horizontal form-label-left" name="frminstruccion[]"  enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" required="required" id="selecionasede" name="frminstruccion[]">
                  <option value=""></option>
                  <?php
                  $selectsede = new NovedadController();
                  $selectsede -> selctSedes();
                   ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" placeholder="Titulo De La Instruccion" required="required" id="frminstrucciontitle" name="frminstruccion[]">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" placeholder="Breve Descripción De La Instruccion" required="required" id="frminstrucciondescrip" name="frminstruccion[]">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Archivo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" class="form-control" required="required" id="frminstruccionfile" name="fileinstruccion" accept="application/msword, application/pdf">
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="reset">Limpiar</button>
                <button type="submit" class="btn btn-success">Crear Instrucción</button>
              </div>
            </div>

          </form>
        </div>
      </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Crear un Instrucción <small>Manual</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-horizontal form-label-left" name="frminstruccionmanual[]" >

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" required="required" id="selecionasedes" name="frminstruccion[]">
                <option value=""></option>
                <?php
                $selectsede = new NovedadController();
                $selectsede -> selctSedes2();
                 ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Instrucción <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea required="required" name="frminstruccionmanual[]" class="form-control" rows="3" id="frminstruccionmanualdesp" placeholder="Descripción La Instruccion Manual"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha y Hora: <span class="required">*</span>
            </label>
            <div class='col-sm-4'>
                <div class="item form-group">
                    <div class='input-group date' id='myDatepicker4'>
                        <input type='text' class="form-control" readonly="readonly" name="frminstruccionmanual[]" id="frminstruccionmanualfecha" required="required"/>
                        <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
          </div>

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset">Limpiar</button>
              <button type="submit" class="btn btn-success">Crear Instruccion</button>
            </div>
          </div>

        </form>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Ver, Editar o Eliminiar Instruccinóes </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="row">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="frmconsigpart[]" required="required" id="selecionasedeinstruccion">
                  <option value=""></option>
                  <?php
                  $selectsede = new NovedadController();
                  $selectsede -> selctSedes();
                   ?>
                </select>
              </div>
            </div>
            <br>

            <div id="instruccionresultado">

            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Ver Instrucciones Manuales</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Fecha Novedad</th>
              <th>Nombre Sede</th>
              <th>Instrucción</th>
              <th>Reporta Instrucción</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $vistaUsuario = new InstruccionController();
            $vistaUsuario -> consultaInstruccion();
             ?>
          </tbody>
        </table>
      </div>
    </div>

    </div>
  </div>
</div>
