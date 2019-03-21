<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Consulta <small>Circulares</small> </h3>
  </div>

</div>
<div class="clearfix"></div>

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
            <select class="select2_single form-control" tabindex="-1" name="frmconsigpart[]" required="required" id="selecionasedecirculares">
              <option value=""></option>
              <?php
              $selectsede = new NovedadController();
              $selectsede -> selctSedes();
               ?>
            </select>
          </div>
        </div>
        <br>

        <div id="circularesresultados">

        </div>
      </form>
    </div>
  </div>
</div>
</div>
