<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Configuración <small>Clientes Sedes</small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>
  <div class="row">
      <div class="col-md-12">
<div class="col-md-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Crear Cliente <small>Nuevo Cliente Para el Sistema</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form class="form-horizontal form-label-left" name="frmcliente[]">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nit: <span class="required">*</span></label>
        <div class="col-md-6 col-sm-5 col-xs-8">
          <input type="number" class="form-control" placeholder="Nit de Empresa" name="frmcliente[]" max="999999999">
        </div>
        <label class="control-label col-md-1 col-sm-1 col-xs-1">-</label>
        <div class="col-md-2 col-sm-3 col-xs-3">
          <input type="number" class="form-control" placeholder="" name="frmcliente[]" max="99">
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente: <span class="required">*</span></label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" class="form-control" placeholder="Nombre Del nuevo cliente" required="required" id="frmclientenombre" name="frmcliente[]">
          <span class="fa fa-building-o form-control-feedback right" aria-hidden="true"></span>
        </div>
      </div>
      <p style="text-align:center"><?php
      if(isset($_GET["msn"])){
        echo $_GET["msn"];
      }
       ?></p>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <button class="btn btn-primary" type="reset">Limpiar</button>
          <button type="submit" class="btn btn-success">Crear Cliente</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="col-md-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Crear Sede<small>Nueva Sede despues de haber creado cliente</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form class="form-horizontal form-label-left" name="frmsede[]" action="?c=home&a=createSed" method="post">
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente: <span class="required">*</span></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <select class="select2_single form-control" tabindex="-1" required="required" id="selecionaclientes" name="frmsede[]">
              <option value=""></option>
              <?php
              $selectcliente = new NovedadController();
              $selectcliente -> selectClient();
               ?>
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Sede: <span class="required">*</span></label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" class="form-control" placeholder="Nombre De la Nueva Sede" required="required" id="frmsedesede" name="frmsede[]">
            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
          </div>
        </div>
        <p style="text-align:center"><?php
        if(isset($_GET["msns"])){
          echo $_GET["msns"];
        }
         ?></p>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="reset">Limpiar</button>
            <button type="submit" class="btn btn-success">Crear Sede</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>

<div id="demo-form2"></div>
