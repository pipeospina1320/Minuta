<?php

session_start();// activa la variable de sesion
if (!$_SESSION["validar"]) {
    header("location:Error403");
    exit();
}
$nombresession = $_SESSION["nombre"];
$apellidosession = $_SESSION["apellido"];
$rol = $_SESSION["cargo"];
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Consulta
                <small>Novedades</small>
            </h3>
        </div>
    </div>


    <div class="x_panel">
        <div class="x_title">
            <h2>Filtro</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="frmFiltroNovedad" data-parsley-validate="" name="frmFiltroNovedad[]"
                  class="form-horizontal form-label-left">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="textarea">Fecha
                        inicio:</label>
                    <div class='col-sm-2'>
                        <div class='input-group date' id='myDatepicker8'>
                            <input type='text' class="form-control" readonly="readonly" name="frmFiltroNovedad[]"
                                   id="frmFiltroNovedadFechaFin"/>
                            <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>

                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tipo de Novedad:</label>
                    <div class='col-sm-4 col-xs-12'>
                        <select class="select2_single form-control" tabindex="-1" name="frmFiltroNovedad[]"
                                id="frmnovedadtipo" required="required">
                            <option value=""></option>
                            <?php
                            $selectiponovedad = new NovedadController();
                            $selectiponovedad->selecTipoNovedad();
                            ?>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="textarea">Fecha fin:</label>
                    <div class='col-sm-2'>
                        <div class='input-group date' id='myDatepicker9'>
                            <input type='text' class="form-control" readonly="readonly" name="frmFiltroNovedad[]"
                                   id="frmFiltroNovedadFechaFin"/>
                            <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="textarea">Sede:</label>
                    <div class='col-sm-4 col-xs-12'>
                        <select class="select2_single form-control" tabindex="-1" name="frmFiltroNovedad[]"
                                id="frmnsede" required="required">
                            <option value=""></option>
                            <?php
                            $selectiponovedad = new NovedadController();
                            $selectiponovedad->selctSedes();
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">


                    <div class="col-md-12 col-sm-12 col-xs-12" align="right">
                        <?php if ($rol == 2 || $rol == 3 || $rol == 4 || $rol == 9) { ?>
                            <a target="_blank" href="Novedad-ResumenExcel"
                               class="btn btn-success"><i class="fa fa-file"></i>Resumen minuta Excel</a>

                            <a target="_blank" href="Novedad-ResumenActa"
                               class="btn btn-warning"><i class="fa fa-file"></i>Resumen minuta PDF</a>
                        <?php } ?>
                        <button type="button" id="btnFiltrar" class="btn btn-primary">Consultar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <!--    <div class="clearfix"></div>-->
    <div class="x_panel">
        <div class="x_title">
            <h2>Minuta virtual</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Fecha Novedad</th>
                    <th>Tipo Novedad</th>
                    <th>Novedad</th>
                    <th>Nombre Sede</th>
                    <th>Servicio</th>
                    <th>Turno</th>
                    <th>Reporta Novedad</th>
                    <th>Fecha Real N.</th>
                    <th>Evidencia</th>
                    <?php if ($rol == 2 || $rol == 3 || $rol == 4 || $rol == 9) { ?>
                        <th>Estado</th>
                    <?php } ?>
                    <th></th>
                </tr>
                </thead>
                <tbody id="contenido">
                <?php
                $vistaUsuario = new NovedadController();
                $vistaUsuario->consultaFiltroNovedad();
                ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel" style="text-align: center;">Foto De Evidencia</h3>
                </div>
                <div class="modal-body">
                    <div id="fotoevidenciamarco">

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="centrarbotonesfoto">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <!--    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">-->
    <!--        <div class="modal-dialog" role="document">-->
    <!--            <div class="modal-content">-->
    <!--                <div class="modal-header">-->
    <!--                    <h3 style="text-align: center" class="modal-title" id="exampleModalLabel">Observación</h3>-->
    <!--                </div>-->
    <!--                <div class="modal-body">-->
    <!--                    <form id="demo-form2" data-parsley-validate name="frmObservacion[]">-->
    <!--                        <textarea disabled id="verobservaciones1" class="form-control" rows="3"-->
    <!--                                  name="message"></textarea>-->
    <!--                        <br>-->
    <!--                        <label for="fullname">Persona Quién Hace La Observación : </label>-->
    <!--                        <input type="text" id="reportadopor3" class="form-control" name="fullname" disabled="disabled"/>-->
    <!---->
    <!---->
    <!--                </div>-->
    <!--                <div class="modal-footer">-->
    <!--                    <div class="centrarbotonesfoto">-->
    <!--                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                </form>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="text-align: center" class="modal-title" id="exampleModalLabel">Novedad</h3>
                </div>
                <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate name="frmObservacion[]">
                        <textarea disabled id="novedadreportada" class="form-control" rows="3"
                                  name="message"></textarea>

                        <label for="fullname">Reportado Por: </label>
                        <input type="text" id="reportadopor" class="form-control" name="fullname" disabled="disabled"/>
                        <br>

                        <input type="hidden" name="frmObservacion[]" value="" id="idnovedad">
                        <input type="hidden" name="frmObservacion[]" value="" id="fechaobser">
                        <div class="form-group">
                            <label for="message-text" class="control-label">Realizar Observación :</label>
                            <textarea class="form-control" id="observacionnovedades" required="required"
                                      name="frmObservacion[]" rows="3"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Hacer Observación</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="text-align: center" class="modal-title" id="exampleModalLabel">Observación</h3>
                </div>
                <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate name="frmObservacion[]">
                        <textarea disabled id="verobservaciones" class="form-control" rows="3"
                                  name="message"></textarea>
                        <br>
                        <label for="fullname">Persona Quién Hace La Observación : </label>
                        <input type="text" id="reportadopor2" class="form-control" name="fullname" disabled="disabled"/>

                </div>
                <div class="modal-footer">
                    <div class="centrarbotonesfoto">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


</div>
<!--<div id="demo-form2"></div>-->
