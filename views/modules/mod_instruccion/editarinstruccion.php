<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Editar <small></small> </h3>
    </div>

  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Instruccion <small>Por sedes</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmeditarinstruccion[]" action="?c=instruccion&a=updateinstruccion" method="post" enctype="multipart/form-data">
              <?php
              $formeditarconsigna = new InstruccionController();
              $formeditarconsigna -> editarInstruccion();
               ?>
            <p style="text-align:center"><?php
            if(isset($_GET["msn"])){
              echo $_GET["msn"];
            }
             ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
