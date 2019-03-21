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
            <h2>Consigna <small>Particular</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmeditarconsiparti[]" enctype="multipart/form-data">
              <?php
              $formeditarconsigna = new ConsignaController();
              $formeditarconsigna -> editarConsgPart();
               ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
