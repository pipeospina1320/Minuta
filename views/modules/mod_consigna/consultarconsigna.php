<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Consulta <small>Consignas</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12">

      <div class="x_panel">
        <div class="x_title">
          <h2>Consignas Generales</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">

            <?php
            $consignasgeneral = new ConsignaController;
            $consignasgeneral -> consultArchivosModConsulta();
             ?>

          </div>
        </div>
      </div>
    </div>
  </div>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


      <div class="x_panel">
        <div class="x_title">
          <h2>Consignas Particulares<small>Del Cliente</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

        <div class="row">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Sede: <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="select2_single form-control" tabindex="-1" name="frmconsigpart[]" required="required" id="selecionasedeconsgpmodconsulta">
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
        <div id="resultados"></div>
        </div>
        </div>
      </div>
</div>
