//v2.0
function decimalAdjust(type, value, exp) {
    // Si el exp es indefinido o cero...
    if (typeof exp === 'undefined' || +exp === 0) {
        return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Si el valor no es un número o el exp no es un entero...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
        return NaN;
    }
    // Cambio
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Volver a cambiar
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
}

// Redondeo decimal
if (!Math.round10) {
    Math.round10 = function (value, exp) {
        return decimalAdjust('round', value, exp);
    };
}
// Redondeo hacia abajo
if (!Math.floor10) {
    Math.floor10 = function (value, exp) {
        return decimalAdjust('floor', value, exp);
    };
}
// Redondeo hacia arriba
if (!Math.ceil10) {
    Math.ceil10 = function (value, exp) {
        return decimalAdjust('ceil', value, exp);
    };
}

function GenIdAletatorio() {
    var d = new Date();
    d.getTime();
    var rand = Math.floor(Math.random() * (99999 - 11111 + 1)) + 11111;
    return Date.parse(d) + rand;
}

function AjaxDO(data) {
    if (typeof data == 'object' && data.WebScript) {
        return false;
    } else {
        return true;
    }
}

function reemplazarUrl(Url, texto, val) {
    return Url.replace(texto, val);
}

function reemplazarUrlAttr(Url, texto, attr, $this) {
    return Url.replace(texto, $this.parent().closest("[" + attr + "]").attr(attr));
}

function reemplazarUrlThis(Url, texto, attr, $this) {
    return Url.replace(texto, $this.attr(attr));
}


String.prototype.replaceLatinChar = function () {
    return output = this.replace(/á|é|í|ó|ú|ñ|ä|ë|ï|ö|ü/ig, function (str, offset, s) {
        var str = str == "á" ? "a" : str == "é" ? "e" : str == "í" ? "i" : str == "ó" ? "o" : str == "ú" ? "u" : str == "ñ" ? "n" : str;
        str = str == "Á" ? "A" : str == "É" ? "E" : str == "Í" ? "I" : str == "Ó" ? "O" : str == "Ú" ? "U" : str == "Ñ" ? "N" : str;
        str = str == "Á" ? "A" : str == "É" ? "E" : str == "Í" ? "I" : str == "Ó" ? "O" : str == "Ú" ? "U" : str == "Ñ" ? "N" : str;
        str = str == "ä" ? "a" : str == "ë" ? "e" : str == "ï" ? "i" : str == "ö" ? "o" : str == "ü" ? "u" : str;
        str = str == "Ä" ? "A" : str == "Ë" ? "E" : str == "Ï" ? "I" : str == "Ö" ? "O" : str == "Ü" ? "U" : str;
        return (str);
    })

}


$.AlertBootstrap = function (opc) {
    if (typeof opc === 'undefined') {
        return false;
    }

    var ModalAncho = '';

    if (typeof opc.modalAncho !== 'undefined') {
        var cant = parseInt(opc.modalAncho);
        if (cant > 0 || cant < 10) {
            ModalAncho = 'style="width: ' + (cant * 10) + '%;"';
        }
    }

    var IdGen = GenIdAletatorio();
    var IdMymodal = "#" + IdGen + "myModal";

    //default - primary - success - info - danger - warning
    var modpadingbotom = '0';
    if (typeof opc.theme === 'undefined') {
        opc.theme = 'default';
        opc.background = '';
    } else {
        opc.background = ' alert alert-' + opc.theme;
        var modpadingbotom = '15px';
    }
    var htmlcerrar = '<button type="button" class="close" bt="cerrar"><span aria-hidden="true">&times;</span></button>';

    if (typeof opc.cerrar !== 'undefined' && opc.cerrar == false) {
        opc.cerrar = ''
    } else {
        opc.cerrar = htmlcerrar;
    }



    var salir = ' data-keyboard="false" data-backdrop="static"';
    if (typeof opc.salir !== 'undefined' && opc.salir == true) {
        salir = '';
    }


    opc.sms = (typeof opc.sms === 'undefined') ? '' : '<div class="sms">' + opc.sms + '</div>';
    opc.title = (opc.title === 'undefined' || opc.title == false) ? '' : ' <h4 class="title" style="margin: 0 0 3px">' + opc.title + '</h4> ';

    var html = '<div class="modal fade" id="' + IdGen + 'myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"' + salir + '> <div class="modal-dialog box" ' + ModalAncho + ' role="document"> <div class="modal-content' + opc.background + '" style="padding: 15px 15px ' + modpadingbotom + '">  ' + opc.cerrar + opc.title + opc.sms + '<p class="text-center btns"> <button type="button" class="btn btn-primary" bt="aceptar">Aceptar</button> <button type="button" class="btn btn-info" bt="cancelar">Cancelar</button> </p></div></div></div></div>';
    $("body").append(html);



    if (typeof opc.posiciontitle !== 'undefined') {
        if (opc.posiciontitle == 'centro') {
            $(IdMymodal + " .title").addClass("text-center");
        }
    }



    $(IdMymodal + " .alert").addClass("alert-" + opc.theme);

    if (opc.btns) {
        var btns = '';
        $.each(opc.btns, function (k, i) {
            btns += '<button bt="' + i.id + '" type="button" class="hidden-print btn btn-' + i.color + '">' + i.txt + '</button>';
        });
        $(IdMymodal + ' .btns').html(btns);
    }

    $(IdMymodal).on('show.bs.modal', function () {
        if (typeof opc.onshow !== 'undefined') {
            opc.onshow("#" + IdGen + "myModal");
        }
    });

    WebPlugin();//Correjir si envia input
    $(IdMymodal).modal("show");
    $(IdMymodal + ' [bt]').click(function () {
        $(IdMymodal).attr("btn-accion", $(this).attr("bt")).modal("hide");
    });




    $(IdMymodal).on('hidden.bs.modal', function () {
        var btnacc = $(this).attr("btn-accion");

        if (typeof opc.after !== 'undefined') {
            opc.after(btnacc, "#" + IdGen + "myModal");
        }

        if (typeof opc.modalNotRemov === "undefined") {
            $("#" + IdGen + "myModal").remove();
        } else {
            $("#" + IdGen + "myModal").modal("hide");
        }


    });

    return IdMymodal;

}
function jAlertHtml(btn, val) {
    var i = 'fa fa-';
    var color = '';
    var html_color = '';
    if (typeof btn === "undefined") {
        btn = 'danger';
    }
    if (btn == "danger") {
        i += 'exclamation';
        color = 'DFBA49';
    } else if (btn == "info") {
        i += 'info';
        color = '428BCA';
    } else if (btn == "warning") {
        i += 'warning';
        color = 'F3565D';
    } else if (btn == "success") {
        i += 'check';
        color = '159F5D';
    }

    if (color != "") {
        html_color = '<div style="background:#' + color + '" class="label label-sm label-info"><i class="' + i + '"></i></div>';
    }
    return '<div class="media jalert">' + html_color + '<div class="media-body">' + val + '</div></div>';
}

function cPrint() {
    if ($('.modal.fade.in .sms').length > 0) {
        $(".page-header, .page-container, .page-footer").addClass("hidden");
        var IdGen = GenIdAletatorio();
        $("body").append('<div id="printgen' + IdGen + '" class="print" style=" padding: 0px 20px 0px 50px; margin: 0px auto;" >' + $('.modal.fade.in .sms').html() + '</div>');
        $('.modal').modal('hide');
    } else {
        $('.printgen').remove();
        $(".page-header, .page-container, .page-footer").removeClass("hidden");
    }
}
function Print(html) {
    $(".page-header, .page-container, .page-footer").addClass("hidden");
    var IdGen = GenIdAletatorio();
    $("body").append('<div id="printgen' + IdGen + '" class=" printgen visible-print-block" style="padding: 0px 20px 0px 50px; margin: 0px auto;" >' + html + '</div>');
    window.print();
    $('#printgen' + IdGen).remove();
    $(".page-header, .page-container, .page-footer").removeClass("hidden");
}
function jPrint(Html, titulo, ancho) {

    if (typeof ancho === 'undefined') {
        ancho = '9';
    }
    $.AlertBootstrap({
        salir: true,
        onshow: function () {
            setTimeout(function () {
                $(window).resize();
            }, 1200);
        },
        modalAncho: ancho,
        title: titulo,
        posiciontitle: 'centro',
        sms: Html + '<input type="hidden" class="modal-destroy">',
        btns: [{id: '1', color: 'primary', txt: 'Imprimir'}, {id: '2', color: 'default', txt: 'Cancelar'}],
        after: function (acc, ModalId) {
            if (acc == '1') {
                $(".page-header, .page-container, .page-footer").addClass("hidden");
                var IdGen = GenIdAletatorio();
                $("body").append('<div id="printgen' + IdGen + '"  class="visible-print-block" style="padding: 0px 20px 0px 50px; margin: 0px auto;">' + $(ModalId + ' .sms').html() + '</div>');
                window.print();
                $(ModalId).remove();
                $('#printgen' + IdGen).remove();
                $(".page-header, .page-container, .page-footer").removeClass("hidden");

            }
            if (acc == '2') {
                $(ModalId).remove();
                $('#printgen' + IdGen).remove();

            }
        }
    });
}
//excl - info - warn - chec
function jAlert(val, titulo, icono, grosor) {
    if (typeof titulo === "undefined") {
        titulo = '';
    }

    if (typeof icono !== "undefined") {
        if (icono == "success" || icono == "info" || icono == "warning" || icono == "danger") {
        } else {
            icono === undefined;
        }
    }
    $.AlertBootstrap({
        title: titulo,
        theme: icono,
        modalAncho: grosor,
        cerrar: false,
        posiciontitle: 'centro',
        sms: jAlertHtml(icono, val),
        btns: [{id: '1', color: 'primary', txt: 'Aceptar'}]
    });
}
function jConfirm(val, titulo, aft, icono, grosor) {
    if (typeof icono !== "undefined") {
        if (icono == "success" || icono == "info" || icono == "warning" || icono == "danger") {
        } else {
            icono === undefined;
        }
    }

    $.AlertBootstrap({
        title: titulo,
        theme: icono,
        modalAncho: grosor,
        cerrar: false,
        posiciontitle: 'centro',
        sms: jAlertHtml(icono, val),
        btns: [{id: '1', color: 'primary', txt: '&nbsp;&nbsp;Si&nbsp;&nbsp;'}, {id: '2', color: 'default', txt: 'No'}],
        after: function (acc) {
            if (acc == '1') {
                aft(true);
            } else {
                aft(false);
            }
        }
    });
}
function jSms(val, titulo) {
    jAlert(val, titulo, 'info');
}
function jModal(contenido, titulo, ancho) {
    if (typeof ancho === 'undefined') {
        ancho = false;
    }
    if (typeof titulo === "undefined") {
        titulo = false
    }
    $.AlertBootstrap({
        title: titulo,
        salir: true,
        modalAncho: ancho,
        cerrar: false,
        posiciontitle: 'centro',
        sms: contenido,
        btns: [{id: '1', color: 'primary', txt: 'Cerrar'}]
    });
}
//=================AJAX Porc Carga=================
$.sizeTot = 0;
$.sizeLoad = {};
$.sizeClear;
function ajaxLoadTot() {
    var ctot = 0;
    $.each($.sizeLoad, function (k, i) {
        ctot += i;
    });
    totp = ((ctot * 100) / $.sizeTot).toFixed(2);
//    if (totp == '100.00') {
    if (parseFloat(parseFloat(totp).toFixed(2)) >= parseFloat(parseFloat('100.00').toFixed(2))) {
        $.sizeTot = 0;
        $.sizeLoad = {};
        $("#procblock").addClass("clear").css("width", '100%').attr("progress-txt", '100%');
        $.sizeClear = setTimeout(function () {
            $("#procblock").attr("progress-txt", '0.01%').css("width", '0.01%');
        }, 800);
        $("#procblock").trigger("finish");
    } else {
        $("#procblock").removeClass("clear").css("width", totp + '%').attr("progress-txt", totp + '%');

    }

    return totp;
}

function ajaxLoaded(id, cant) {
    $.sizeLoad[id] = cant;
    ajaxLoadTot();
}
$.ajaxSetup({
    xhr: function () {
        var idXhr = 'xhr' + GenIdAletatorio();
        var addid = true;
        var idXhrTot = 0;

        var xhr = new window.XMLHttpRequest();

        xhr.addEventListener("loadstart", function (evt) {
            Block(true);
            $.sizeTot += 100;
            ajaxLoaded('l1' + idXhr, 60);
        }, false);
        xhr.addEventListener("load", function (evt) {//loadend no funciona en firefox
            ajaxLoaded('l1' + idXhr, 100);
            Block(false);
        }, false);

        xhr.upload.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
                if (addid) {
                    addid = false;
                    $.sizeTot += evt.total;
                    idXhrTot = evt.total;
                }
                ajaxLoaded(idXhr, evt.loaded);
            }
        }, false);

        return xhr;
    }
});

$(document).ready(function () {
    $(document).on("ajaxComplete", function (e, xhr, settings, exception) {
        WebPlugin();
        var showError = true;
        if (typeof xhr != 'undefined' && typeof xhr.responseJSON != 'undefined' && xhr.responseJSON !== null && typeof xhr.responseJSON.WebScript != 'undefined') {
            if (xhr.responseJSON.WebScript == 'sms') {
                jAlert(xhr.responseJSON.texto, xhr.responseJSON.titulo, xhr.responseJSON.icono);
            } else {
                toastr.options = {"closeButton": true, "debug": false, "positionClass": "toast-bottom-right", "onclick": null, "showDuration": "1000", "hideDuration": "1000", "timeOut": "5000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "linear", "showMethod": "fadeIn", "hideMethod": "fadeOut"}
                toastr[xhr.responseJSON.icono](xhr.responseJSON.texto, xhr.responseJSON.titulo);
            }
            showError = false;
        }
        if (typeof xhr !== "undefined") {
            if (typeof xhr.responseText != 'undefined' && xhr.responseText.indexOf('id="textLogin"') >= 0) {
                Block(true);
                $('.page-container').hide();
                toastr.options.positionClass = "toast-top-center";
                toastr.options.closeButton = false;
                toastr.options.timeOut = 0;
                toastr.options.tapToDismiss = false
                toastDanger('Usuario Deslogueado');
                showError = false;
                location.reload(true);
                return false;
            }
        }

        if (typeof xhr !== "undefined" && xhr.status != '200' && showError) {
            if (xhr.status == 0) {//F5
                Block(true);
                console.log('aa');
            } else {
                var statusErrorMap = {
                    '400': "Servidor entiende la petición, pero el contenido de la solicitud no era válida.",
                    '404': "Pagina no encontrada.",
                    '401': "Acceso no autorizado.",
                    '403': "Prohibida recurso no se puede acceder .",
                    '500': "Error Interno del Servidor.",
                    '503': "Servicio No Disponible."
                };


                if (xhr.status) {
                    message = statusErrorMap[xhr.status];
                    if (!message) {
                        message = "Error desconocido(" + e.status + ").";
                    }
                } else if (exception == 'parsererror') {
                    message = "Error: Analizar JSON, la petición ha fallado";
                } else if (exception == 'timeout') {
                    message = "Agotado el tiempo de espera.";
                } else if (exception == 'abort') {
                    message = "Solicitud fue abortada por el servidor.";
                } else {
                    message = "Error Desconocido";
                }
                body = xhr.responseText;
                body = $(body).find('.widget-content').html();
                jAlert(body, message, 'danger', 9);
            }
        }
    });
});
$(document).ready(function () {
    $(document).trigger('ajaxSend');
    $("#procblock").removeClass("hidden");
});
$(window).load(function () {
    $(document).trigger('ajaxComplete');
});



/*Block Web*/
var $BlockCant = 0, $BlockCantMax = 0;
function Block(Acc) {
    if (typeof Acc === "undefined" || Acc == true) {
        $BlockCant++;
        $(".portlet.box").addClass("load");
    } else {
        $BlockCant--;
        if ($BlockCant == 0) {
            $(".portlet.box").removeClass("load");
        }
    }
}
/*== RENDER TABLE CAJA ==*/
function dataTableR(id) {
    var dontSort = [];
    $(id + ' thead th').each(function () {
        if ($(this).hasClass('date')) {
            dontSort.push({
                "sType": "date-euro"
            });
        } else {
            dontSort.push(null);
        }
    });

    $(id + ' tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    });

    var table = $(id).DataTable({
        sDom: '<"top"fp>rt<"bottom"i><"clear">',
        order: [],
        scrollY: "300px",
        scrollX: true,
        scrollCollapse: true,
        paging: false,
        columnDefs: [
            {width: '20%', targets: 0}
        ],
        fixedColumns: true
    });

    table.columns().every(function () {
        var that = this;
        $(id + 'input:not([type="checkbox"])', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
}
function trim(str) {
    str = str.replace(/^\s+/, '');
    for (var i = str.length - 1; i >= 0; i--) {
        if (/\S/.test(str.charAt(i))) {
            str = str.substring(0, i + 1);
            break;
        }
    }
    return str;
}

function dateHeight(dateStr) {
    if (trim(dateStr) != '') {
        var frDate = trim(dateStr).split(' ');

        if (!frDate[1]) {
            frDate[1] = '00:00:00';
        }//Si no existe la hora poner una por defecto

        var frTime = frDate[1].split(':');
        var frDateParts = frDate[0].split('/');
        var day = frDateParts[0] * 60 * 24;
        var month = frDateParts[1] * 60 * 24 * 31;
        var year = frDateParts[2] * 60 * 24 * 366;
        var hour = frTime[0] * 60;
        var minutes = frTime[1];
        var x = day + month + year + hour + minutes;
    } else {
        var x = 99999999999999999; //GoHorse!
    }
    return x;
}

$.fn.dataTableExt.oSort['date-euro-asc'] = function (a, b) {
    var x = dateHeight(a);
    var y = dateHeight(b);
    var z = ((x < y) ? -1 : ((x > y) ? 1 : 0));
    return z;
};

$.fn.dataTableExt.oSort['date-euro-desc'] = function (a, b) {
    var x = dateHeight(a);
    var y = dateHeight(b);
    var z = ((x < y) ? 1 : ((x > y) ? -1 : 0));
    return z;
};

/*** RENDER TABLE CAJA ***/

$(document).ready(function () {
});
(function ($) {
    $.fn.hasAttr = function (name) {
        return this.attr(name) !== undefined;
    };
    $.fn.cnmlist = function (acc) {

        if (!this.hasAttr('jslit-act')) {
            return false;
        }
        if (!this.hasAttr('jslit-cant')) {
            return false;
        }

        var act = parseInt(this.attr('jslit-act'));
        var cant = parseInt(this.attr('jslit-cant'));

        var activ;
        if (!this.hasAttr('jslit-activ')) {
            this.attr('jslit-activ', act);
            activ = act;
        } else {
            activ = parseInt(this.attr('jslit-activ'));
        }

        if (typeof acc !== 'undefined') {
            if (acc == "0") {
                act = act - 1;
                if (act > 1) {
                    act == 1;
                }
            } else {
                act = act + 1;
                if (act >= cant) {
                    act = cant;
                }
            }
        }

        var html_act = '';
        var html_pri = '';
        var html_ult = '';
        this.attr('jslit-act', act);


        var acti;
        var acti_ini = act - 1;
        var acti_fin = act + 1;

        if (act <= 1) {
            acti_fin++;
            html_pri = ' class="disabled"';
        }//Aumetar al final si No se muestra el primero
        if (act >= cant - 1) {
            acti_ini++;
            html_ult = ' class="disabled"';
        }//Aumetar al comienzo si No se muestra el ultimo

        for (i = acti_ini; i <= acti_fin; i++) {
            if (i == activ) {
                acti = ' class="active"';
            } else {
                acti = '';
            }
            if (i >= 1 && i <= cant) {
                html_act += '<li' + acti + '><a href="#">' + i + '</a></li>';
            }
        }

        this.html('<li' + html_pri + '><span jlist-next="0" class="jlist-ant"> < </span></li>' + html_act + '<li' + html_ult + '><span jlist-next="1" class="jlist-next"> > </span></li>');

    };

}(jQuery));


$(document).ready(function () {
    $("body").on("click", "[jlist-next]", function () {
        if ($(this).parent().closest(".disabled").length == "1") {
            return false;
        }
        var controler = $(this).parent().closest("[jslit-act]");
        $(controler).cnmlist($(this).attr('jlist-next'));
        return false;
    });
});

/*Block Web Url*/
$(document).ready(function () {
    Block(true)
});
$(window).load(function () {
    Block(false);
});

var maskOptions = {
    completed: function () {
        this.change()
    }
};
var summernoteTime;
var maskTextReserva;
function WebPlugin() {
    //$(".portlet.box")
    $('.chosen:not([data-placeholder])').attr("data-placeholder", "Seleccione");
    $(".chosen").each(function () {
        if ($(this).next().hasClass("chosen-container")) {
            $(this).trigger("chosen:updated");
        } else {
            $(this).chosen({width: "100%", search_contains: true});
        }
    });

    $('input.date').datetimepicker({format: 'DD/MM/YYYY', locale: 'es', showClear: true, minDate: '1900/01/01', maxDate: '2116/12/31'});
    $('.datelv').datetimepicker({format: 'DD/MM/YYYY', locale: 'es', daysOfWeekDisabled: [0, 6]});
    $('input.datetime').datetimepicker({format: 'DD/MM/YYYY HH:mm:00', locale: 'es', showClear: true});
    $('input.time').datetimepicker({format: 'HH:mm', locale: 'es'});
    $('input.time00').datetimepicker({format: 'HH:mm:00', locale: 'es'});
    $('input.times').datetimepicker({format: 'HH:mm:ss', locale: 'es'});

    $(".number, .decimal").numeric();//0-9 negativos y puntos --Se quito por que crea conflicto con maskdecimal input[decimal]
    $(".integer, .entero").numeric("¬");//Solo 0-9 negativos positivos --Se quito por que crea conflicto con maskdecimal input[entero]

    $(".maskdecimal").keyup(function () {


        var text = '';
        var val = $(this).val();
        var val_ar = val.split(".");
        //val_ar[0] = val_ar[0].replace(/\D/g, '#');
        var cantidadEntero = ($(this).hasAttr('entero')) ? $(this).attr('entero') : '4';
        var cantidadDecimal = ($(this).hasAttr('decimal')) ? $(this).attr('decimal') : '2';

        val_ar[0] = val_ar[0].replace(/\D/g, '');
        text += val_ar[0].slice(0, cantidadEntero);

        text += (val_ar.length > 1) ? '.' : '';

        text += (typeof val_ar[1] !== 'undefined') ? val_ar[1].slice(0, cantidadDecimal) : '';

        $(this).val(text);
    });

    $(".maskDate,.masktimes,.maskDate,.percent").focusin(function () {
        maskTextReserva = $(this).val();
    }).focusout(function () {
        if (maskTextReserva != $(this).val()) {
            if ($(this).val() == '__/__/____' || $(this).val() == "") {
                $(this).change();
            }
        }
    });


    $(".maskDatetime").attr("placeholder", "_/__/____ __:__:__").mask("99/99/9999 99:99:99");

    $(".masktime").attr("placeholder", "__:__").mask("99:99");
    $(".masktimes").attr("placeholder", "__:__").mask("99:99:99");
    $(".maskDate").attr("placeholder", "__/__/____").mask("99/99/9999");
    $(".percent").mask("9?9%");


    $('.editorHtml').each(function () {
        if (!$(this).next().hasClass('note-editor')) {
            $(this).summernote({
                height: 150, //set editable area's height
                codemirror: {// codemirror options
                    theme: 'monokai'
                },
                toolbar: [
                    ['misc', ['table', 'codeview', 'undo', 'redo', 'paragraph', 'ul', 'ol']],
                    ['style', ['style']],
                    ['font', ['fontname']],
                    ['size', ['fontsize']],
                    ['text', ['bold', 'italic', 'underline', 'color']],
                    ['height', ['height']],
                    ['insert', ['link', 'video']]
                ]
            });
        }
    });
}

function ajaxNew(AjaxParam) {
    if (typeof AjaxParam === 'undefined') {
        return false;
    }
    if (typeof AjaxParam.type === 'undefined') {
        AjaxParam.type = 'POST';
    }
    if (typeof AjaxParam.url === 'undefined') {
        AjaxParam.url = false;
    }

    var data = new Array();

    if (typeof AjaxParam.dataSplit !== 'undefined') {
        var ar1 = AjaxParam.dataSplit.split(";");
        $.each(ar1, function (k, i) {
            var parm = i.split(",");
            data.push({name: parm[0], value: parm[1]});
        });
    }

    if (typeof AjaxParam.dataSplitId !== 'undefined') {
        var ar1 = AjaxParam.dataSplitId.split(";");
        $.each(ar1, function (k, i) {
            var parm = i.split(",");
            data.push({name: parm[0], value: $("#" + parm[1]).val()});
        });
    }

    if (typeof AjaxParam.dataSplitSelect !== 'undefined') {
        var ar1 = AjaxParam.dataSplitId.split(";");
        $.each(ar1, function (k, i) {
            var parm = i.split(",");
            data.push({name: parm[0], value: $(parm[1]).val()});
        });
    }

    if (typeof AjaxParam.data !== 'undefined') {
        data = AjaxParam.data;
    }

    var contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
    var processData = true;
    if (typeof AjaxParam.file !== 'undefined' && AjaxParam.file != false) {
        var dataForm = new FormData();
        AjaxParam.file.find("[type='file']").each(function (k, i) {
            dataForm.append($(this).attr('name'), $(this)[0].files[0]);
        });
        $.each(data, function (k, i) {
            dataForm.append(i.name, i.value);
        });
        contentType = false;
        processData = false;
        data = dataForm;
    }

    $.ajax({
        type: AjaxParam.type,
        data: data,
        contentType: contentType,
        processData: processData,
        url: AjaxParam.url,
        success: function (data) {
            if (typeof AjaxParam.success !== 'undefined') {
                eval(AjaxParam.success(data));
            }
        }
    });
}
$(document).ready(function () {
    WebPlugin();
    $('body').on("click", 'button[href]', function () {
        window.location.href = $(this).attr("href");
    });

});
/*Selelected TD*/
$("body").on("click", "tbody.add tr", function () {
    $(this).parent().closest("tbody").find('tr').removeClass("add");
    if (!$(this).find("td").hasAttr("colspan")) {
        $(this).addClass("add");
    }
});

function validarForm($idForm) {
    return JreqForm($("#" + $idForm));
}
/*Jquery Requiere*/
function JreqForm(form, sms) {
    if (typeof sms === "undefined") {
        sms = true;
    }

    var tmp = form.find("[jreq], [jreq-time], [jreq-times], [jreq-email], [jreq-megalimit], [jreq-num], [length], [minlength] , .entero");
    var stop;
    var stop_tot = false;
    var smstxt = '';

    if (tmp.length > 0) {
        $.each(tmp, function () {
            var smsLog = '';

            stop = false;
            var tmpinputcont = $(this).parent().closest(".form-group");
            tmpinputcont.removeClass("has-error").removeAttr("haserror");

            if ($(this).hasAttr("jreq") && $(this).attr('type') != 'file') {
                if ($(this).val() == '' || ($(this).hasAttr('multiple') && $(this).val() == null)) {
                    stop = true;
                    smsLog += 'Es necesario que coloque algun dato, ';
                }
            }

            if ($(this).hasAttr("jreq") && $(this).attr('type') == 'file') {
                //console.log($(this).val()+' * '+$(this).parent().closest('.jupload').find('.input-group-btn>a').length)
                if ($(this).val() == '' && $(this).parent().closest('.jupload').find('.input-group-btn>a').attr('href') == '') {
                    stop = true;
                    smsLog += 'Es necesario que coloque algun dato, ';
                }
                if ($(this).val() == '' && $(this).parent().closest('.jupload').find('.input-group-btn>a').length == 0) {
                    stop = true;
                    smsLog += 'Es necesario que coloque algun dato, ';
                }
            }


            var val = false;
            if ($(this).val() != '') {
                val = true;
            }

            if ($(this).attr('type') == "radio") {
                if ($('[name="' + $(this).attr('name') + '"]:checked').length == 0) {
                    smsLog += 'Seleccione una opción';
                    stop = true;
                }
            }


            //if (!stop && $(".time").val() != "" && $(this).hasAttr("jreq-time")) {
            if (!stop && val && $(this).hasAttr("jreq-time")) {
                if (/^(0[1-9]|1\d|2[0-3]):([0-5]\d)$/.test($(this).val())) {
                } else {
                    smsLog += 'El formato Hora(00:00) no es el correcto, ';
                    stop = true;
                }
            }

            //if (!stop && $(".time").val() != "" && $(this).hasAttr("jreq-times")) {
            if (!stop && val && $(this).hasAttr("jreq-times")) {
                if (/^(0[1-9]|1\d|2[0-3]):([0-5]\d):([0-5]\d)$/.test($(this).val())) {
                } else {
                    smsLog += 'El formato Hora (00:00:00) no es el correcto, ';
                    stop = true;
                }
            }

            if (!stop && val && $(this).hasAttr("jreq-num")) {
                if (/^([0-9])*$/.test($(this).val())) {
                } else {
                    smsLog += 'Solo se admiten números, ';
                    stop = true;
                }
            }


            if (!stop && val && $(this).hasAttr("jreq-email")) {
                if ($(this).attr("jreq-email").length > 0) {
                    patt = new RegExp("\^\\w+([\\.-]?\\w+)*(" + $(this).attr("jreq-email") + ")+$");
                    if (patt.test($(this).val())) {
                    } else {
                        smsLog += 'No tiene el formato Email, ';
                        stop = true;
                    }
                } else {

                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val())) {
                    } else {
                        smsLog += 'El dominio del email no es adminitido, ';
                        stop = true;
                    }
                }
            }

            if (!stop && val && $(this).hasAttr("length")) {
                var limit = parseInt($(this).attr('length'));
                if ($(this).val().length != limit) {
                    smsLog += 'La Cantidad de Caracteres debe ser igual a ' + limit + ', ';
                    stop = true;
                }
            }

            if (!stop && val && $(this).hasAttr("minlength")) {
                var limit = parseInt($(this).attr('minlength'));
                if ($(this).val().length < limit) {
                    smsLog += 'La Cantidad de Caracteres debe ser mayor o igual a ' + limit + ', ';
                    stop = true;
                }
            }

            if (!stop && val && $(this).hasClass("entero")) {
                if (/^([0-9])*$/.test($(this).val())) {
                } else {
                    smsLog += 'Solo se admiten números, ';
                    stop = true;
                }
            }


            if (!stop && val && $(this).hasAttr("jreq-megalimit")) {
                var limit = parseInt($(this).attr('jreq-megalimit'));
                limit = limit * 1048576;
                //console.log(this.files[0].size +' * '+ limit);
                if (this.files[0].size > limit) {
                    smsLog += 'El archivo que desea subir ha excedido el tamaño permitido (' + $(this).attr('jreq-megalimit') + 'MB), ';
                    stop = true;
                }
            }



            if (stop) {
                if (smsLog != '') {
                    tmpinputcont.attr("haserror", smsLog);
                    //var label = tmpinputcont.find("label[for]:first-child").text();
                    //Nueva línea agregara(mostraba texto que no corresponde en textarea de texto enriquecido)
                    var label = tmpinputcont.children('label').text();
                    smstxt += '<li><strong>' + label + '</strong> ' + smsLog + '</li>';

                    tmpinputcont.attr("haserror", sms);
                }

                tmpinputcont.addClass("has-error");
                stop_tot = true;
            }

        });
    }

    if (sms) {
        if (stop_tot) {
            jAlert('<ul>' + smstxt + '</ul>', 'verificar', 'danger');
        }
    }
    if (stop_tot) {
        return false;
    } else {
        return true;
    }

}
$(document).ready(function () {
    $('body').on("change", '[jreq]', function () {
        var form = $(this).parent().closest("form");
        JreqForm(form, false);
    });
});

/*Formulario Autonomo*/
$(document).ready(function () {
    $('body').on('submit', 'form', function () {

        var thisform = $(this);
        var error = JreqForm(thisform);
        if (error == false) {
            return false;
        }

        if ($(this).hasClass("proc")) {
            if ($(this).hasAttr("before") && eval($(this).attr("before")) == false) {//Si utiliza el atributo y retorbar un valor false; se cancela el submit
                return false;
            }
            var file = false;
            var method = "POST";
            if ($(this).hasAttr("method")) {
                method = $(this).attr("method");
            }
            var params = $(this).serializeArray();
            var AjaxUrl = false;

            var contenedor = false;

            if ($(this).hasAttr("container")) {
                contenedor = $(this).attr("container");
            }
            if ($(this).attr("action")) {
                AjaxUrl = $(this).attr("action");
            }
            if ($(this).find('[type="file"]').length > 0) {
                file = $(this);
            }

            ajaxNew({type: method, data: params, url: AjaxUrl, file: file,
                success: function (data) {
                    if (thisform.hasAttr("container")) {
                        if (thisform.attr("container").indexOf('(data)') >= 0) {
                            eval(thisform.attr("container"));
                        } else {
                            $(thisform.attr("container")).html(data);
                        }
                    }

                    if (thisform.hasAttr("thiscontainer")) {
                        thisform.html(data);
                    }

                    if (thisform.hasAttr("after")) {
                        eval(thisform.attr("after"));
                    }
                }
            });
            return false;
        }
    });
    $(".changeSubmit").change(function () {
        if ($(this).hasAttr("after")) {
            var acc = eval($(this).attr("after"));
            if (acc == false) {
                return false;
            }
        }
        $(this).parent().closest("form").submit();
    });

});
/*Show and hide*/
$(document).ready(function () {
    $("body").on("change", '[showhide]', function () {
        var hiden = $(this).attr("showhide");
        $(hiden).addClass("hidden");
        var show = $(this).find(":selected").attr("jact");
        $(show).removeClass("hidden");
    });
});

/*Tooltips*/
$(document).ready(function () {
    $("body").on("mouseenter", "[tooltips]", function () {
        $(this).tooltip({html: true, title: $(this).attr("tooltips"), placement: 'top'}).tooltip('show');
    }).on("mouseleave", "[tooltips]", function () {
        $(this).tooltip('destroy');
    });
});

/*Jupload*/
$(document).ready(function () {
    $('body').on('click', '.jupload .up', function () {
        var padre = $(this).parent().closest(".jupload");
        padre.find('[type="file"]').click();
    });
    $('body').on('change', '.jupload [type="file"]', function () {
        var padre = $(this).parent().closest(".jupload");
        padre.find('.sms').val($(this).val()).attr('tooltips', $(this).val());
    });
});

/*ReadyClick*/
$(document).ready(function () {
    $('.readyClick').trigger('click');
    $(".readyChange").change();
    $(".ReadySubmit").submit();
});

/*Tabs sin Id*/
$(document).ready(function () {
    $('body').on("click", ".tabs .nav li", function () {
        var self = $(this).index()
        var tbsp = $(this).parent().closest(".tabs");
        tbsp.find(".nav>li.active, .tab-content>div.active").removeClass("active");
        tbsp.find(".nav>li:eq(" + self + "), .tab-content>div:eq(" + self + ")").addClass("active");
    });
});




function toastIni() {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}
toastIni();
function toast(tipo, mensaje, titulo) {
    if (tipo == "danger") {
        tipo = 'error';
    }
    var $toast = toastr[tipo](mensaje, titulo);
    toastIni();
    return $toast;
}
function toastSuccess(mensaje, titulo) {
    return toast("success", mensaje, titulo)
}
function toastInfo(mensaje, titulo) {
    return toast("info", mensaje, titulo)
}
function toastWarning(mensaje, titulo) {
    return toast("warning", mensaje, titulo)
}
function toastDanger(mensaje, titulo) {
    return toast("danger", mensaje, titulo)
}
