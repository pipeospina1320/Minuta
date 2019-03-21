<div class="page-title">
  <div class="title_left">
    <h3>Reporte <small>Protocolos</small> </h3>
  </div>

</div>
<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12">

    <div class="col-md-12 col-xs-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Crear un protocolo<small></small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" class="form-horizontal form-label-left" name="frmprotocolo[]" enctype="multipart/form-data" >

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria Protocolo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" required="required" id="selecionacateproto" name="frmprotocolo[]">
                  <option value=""></option>
                  <option value="A">Protocolo A</option>
                  <option value="B">Protocolo B</option>
                  <option value="C">Protocolo C</option>
                  <option value="D">Protocolo D</option>
                  <option value="E">Protocolo E</option>
                  <option value="F">Protocolo F</option>
                  <option value="G">Protocolo G</option>
                  <option value="H">Protocolo H</option>
                  <option value="I">Protocolo I</option>
                  <option value="J">Protocolo J</option>
                  <option value="K">Protocolo K</option>
                  <option value="L">Protocolo L</option>
                  <option value="M">Protocolo M</option>
                  <option value="N">Protocolo N</option>
                  <option value="Ñ">Protocolo Ñ</option>
                  <option value="O">Protocolo O</option>
                  <option value="P">Protocolo P</option>
                  <option value="Q">Protocolo Q</option>
                  <option value="R">Protocolo R</option>
                  <option value="S">Protocolo S</option>
                  <option value="T">Protocolo T</option>
                  <option value="U">Protocolo U</option>
                  <option value="V">Protocolo V</option>
                  <option value="W">Protocolo W</option>
                  <option value="X">Protocolo X</option>
                  <option value="A-Z">Protocolo A-Z</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" placeholder="Breve Descripción Del Protocolo" id="frmprotocolodescrip" required="required" name="frmprotocolo[]">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Archivo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" class="form-control" required="required" id="frmprotocolofile" name="fileprotocolo" accept="application/msword, application/pdf">
              </div>
            </div>

             <div id="resuldatos_protocolo"></div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="reset" class="btn btn-primary" value="Limpiar">
                <input type="submit" class="btn btn-success" value="Enviar">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div class="x_panel">
      <div class="x_title">
        <h2>Ver Protocolos</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="row">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione Protocolo: <span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="frmconsigpart[]" required="required" id="selecionasedeprotocolo">
                  <option value="A-Z">Todos</option>
                  <option value="A">Protocolo A</option>
                  <option value="B">Protocolo B</option>
                  <option value="C">Protocolo C</option>
                  <option value="D">Protocolo D</option>
                  <option value="E">Protocolo E</option>
                  <option value="F">Protocolo F</option>
                  <option value="G">Protocolo G</option>
                  <option value="H">Protocolo H</option>
                  <option value="I">Protocolo I</option>
                  <option value="J">Protocolo J</option>
                  <option value="K">Protocolo K</option>
                  <option value="L">Protocolo L</option>
                  <option value="M">Protocolo M</option>
                  <option value="N">Protocolo N</option>
                  <option value="Ñ">Protocolo Ñ</option>
                  <option value="O">Protocolo O</option>
                  <option value="P">Protocolo P</option>
                  <option value="Q">Protocolo Q</option>
                  <option value="R">Protocolo R</option>
                  <option value="S">Protocolo S</option>
                  <option value="T">Protocolo T</option>
                  <option value="U">Protocolo U</option>
                  <option value="V">Protocolo V</option>
                  <option value="W">Protocolo W</option>
                  <option value="X">Protocolo X</option>
                </select>
              </div>
            </div>
            <br>

            <div id="protocoloresultado">

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

</div>
