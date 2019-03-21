<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Reporte <small>Equipos</small> </h3>
    </div>

  </div>
  <div class="clearfix"></div>

<div class="x_panel">
  <div class="x_title">
    <h2 class="titlereporteservicio">Equipo</h2>
    <ul class="nav navbar-right panel_toolbox">
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="form-horizontal form-label-left">
    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Dispositivo: <span class="required">*</span></label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="select2_single form-control" tabindex="-1"  id="dispositivoequipo">
          <?php
          $selectdispositivo = new EquipoController();
          $selectdispositivo -> selecDispositivo();
           ?>
        </select>
      </div>
    </div>
  </div>
    <div id="equipocelular">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmcreateEquipo[]">

          <input type="hidden" name="frmcreateEquipo[]" value="" id="dispositivocelular">

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="frmcreateEquipo[]" required="required" id="puestorequipomarca">
                    <option value=""></option>
                  <?php
                  $selectmarca = new EquipoController();
                  $selectmarca -> selecMarca();
                   ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Modelo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateEquipo[]" class="form-control" required="required" id="puestorequipomodelo">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateEquipo[]" class="form-control" required="required" id="puestorequiposerial">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">IMEI 1: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateEquipo[]" class="form-control" required="required" id="puestorequipoimei">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">IMEI 2: <span class="required"></span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateEquipo[]" class="form-control" id="puestorequipoimei2">
              </div>
            </div>

            <div class="item form-group" >
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado: <span class="required">*</span></label>
              <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_content">
                  <div class="radio" >
                    <label>
                      <input type="radio" name="frmcreateEquipo[]" class="flat" value="1" required="required" checked> NUEVO
                    </label>
                    <label>
                      <input type="radio" name="frmcreateEquipo[]" class="flat" value="2"> USADO
                    </label>
                </div>
              </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero SimCard: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateEquipo[]" class="form-control" required="required" id="puestorequiposemcard">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del Empleado: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateEquipo[]" class="form-control" required="required" id="puestorequiponombre">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo o Puesto: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="frmcreateEquipo[]" class="form-control" required="required" id="puestorequipocargo">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones: <span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="frmcreateEquipo[]" class="form-control" rows="3" id="equipoobservacion"></textarea>
              </div>
            </div>


          <input type="hidden" name="frmcreateEquipo[]" value="" id="fechaequipo">

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="reset" class="btn btn-primary">Restaurar</button>
              <button type="submit" class="btn btn-success">Enviar</button>
            </div>
          </div>

        </form>
    </div>

    <div id="equipolaptop">
      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmcreateEquipoLaptop[]">

        <input type="hidden" name="frmcreateEquipoLaptop[]" value="" id="dispositivolatop">


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" name="frmcreateEquipoLaptop[]" required="required" id="equipolaptopmarca">
                  <option value=""></option>
                <?php
                $selectmarca = new EquipoController();
                $selectmarca -> selecMarca();
                 ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Modelo: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="frmcreateEquipoLaptop[]" class="form-control" required="required" id="equipolaptopmodelo">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="frmcreateEquipoLaptop[]" class="form-control" required="required" id="equipolaptopserial">
            </div>
          </div>

          <div class="item form-group" >
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado: <span class="required">*</span></label>
            <div class="col-md-8 col-sm-6 col-xs-12">
              <div class="x_content">
                <div class="radio" >
                  <label>
                    <input type="radio" name="frmcreateEquipoLaptop[]" class="flat" value="1" required="required" checked> NUEVO
                  </label>
                  <label>
                    <input type="radio" name="frmcreateEquipoLaptop[]" class="flat" value="2"> USADO
                  </label>
              </div>
            </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del Empleado: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="frmcreateEquipoLaptop[]" class="form-control" required="required" id="equipolaptopasignado">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo o Puesto: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="frmcreateEquipoLaptop[]" class="form-control" required="required" id="equipolaptopcargo">
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Caracteristicas: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="frmcreateEquipoLaptop[]" class="form-control" required="required" rows="3" id="equipolaptopcaracteristicas"></textarea>
            </div>
          </div>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones: <span class="required"></span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea name="frmcreateEquipoLaptop[]" class="form-control" rows="3" id="equipolaptopobsercaciones"></textarea>
            </div>
          </div>


        <input type="hidden" name="frmcreateEquipoLaptop[]" value="" id="fechaequipotop">

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="reset" class="btn btn-primary">Restaurar</button>
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
        </div>

      </form>
    </div>

    <div id="equipopc">
      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmcreateEquipoPc[]">

        <input type="hidden" name="frmcreateEquipoPc[]" value="" id="dispositivolapc">


          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" name="frmcreateEquipoPc[]" required="required" id="puestorequipomarcapc">
                  <option value=""></option>
                <?php
                $selectmarca = new EquipoController();
                $selectmarca -> selecMarca();
                 ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Modelo: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="frmcreateEquipoPc[]" class="form-control" required="required" id="puestorequipomodelopc">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial: <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="frmcreateEquipoPc[]" class="form-control" required="required" id="puestorequiposerialpc">
            </div>
          </div>

          <div class="item form-group" >
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado: <span class="required">*</span></label>
            <div class="col-md-8 col-sm-6 col-xs-12">
              <div class="x_content">
                <div class="radio" >
                  <label>
                    <input type="radio" name="frmcreateEquipoPc[]" class="flat" value="1" required="required" checked> NUEVO
                  </label>
                  <label>
                    <input type="radio" name="frmcreateEquipoPc[]" class="flat" value="2"> USADO
                  </label>
              </div>
            </div>
            </div>
          </div>

        <input type="hidden" name="frmcreateEquipoPc[]" value="" id="fechaequipopc">

        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="reset" class="btn btn-primary">Restaurar</button>
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

</div>
