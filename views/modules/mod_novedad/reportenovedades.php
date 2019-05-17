<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Reporte
                <small>Novedades</small>
            </h3>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="x_panel">
        <div class="x_title">
            <h2>Minuta virtual</h2>
            <ul class="nav navbar-right panel_toolbox">
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmnovedad[]"
                  enctype="multipart/form-data">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre De La Sede: <span
                                class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" tabindex="-1" name="frmnovedad[]" id="selecionasede"
                                required="required">
                            <option value=""></option>
                            <?php
                            $selectsede = new NovedadController();
                            $selectsede->selctSedes();
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Servicio:<span
                                class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" tabindex="-1" name="frmnovedad[]"
                                id="frmnovedadservicio" required="required">
                            <option value=""></option>
                            <?php
                            $selectservi = new NovedadController();
                            $selectservi->selectServicio();
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Turno: <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="frmnovedad[]" id="frmnovedadturno" required="required">
                            <option>DIURNO</option>
                            <option>NOCTURNO</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Novedad:<span
                                class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" tabindex="-1" name="frmnovedad[]"
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Novedad <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea required="required" name="frmnovedad[]" id="frmnovedadnovedad" class="form-control"
                                  rows="3" placeholder="DESCRIPCIÓN DE LA NOVEDAD"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Fecha y Hora: <span
                                class="required">*</span>
                    </label>
                    <div class='col-sm-4'>
                        <div class='input-group date' id='myDatepicker4'>
                            <input type='text' class="form-control" readonly="readonly" name="frmnovedad[]"
                                   id="frmnovedadfecha" required="required"/>
                            <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="frmnovedad[]" id="fechanovedadreal">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Adjuntar Foto: </label>
                    <div class="col-md-4 col-sm-6 col-xs-12" id="adjuntos">
                        <input type="file" class="form-control" id="frmnovedadfile[]" name="filenovedad[]"
                               accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="button" onclick="addCampo()" class="btn btn-default" value="Subir otro archivo">
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagenFirma">Firma reporta:</label>
                    <canvas class="col-md-6 col-sm-8 col-xs-12" id="canvas" width="350%" height="100%"
                            onclick="canvas(this.id,'imagen1')"
                            style="border:solid black 1px;">
                        <input type='hidden' name="filenovedadFirma[]" id='imagen1'/>
                    </canvas>
                    <input type="button" class="btn btn-default" onclick="limpiarFirma('canvas')"
                           value="limpiar firma">
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagenFirma">Firma responsable:</label>
                    <canvas class="col-md-6 col-sm-8 col-xs-12" id="canvas1" width="350%" height="100%"
                            onclick="canvas(this.id,'imagen2')"
                            style="border:solid black 1px;">
                        <input type='hidden' name="filenovedadFirma[]" id='imagen2'/>
                    </canvas>
                    <input type="button" class="btn btn-default" onclick="limpiarFirma('canvas1')"
                           value="limpiar firma">
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input class="btn btn-primary" type="reset" value="Restaurar">
                        <input type="submit" class="btn btn-success" value="Enviar">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    addCampo = function () {
        nCampo = document.createElement('input');
        nCampo.setAttribute('class', 'form-control');
        nCampo.type = 'file';
        nCampo.accept = ".png, .jpg, .jpeg"
        nCampo.name = 'filenovedad[]';
        nCampo.id = 'frmnovedadfile[]';
        container = document.getElementById('adjuntos');
        container.appendChild(nCampo);
    };
</script>
<script>
    function canvas(idCanvas, imagen) {
        var canvas = document.getElementById(idCanvas);
        var ctx = canvas.getContext("2d");
        // let cw = canvas.width = 600;
        // let ch = canvas.height = 200;


        function oMousePosScaleCSS(canvas, evt) {
            let ClientRect = canvas.getBoundingClientRect(),
                scaleX = canvas.width / ClientRect.width,
                scaleY = canvas.height / ClientRect.height;
            return {
                x: (evt.clientX - ClientRect.left) * scaleX,
                y: (evt.clientY - ClientRect.top) * scaleY
            }
        }

        let last = {};

        canvas.addEventListener("mousedown", (e) => {
            m = oMousePosScaleCSS(canvas, e);
            // ctx.clearRect(0, 0, cw, ch);
            last.x = m.x;
            last.y = m.y;

        });

        canvas.addEventListener("mouseup", (e) => {
            last = {};
            var imagenCanvas = document.getElementById(imagen);
            imagenCanvas.value = document.getElementById(idCanvas).toDataURL(`${imagen}/png`);
            // imagen1.value = document.getElementById(idCanvas).toDatURL('image1/png');
        });

        canvas.addEventListener("mousemove", (e) => {
            if (last.x) {
                m = oMousePosScaleCSS(canvas, e);
                ctx.beginPath();
                ctx.moveTo(last.x, last.y);
                ctx.lineTo(m.x, m.y);
                ctx.stroke();
                last.x = m.x;
                last.y = m.y;
            }
        });

        // Set up touch events for mobile, etc
        canvas.addEventListener("touchstart", function (e) {
            e.preventDefault();
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);

        canvas.addEventListener("touchend", function (e) {
            e.preventDefault();
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);

        canvas.addEventListener("touchmove", function (e) {
            e.preventDefault();
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);

        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }
    }

    function limpiarFirma(idCanvasLimpiar) {
        var canvas = document.getElementById(idCanvasLimpiar);
        var ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

</script>