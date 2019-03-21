<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Consignas</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Crear Cosigna General <small>Nuevo una nueva consigna general</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" name="frmconsigene[]" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo: <span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="Titulo de la Consigna" required="required" id="frmconsigenetitle" name="frmconsigene[]">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción: <span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="text" class="form-control" placeholder="Breve Descripción De la Consigna" required="required" id="frmconsigenedesp" name="frmconsigene[]">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Archivo: <span class="required">*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" class="form-control" placeholder="Descripción De la Consigna" required="required" name="fileconsigna" id="frmconsigenefile" accept="application/msword, application/pdf">
              </div>
            </div>

            <br>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                <input type="reset" class="btn btn-primary"  value="Limpiar">
                <input type="submit" class="btn btn-success" value="Crear Cosigna">
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>


      <div class="col-md-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Crear Consigna Particular <small>Nueva Sede despues de haber creado cliente</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" name="frmconsipart[]" enctype="multipart/form-data">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sede: <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="select2_single form-control" tabindex="-1" required="required" id="selecionasede" name="frmconsipart[]">
                    <option value=""></option>
                    <?php
                    $selectsede = new NovedadController();
                    $selectsede -> selctSedes();
                     ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Puesto: <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Puesto de la Consigna" required="required" id="frmconsiparttitle" name="frmconsipart[]">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción: <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Breve Descripción De la Consigna" required="required" id="frmconsipartdescrip" name="frmconsipart[]">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Archivo: <span class="required">*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="file" class="form-control" placeholder="Descripción De la Consigna" required="required" id="frmconsipartfile" name="fileconsignas" accept="application/msword, application/pdf">
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="reset">Limpiar</button>
                  <button type="submit" class="btn btn-success">Crear Cosigna</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>

      <div class="x_panel">
        <div class="x_title">
          <h2>Consignas Generales</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">

            <?php
            $consignasgeneral = new ConsignaController;
            $consignasgeneral -> consultArchivos();
             ?>

          </div>
        </div>
      </div>



<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


      <div class="x_panel">
        <div class="x_title">
          <h2>Consignas Particulares <small>Del Cliente</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="select2_single form-control" tabindex="-1" name="frmconsigpart[]" required="required" id="selecionasedeconsgp">
              <option value=""></option>
              <?php
              $selectsede = new NovedadController();
              $selectsede -> selctSedes();
               ?>
            </select>
          </div>
        </div>
  </form>
        <br>
        <br>
        <div id="resultado"></div>

        </div>
      </div>
    </div>
</div>
</div>


<div id="demo-form2"></div>
