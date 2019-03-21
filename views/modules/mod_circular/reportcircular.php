<div class="page-title">
  <div class="title_left">
    <h3>Reporte <small>Circulares</small> </h3>
  </div>

</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">

    <div class="col-md-12 col-xs-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear un Circular<small></small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmcircular[]" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" required="required"id="selecionasede" name="frmcircular[]" >
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
                <input type="text" class="form-control" placeholder="Titulo De La Circular" required="required" id="frmcirculartitle" name="frmcircular[]">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" placeholder="Breve Descripción De La Circular" id="frmcirculardescrip" required="required"  name="frmcircular[]">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Archivo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" class="form-control" required="required" id="frmcircularfile" name="filecircular" accept="application/msword, application/pdf">
              </div>
            </div>

            <p style="text-align:center"><?php
            if(isset($_GET["msns"])){
              echo $_GET["msns"];
            }
             ?></p>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="reset">Limpiar</button>
                <button type="submit" class="btn btn-success">Crear Circular</button>
              </div>
            </div>

          </form>
        </div>
      </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Ver Circulares</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="row">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="frmconsigpart[]" required="required" id="selecionasedecircular">
                  <option value=""></option>
                  <?php
                  $selectsede = new NovedadController();
                  $selectsede -> selctSedes();
                   ?>
                </select>
              </div>
            </div>
            <br>

            <div id="circularresultado">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
