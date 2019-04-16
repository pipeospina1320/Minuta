$(document).ready(function () {

    $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $('#myDatepicker8').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#myDatepicker9').datetimepicker({
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $("#datetimepicker6").on("dp.change", function (e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function (e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });

    //Funcion para seleccionar sub sedes
    $("#selecionaclientes").change(function () {
        $("#selecionaclientes option:selected").each(function () {
            id_cliente = $(this).val();
            $.post("index.php?c=novedad&a=searchCliente", {dato: id_cliente}, function (dato) {
                $("#selecionasede").html(dato);

            });
        });
    });

//Funcion para seleccionar consignas Genetales
    $("#selecionasedeconsgp").change(function () {
        $("#selecionasedeconsgp option:selected").each(function () {
            id_sede = $(this).val();

            $.post("index.php?c=consigna&a=consultArchivoParti", {dato: id_sede}, function (dato) {
                $("#resultado").html(dato);
            });
        });
    });
    $("#selecionasedeconsgp").change();

    //Funcion para seleccionar consignas Particulares
    $("#selecionasedeconsgpmodconsulta").change(function () {
        $("#selecionasedeconsgpmodconsulta option:selected").each(function () {
            id_sede = $(this).val();

            $.post("index.php?c=consigna&a=consultArchivoPartiModConsulta", {dato: id_sede}, function (dato) {
                $("#resultados").html(dato);
            });
        });
    });
    $("#selecionasedeconsgpmodconsulta").change();

//Funcion para seleccionar protocolos
    $("#selecionasedeprotocolo option:selected").each(function () {
        protocolo = $(this).val();
        $.post("index.php?c=protocolo&a=consultArchivoProtocolo", {dato: protocolo}, function (dato) {
            $("#protocoloresultado").html(dato);
        });
        $("#selecionasedeprotocolo ").change(function () {
            protocolo = $(this).val();
            $.post("index.php?c=protocolo&a=consultArchivoProtocolo", {dato: protocolo}, function (dato) {
                $("#protocoloresultado").html(dato);
            });
        });
    });

//Funcion para seleccionar protocolos consulta
    $("#selecionasedeprotocolos option:selected").each(function () {
        protocolo = $(this).val();
        $.post("index.php?c=protocolo&a=consultArchivoProtocolos", {dato: protocolo}, function (dato) {
            $("#protocolosresultados").html(dato);
        });
        $("#selecionasedeprotocolos").change(function () {
            protocolo = $(this).val();
            $.post("index.php?c=protocolo&a=consultArchivoProtocolos", {dato: protocolo}, function (dato) {
                $("#protocolosresultados").html(dato);
            });
        });
    });


//Funcion para seleccionar circular reporte
    $("#selecionasedecircular").change(function () {
        $("#selecionasedecircular option:selected").each(function () {
            id_sede = $(this).val();

            $.post("index.php?c=circular&a=consultArchivoCircular", {dato: id_sede}, function (dato) {
                $("#circularresultado").html(dato);
            });
        });
    });
    $("#selecionasedecircular").change();

//Funcion para seleccionar circular consulta
    $("#selecionasedecirculares").change(function () {
        $("#selecionasedecirculares option:selected").each(function () {
            id_sede = $(this).val();

            $.post("index.php?c=circular&a=consultArchivoCirculares", {dato: id_sede}, function (dato) {
                $("#circularesresultados").html(dato);
            });
        });
    });
    $("#selecionasedecirculares").change();

    //Funcion para seleccionar instrucciones reporte
    $("#selecionasedeinstruccion").change(function () {
        $("#selecionasedeinstruccion option:selected").each(function () {
            id_sede = $(this).val();

            $.post("index.php?c=instruccion&a=consultArchivoInstruccion", {dato: id_sede}, function (dato) {
                $("#instruccionresultado").html(dato);
            });
        });
    });

    //Funcion para seleccionar circular consulta
    $("#selecionasedeinstrucciones").change(function () {
        $("#selecionasedeinstrucciones option:selected").each(function () {
            id_sede = $(this).val();

            $.post("index.php?c=instruccion&a=consultArchivoInstrucciones", {dato: id_sede}, function (dato) {
                $("#instruccionesresultados").html(dato);
            });
        });
    });

    //Funcion para buscar nit de la empresa con elemento select
    $("#selecioncliente").change(function () {
        $("#selecioncliente option:selected").each(function () {
            id_cliente = $(this).val();
            $.post("index.php?c=reparacionequipo&a=searchNit", {dato: id_cliente}, function (data) {
                var nit = $.trim(data);
                $("#nitcliente").val(nit);
            });
        });
    });

    $("#nitcliente").keydown(function (event) {
        if (event.keyCode == "32") {
            nits = $("#nitcliente").val();
            $.post("index.php?c=reparacionequipo&a=searchCliente", {dato: nits}, function (data) {
                var constrepara = $.trim(data);
                dataitem = constrepara.split("/");
                $('#selecioncliente').append('<option value="' + dataitem[0] + '" selected="selected">' + dataitem[1] + '</option>');
                $("#nitcliente").val(dataitem[2] + dataitem[3] + dataitem[4]);

            });
        }
    });

    var hoy = new Date();
    var fechatotal = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate()
    var horatotal = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
    var fechayhora = fechatotal + ' ' + horatotal;
    $("#fechanovedadreal").val(fechayhora);
    $("#fechareporte").val(fechatotal);
    $("#fechaejecucion").val(fechatotal);
    $("#horaentrada").val(horatotal);
    $("#horasalida").val(horatotal);
    $("#fechadotacion").val(fechayhora);
    $("#fechavisita").val(fechayhora);
    $("#fechaobser").val(fechayhora);

    $("#selecionclienteser").change(function () {
        $("#selecionclienteser option:selected").each(function () {
            id_cliente = $(this).val();
            $.post("index.php?c=servicio&a=searchDataClient", {dato: id_cliente}, function (data) {
                var consta = $.trim(data);
                datos = consta.split("/");
                $("#nitclienteser").val(datos[0]);
                $("#direccionclienteser").val(datos[1]);
                $("#telefonoclienteser").val(datos[2]);
                $("#abonadoser").val(datos[3]);
            });
        });
    });

    $("#nitclienteser").keydown(function (event) {
        if (event.keyCode == "32") {
            nitser = $("#nitclienteser").val();
            $.post("index.php?c=servicio&a=searchClienteSer", {dato: nitser}, function (data) {
                var constval = $.trim(data);
                datoval = constval.split("/");
                $('#selecionclienteser').append('<option value="' + datoval[0] + '" selected="selected">' + datoval[1] + '</option>');
                $("#nitclienteser").val(datoval[5] + datoval[6] + datoval[7]);
                $("#direccionclienteser").val(datoval[2]);
                $("#telefonoclienteser").val(datoval[3]);
                $("#abonadoser").val(datoval[4]);
            });
        }
    });

    //Funcion para seleccionar aspecto
    $("#frmdotacionestdo option:selected").each(function () {
        aspecto = $(this).val();
        if (aspecto != 3) {
            $("#dotacionmalo").hide();
        } else {
            $("#dotacionmalo").show();
        }
        $("#frmdotacionestdo ").change(function () {
            aspecto = $(this).val();
            if (aspecto != 3) {
                $("#dotacionmalo").hide();
            } else {
                $("#dotacionmalo").show();
            }
        });
    });

    $("#frmnovedadnovedad").css({"text-transform": "uppercase"});

    $("#frmdotacionserie").css({"text-transform": "uppercase"});
    $("#frmdotacionobservacion").css({"text-transform": "uppercase"});

    $("#modelorequipo").css({"text-transform": "uppercase"});
    $("#serialrequipo").css({"text-transform": "uppercase"});
    $("#fallarequipo").css({"text-transform": "uppercase"});
    $("#dianosticorequipo").css({"text-transform": "uppercase"});
    $("#observacionrequipo").css({"text-transform": "uppercase"});
    $("#puestorequipo").css({"text-transform": "uppercase"});

    $("#editpuestorequipo").css({"text-transform": "uppercase"});
    $("#editmarcarequipo").css({"text-transform": "uppercase"});
    $("#editmodelorequipo").css({"text-transform": "uppercase"});
    $("#editfallarequipo").css({"text-transform": "uppercase"});
    $("#editdianosticorequipo").css({"text-transform": "uppercase"});
    $("#editobservacionrequipo").css({"text-transform": "uppercase"});

    $("#frmregisteruser1").css({"text-transform": "uppercase"});
    $("#frmregisteruser2").css({"text-transform": "uppercase"});
    $("#frmregisterlast1").css({"text-transform": "uppercase"});
    $("#frmregisterlast2").css({"text-transform": "uppercase"});

    $("#frmvisitantenombre").css({"text-transform": "uppercase"});
    $("#frmvisitanteapellido").css({"text-transform": "uppercase"});
    $("#frmvisitantedescrp").css({"text-transform": "uppercase"});
    $("#frmvisitanteempresa").css({"text-transform": "uppercase"});

    $("#puestorequipomarca").css({"text-transform": "uppercase"});
    $("#puestorequipomodelo").css({"text-transform": "uppercase"});
    $("#puestorequiposerial").css({"text-transform": "uppercase"});
    $("#puestorequipomarcatop").css({"text-transform": "uppercase"});
    $("#equipolaptopmodelo").css({"text-transform": "uppercase"});
    $("#equipolaptopserial").css({"text-transform": "uppercase"});
    $("#equipolaptopasignado").css({"text-transform": "uppercase"});
    $("#equipolaptopcargo").css({"text-transform": "uppercase"});
    $("#equipolaptopcaracteristicas").css({"text-transform": "uppercase"});
    $("#equipolaptopobsercaciones").css({"text-transform": "uppercase"});
    $("#puestorequipomodelopc").css({"text-transform": "uppercase"});
    $("#puestorequiposerialpc").css({"text-transform": "uppercase"});
    $("#puestorequiponombre").css({"text-transform": "uppercase"});
    $("#puestorequipocargo").css({"text-transform": "uppercase"});
    $("#equipoobservacion").css({"text-transform": "uppercase"});

    $("#frmactanombreyapellido").css({"text-transform": "uppercase"});
    $("#frmactacedula").css({"text-transform": "uppercase"});
    $("#frmactacargo").css({"text-transform": "uppercase"});
    $("#observacionnovedades").css({"text-transform": "uppercase"});


    //Funcion para traer datos del visitante
    $("#cedulavisitante").keydown(function (event) {
        if (event.keyCode == "9") {
            valuecedula = $("#cedulavisitante").val();
            $.post("index.php?c=visitante&a=consultVisitante", {dato: valuecedula}, function (data) {
                // console.log(data);
                var datovisi = $.trim(data);
                if (datovisi != "") {
                    var datovalue = datovisi.split("|");
                    $("#frmvisitantenombre").val(datovalue[0]);
                    $("#frmvisitanteapellido").val(datovalue[1]);
                    $('#selecionaarea').append('<option value="' + datovalue[2] + '" selected="selected">' + datovalue[3] + '</option>');
                    $('#selecionaresponsable').append('<option value="' + datovalue[4] + '" selected="selected">' + datovalue[5] + '</option>');
                    $("#frmvisitantedescrp").val(datovalue[6]);
                    $("#frmvisitanteempresa").val(datovalue[7]);
                    $("#foto").attr("src", datovalue[8]);
                } else if (datovisi == "") {
                    $("#frmvisitantenombre").val("");
                    $("#frmvisitanteapellido").val("");
                    $('#selecionaarea').append('<option value="" selected="selected"></option>');
                    $('#selecionaresponsable').append('<option value="" selected="selected"></option>');
                    $("#frmvisitantedescrp").val("");
                    $("#frmvisitanteempresa").val("");
                    $("#foto").attr("src", "views/assets/images/user_250x187.png");
                }
            });
        }
    });

    //Funcion para seleccionar dependiendo del area el responsable
    $("#selecionaarea option:selected").each(function () {
        valuearea = $(this).val();
        $.post("index.php?c=visitante&a=searchAreaResponsable", {dato: valuearea}, function (dato) {
            $("#selecionaresponsable").html(dato);
        });
        $("#selecionaarea ").change(function () {
            valuearea = $(this).val();
            $.post("index.php?c=visitante&a=searchAreaResponsable", {dato: valuearea}, function (dato) {
                $("#selecionaresponsable").html(dato);
            });
        });
    });


    $("#dispositivoequipo option:selected").each(function () {
        dispositivo = $(this).val();
        if (dispositivo == 1) {
            $("#equipocelular").show();
            $("#equipolaptop").hide();
            $("#equipopc").hide();
            $("#dispositivocelular").val(dispositivo);
        } else if (dispositivo == 2) {
            $("#equipocelular").hide();
            $("#equipolaptop").show();
            $("#equipopc").hide();
            $("#dispositivolatop").val(dispositivo);
        } else if (dispositivo == 3) {
            $("#equipocelular").hide();
            $("#equipolaptop").hide();
            $("#equipopc").show();
            $("#dispositivolapc").val(dispositivo);
        }
        $("#dispositivoequipo ").change(function () {
            dispositivo = $(this).val();
            if (dispositivo == 1) {
                $("#equipocelular").show();
                $("#equipolaptop").hide();
                $("#equipopc").hide();
                $("#dispositivocelular").val(dispositivo);
            } else if (dispositivo == 2) {
                $("#equipocelular").hide();
                $("#equipolaptop").show();
                $("#equipopc").hide();
                $("#dispositivolatop").val(dispositivo);
            } else if (dispositivo == 3) {
                $("#equipocelular").hide();
                $("#equipolaptop").hide();
                $("#equipopc").show();
                $("#dispositivolapc").val(dispositivo);
            }
        });
    });

    $(document).on("click", "#FotoEvidencia", function () {
        foto = $(this).val();
        if (foto > 0) {
            $.post("index.php?c=novedad&a=buscarFotoEvidencia", {dato: foto}, function (data) {
                $("#myModals").modal();
                $("#fotoevidenciamarco").html(data);
                console.log(data);
            });
        }
    });

    $(document).on("click", "#observacionnovedad", function () {
        idnovedad = $(this).val();
        $.post("index.php?c=novedad&a=searchNovedad", {dato: idnovedad}, function (data) {
            var constval = $.trim(data);
            datoval = constval.split("|");
            $("#novedadreportada").val(datoval[0]);
            $("#reportadopor").val(datoval[1]);
            $("#idnovedad").val(datoval[2]);
            $("#exampleModal").modal();
        });
    });

    $(document).on("click", "#verobservacion", function () {
        idnovedad = $(this).val();
        $.post("index.php?c=novedad&a=searchObservacion", {dato: idnovedad}, function (data) {
            var constval = $.trim(data);
            datoval = constval.split("|");
            $("#verobservaciones").val(datoval[0]);
            $("#reportadopor2").val(datoval[1]);
            $("#exampleModal2").modal();
        });
    });

    $(document).on("click", "#observacionnovedades", function () {
        idnovedad = $(this).val();
        $.post("index.php?c=novedad&a=searchObservacion", {dato: idnovedad}, function (data) {
            var constval = $.trim(data);
            datoval = constval.split("|");
            $("#verobservaciones1").val(datoval[0]);
            $("#reportadopor3").val(datoval[1]);
            $("#exampleModal3").modal();
        });
    });


    $("#btnFiltrar").click(function (e) {
        e.preventDefault();
        $("#contenido").html("<tr>Buscando...</tr>");
        $.ajax({
            type: "POST",
            url: "index.php?c=novedad&a=consultaFiltroNovedad",
            data: $("#frmFiltroNovedad").serialize(),
            success: function (data) {
                $('#contenido').html(data);
            }
        });
    });
});


// 1. copiar y pegar en la vista despues de ingresar jquery Nota: Estudiar Jquery $.post
//
//       $("document").ready(function(){
//         $("#btnSearch").click(function(){
//           var datoingresado = $("#data").val();
//
//
//           $.post("index.php?c=home&a=search",{dato: datoingresado}, function(data){
//               $("#resultado").html(data);
//           });
//         });
//       });
//
//
// 2. Copiar y pegar en el controlador
//
//   public function search(){
//
//     $resultSearch = $this->model->readEvents($_POST["dato"]);
//     print_r($resultSearch);
//
// }


