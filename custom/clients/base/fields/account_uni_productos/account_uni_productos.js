({
    //Carga de Listas de valores
    razones_ddw_list: null,
    fuera_de_perfil_ddw_list: null,
    no_producto_requiere_list: null,
    razones_cf_list: null,
    tct_razon_ni_l_ddw_c_list: null,

    //Evento para la funcionalidad de que solo admita texto en los siguientes campos
    events: {
        'keydown .txt_l_nv_quien': 'PuroTexto', //Quien Leasing
        'keydown .txt_l_nv_porque': 'PuroTexto', //Porque Leasing
        'keydown .txt_l_nv_otro': 'PuroTexto', //¿Qué producto? Leasing
        'keydown .txt_f_nv_quien': 'PuroTexto', //Quien Factoraje
        'keydown .txt_f_nv_porque': 'PuroTexto', //Porque Factoraje
        'keydown .txt_f_nv_otro': 'PuroTexto', //¿Qué producto? Factoraje
        'keydown .txt_ca_nv_quien': 'PuroTexto', //Quien Credito Automotriz
        'keydown .txt_ca_nv_porque': 'PuroTexto', //Porque Credito Automotriz
        'keydown .txt_ca_nv_otro': 'PuroTexto', //¿Qué producto? Credito Automotriz
        'keydown .txt_fl_nv_quien': 'PuroTexto', //Quien Fleet
        'keydown .txt_fl_nv_porque': 'PuroTexto', //Porque Fleet
        'keydown .txt_fl_nv_otro': 'PuroTexto', //¿Qué producto? Fleet
        'keydown .txt_u_nv_quien': 'PuroTexto', //Quien Uniclick
        'keydown .txt_u_nv_porque': 'PuroTexto', //Porque Uniclick
        'keydown .txt_u_nv_otro': 'PuroTexto', //¿Qué producto? Uniclick
    },

    initialize: function (options) {
        //Inicializa campo custom
        this._super('initialize', [options]);
        options = options || {};
        options.def = options.def || {};
        cont_uni_p = this;
        //Guarda los valores hacia el modulo UNI PRODUCTOS
        this.model.addValidationTask('GuardaUniProductos', _.bind(this.SaveUniProductos, this));

        this.tipoProducto = {
            'leasing': {
                'producto': '1',
                'id': '',
                'no_viable': '',
                'no_viable_razon': '',
                'no_viable_razon_fp': '',
                'no_viable_quien': '',
                'no_viable_porque': '',
                'no_viable_producto': '',
                'no_viable_razon_cf': '',
                'no_viable_otro_c': '',
                'no_viable_razon_ni': '',
                'assigned_user_id': ''
            },
            'factoring': {
                'producto': '4',
                'id': '',
                'no_viable': '',
                'no_viable_razon': '',
                'no_viable_razon_fp': '',
                'no_viable_quien': '',
                'no_viable_porque': '',
                'no_viable_producto': '',
                'no_viable_razon_cf': '',
                'no_viable_otro_c': '',
                'no_viable_razon_ni': '',
                'assigned_user_id': ''
            },
            'credito_auto': {
                'producto': '3',
                'id': '',
                'no_viable': '',
                'no_viable_razon': '',
                'no_viable_razon_fp': '',
                'no_viable_quien': '',
                'no_viable_porque': '',
                'no_viable_producto': '',
                'no_viable_razon_cf': '',
                'no_viable_otro_c': '',
                'no_viable_razon_ni': '',
                'assigned_user_id': ''
            },
            'fleet': {
                'producto': '6',
                'id': '',
                'no_viable': '',
                'no_viable_razon': '',
                'no_viable_razon_fp': '',
                'no_viable_quien': '',
                'no_viable_porque': '',
                'no_viable_producto': '',
                'no_viable_razon_cf': '',
                'no_viable_otro_c': '',
                'no_viable_razon_ni': '',
                'assigned_user_id': ''
            },
            'uniclick': {
                'producto': '8',
                'id': '',
                'no_viable': '',
                'no_viable_razon': '',
                'no_viable_razon_fp': '',
                'no_viable_quien': '',
                'no_viable_porque': '',
                'no_viable_producto': '',
                'no_viable_razon_cf': '',
                'no_viable_otro_c': '',
                'no_viable_razon_ni': '',
                'assigned_user_id': ''
            }
        };


    },

    /**
     * When data changes, re-render the field only if it is not on edit (see MAR-1617).
     * @inheritdoc
     */
    bindDataChange: function () {
        this.model.on('change:' + this.name, function () {
            if (this.action !== 'edit') {
                // this.render();
            }
        }, this);
    },

    _render: function () {
        this._super("_render");
        $("span.normal[data-fieldname='account_uni_productos']").find('.row-fluid > .record-label').attr('style', 'display:none;');
        //campo custom account_uni_productos
        this.cargalistas(); //funcion de cargar listas



        /*********************Funciones de visibilidad para campos conforme al check en cada producto*************************/
        /*************Producto Leasing*************/
        $('.chk_l_nv').change(function (evt) {  //check - No Viable Leasing
            cont_uni_p.MuestraCamposLeasing();
        });
        $('.list_l_nv_razon').change(function (evt) { //LISTA - Razón de Lead no viable LEASING
            cont_uni_p.dependenciasLeasing();
        });
        $('.list_l_nv_producto').change(function (evt) { //LISTA - ¿Qué producto? LEASING
            cont_uni_p.dependenciasLeasing();
        });
        /*************Producto Factoraje*************/
        $('.chk_f_nv').change(function (evt) {  //check - No Viable Factoraje
            cont_uni_p.MuestraCamposFactoraje();
        });
        $('.list_f_nv_razon').change(function (evt) { //LISTA - Razón de Lead no viable Factoraje
            cont_uni_p.dependenciasFactoraje();
        });
        $('.list_f_nv_producto').change(function (evt) { //LISTA - ¿Qué producto? Factoraje
            cont_uni_p.dependenciasFactoraje();
        });
        /*************Producto Credito Automotriz*************/
        $('.chk_ca_nv').change(function (evt) {  //check - No Viable Credito Automotriz
            cont_uni_p.MuestraCamposCA();
        });
        $('.list_ca_nv_razon').change(function (evt) { //LISTA - Razón de Lead no viable Credito Automotriz
            cont_uni_p.dependenciasCA();
        });
        $('.list_ca_nv_producto').change(function (evt) { //LISTA - ¿Qué producto? Credito Automotriz
            cont_uni_p.dependenciasCA();
        });
        /*************Producto Fleet*************/
        $('.chk_fl_nv').change(function (evt) {  //check - No Viable Fleet
            cont_uni_p.MuestraCamposFleet();
        });
        $('.list_fl_nv_razon').change(function (evt) { //LISTA - Razón de Lead no viable Fleet
            cont_uni_p.dependenciasFleet();
        });
        $('.list_fl_nv_producto').change(function (evt) { //LISTA - ¿Qué producto? Fleet
            cont_uni_p.dependenciasFleet();
        });
        /*************Producto Uniclick*************/
        $('.chk_u_nv').change(function (evt) {  //check - No Viable Uniclick
            cont_uni_p.MuestraCamposUniclick();
        });
        $('.list_u_nv_razon').change(function (evt) { //LISTA - Razón de Lead no viable Uniclick
            cont_uni_p.dependenciasUniclick();
        });
        $('.list_u_nv_producto').change(function (evt) { //LISTA - ¿Qué producto? Uniclick
            cont_uni_p.dependenciasUniclick();
        });

        //Pregunta el tipo de producto del usuario para poder editar campo de Lead no Viable
        $('[data-field="chk_l_nv"]').attr('style', 'pointer-events:none;'); //Check Leasing
        $('[data-field="chk_f_nv"]').attr('style', 'pointer-events:none;'); //Check Factoraje
        $('[data-field="chk_ca_nv"]').attr('style', 'pointer-events:none;'); //Check Credito-Auto
        $('[data-field="chk_fl_nv"]').attr('style', 'pointer-events:none;'); //Check Fleet
        $('[data-field="chk_u_nv"]').attr('style', 'pointer-events:none;'); //Check Uniclick

        $('[data-field="chk_ls_multi"]').attr('style', 'pointer-events:none;'); //Check Leasing
        $('[data-field="chk_fac_multi"]').attr('style', 'pointer-events:none;'); //Check Factoraje
        $('[data-field="chk_ca_multi"]').attr('style', 'pointer-events:none;'); //Check Credito-Auto
        $('[data-field="chk_fe_multi"]').attr('style', 'pointer-events:none;'); //Check Fleet
        $('[data-field="chk_uniclick_multi"]').attr('style', 'pointer-events:none;'); //Check Uniclick

        //inabilita campo check excluye_precalifiacion
        $('[data-field="chk_ls_excluir"]').attr('style','pointer-events:none');

        try {

            cont_uni_p.nvproductos(); //HABILITA LOS CHECK DEPENDIENDO LOS PRODUCTOS QUE TIENE EL USUARIO

            cont_uni_p.MuestraCamposLeasing(); //FUNCION PARA LOS CAMPOS LEASING
            cont_uni_p.MuestraCamposFactoraje(); //FUNCION PARA LOS CAMPOS FACTORAJE
            cont_uni_p.MuestraCamposCA(); //FUNCION PARA LOS CAMPOS CA
            cont_uni_p.MuestraCamposFleet(); //FUNCION PARA LOS CAMPOS FLEET
            cont_uni_p.MuestraCamposUniclick(); //FUNCION PARA LOS CAMPOS UNICLICK

            cont_uni_p.dependenciasLeasing(); //FUNCION DE DEPENDENCIA DE CAMPOS LEASING
            cont_uni_p.dependenciasFactoraje(); //FUNCION DE DEPENDENCIA DE CAMPOS FACTORAJE
            cont_uni_p.dependenciasCA(); //FUNCION DE DEPENDENCIA DE CAMPOS CA
            cont_uni_p.dependenciasFleet(); //FUNCION DE DEPENDENCIA DE CAMPOS FLEET
            cont_uni_p.dependenciasUniclick(); //FUNCION DE DEPENDENCIA DE CAMPOS UNICLICK

            cont_uni_p.noeditables();  //FUNCION PARA CAMPOS NO EDITABLES

        } catch (err) {
            console.log(err.message);
        }
        //$('.list_u_canal').select2('val',cont_uni_p.ResumenProductos.uniclick.canal_c ); //lista Canal uniclcick

        //Funcion para dar estilo select2 a las listas deplegables.
        var $select = $('select.select2');
        $select.select2();

        //Validacion para campo exluir precalificacion
        if(App.user.attributes.excluir_precalifica_c== 1){
            $('[data-field="chk_ls_excluir"]').attr('style','pointer-events:block');
        }
    },

    /*************************************PRODUCTO LEASING*********************************************/
    MuestraCamposLeasing: function () {
        $('.l_nv_razon').hide(); //CLASE Razón de Lead no viable LEASING
        $('.l_nv_razon_fp').hide(); //CLASE Fuera de Perfil (Razón) LEASING
        $('.l_nv_quien').hide(); //CLASE ¿Quién? LEASING
        $('.l_nv_porque').hide(); //CLASE ¿Por qué? LEASING
        $('.l_nv_producto').hide(); //CLASE ¿Qué producto? LEASING
        $('.l_nv_razon_cf').hide(); //CLASE Condiciones Financieras LEASING
        $('.l_nv_otro').hide(); //CLASE ¿Qué producto? LEASING
        $('.l_nv_razon_ni').hide(); //CLASE Razón No se encuentra interesado LEASING
        if ($('.chk_l_nv')[0] != undefined) {
            if ($('.chk_l_nv')[0].checked) { //CHECK - CLASE No Viable Leasing
                $('.l_nv_razon').show(); //MUESTRA - CLASE Razón de Lead no viable LEASING
            }
        }
    },
    //FUNCION DE PRODUCTO LEASING PARA LAS DEPENDENCIAS DE LOS CAMPOS
    dependenciasLeasing: function () {
        // CLASE DE list_l_nv_razon -LISTA - Razón de Lead no viable LEASING
        if ($('.chk_l_nv')[0] != undefined) {
            if (($('.list_l_nv_razon').select2('val') == "Fuera de Perfil" || $('.list_l_nv_razon option:selected').text() == "Fuera de Perfil" || $('.list_l_nv_razon')[0].innerText.trim() == "Fuera de Perfil") && $('.chk_l_nv')[0].checked) {
                $('.l_nv_razon_fp').show(); //CLASE DIV Fuera de Perfil (Razón)
            } else {
                $('.l_nv_razon_fp').hide(); //CLASE DIV Fuera de Perfil (Razón)
                $('.list_l_nv_razon_fp').select2('val', ""); //CLASE LISTA Fuera de Perfil (Razón)
            }
            // CLASE DE list_l_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_l_nv_razon').select2('val') == "Ya está con la competencia" || $('.list_l_nv_razon option:selected').text() == "Ya está con la competencia" || $('.list_l_nv_razon')[0].innerText.trim() == "Ya está con la competencia" || $('.list_l_nv_razon option:selected').text() == "Ya está con la competencia") && $('.chk_l_nv')[0].checked) {
                $('.l_nv_quien').show(); //CLASE DIV ¿Quién? TEXTO
                $('.l_nv_porque').show(); //CLASE DIV ¿Por qué? TEXTO
            } else {
                $('.l_nv_quien').hide(); //CLASE DIV ¿Quién? TEXTO
                $('.l_nv_porque').hide(); //CLASE DIV ¿Por qué? TEXTO
                $('.txt_l_nv_quien').val(""); //CLASE DIV ¿Quién? TEXTO
                $('.txt_l_nv_porque').val(""); //CLASE DIV ¿Por qué? TEXTO
            }
            // CLASE DE list_l_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_l_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_l_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_l_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && $('.chk_l_nv')[0].checked) {
                $('.l_nv_producto').show(); //clase lista - ¿Qué producto?
            } else {
                $('.l_nv_producto').hide(); //clase lista - ¿Qué producto?
                $('.list_l_nv_producto').select2('val', ""); //clase lista - ¿Qué producto?
            }
            // CLASE DE list_l_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_l_nv_razon').select2('val') == "Condiciones Financieras" || $('.list_l_nv_razon option:selected').text() == "Condiciones Financieras" || $('.list_l_nv_razon')[0].innerText.trim() == "Condiciones Financieras") && $('.chk_l_nv')[0].checked) {
                $('.l_nv_razon_cf').show(); //clase lista Condiciones Financieras
            } else {
                $('.l_nv_razon_cf').hide(); //clase lista Condiciones Financieras
                $('.list_l_nv_razon_cf').select2('val', ""); //clase lista Condiciones Financieras
            }
            // CLASE DE list_l_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_l_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_l_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_l_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && ($('.list_l_nv_producto').select2('val') == "Otro" || $('.list_l_nv_producto option:selected').text() == "Otro" || $('.list_l_nv_producto')[0].innerText.trim() == "Otro") && $('.chk_l_nv')[0].checked) {
                $('.l_nv_otro').show(); //TEXTO CLASE ¿Qué producto?
            } else {
                $('.l_nv_otro').hide(); //TEXTO CLASE ¿Qué producto?
                $('.txt_l_nv_otro').val(""); //TEXTO CLASE ¿Qué producto?
            }
            // CLASE DE list_l_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_l_nv_razon').select2('val') == "No se encuentra interesado" || $('.list_l_nv_razon option:selected').text() == "No se encuentra interesado" || $('.list_l_nv_razon')[0].innerText.trim() == "No se encuentra interesado") && $('.chk_l_nv')[0].checked) {
                $('.l_nv_razon_ni').show(); //LISTA Razón No se encuentra interesado
            } else {
                $('.l_nv_razon_ni').hide(); //LISTA Razón No se encuentra interesado
                $('.list_l_nv_razon_ni').select2('val', ""); //LISTA Razón No se encuentra interesado
            }
        }
    },

    /*************************************PRODUCTO FACTORAJE*********************************************/
    MuestraCamposFactoraje: function () {
        $('.f_nv_razon').hide(); //CLASE Razón de Lead no viable FACTORAJE
        $('.f_nv_razon_fp').hide(); //CLASE Fuera de Perfil (Razón) FACTORAJE
        $('.f_nv_quien').hide(); //CLASE ¿Quién? FACTORAJE
        $('.f_nv_porque').hide(); //CLASE ¿Por qué? FACTORAJE
        $('.f_nv_producto').hide(); //CLASE ¿Qué producto? FACTORAJE
        $('.f_nv_razon_cf').hide(); //CLASE Condiciones Financieras FACTORAJE
        $('.f_nv_otro').hide(); //CLASE ¿Qué producto? FACTORAJE
        $('.f_nv_razon_ni').hide(); //CLASE Razón No se encuentra interesado FACTORAJE
        if ($('.chk_f_nv')[0] != undefined) {
            if ($('.chk_f_nv')[0].checked) { //CHECK - CLASE No Viable FACTORAJE
                $('.f_nv_razon').show(); //MUESTRA - CLASE Razón de Lead no viable FACTORAJE
            }
        }
    },
    //FUNCION DE PRODUCTO FACTORAJE PARA LAS DEPENDENCIAS DE LOS CAMPOS
    dependenciasFactoraje: function () {
        if ($('.chk_f_nv')[0] != undefined) {
            // CLASE DE list_f_nv_razon -LISTA - Razón de Lead no viable FACTORAJE
            if (($('.list_f_nv_razon').select2('val') == "Fuera de Perfil" || $('.list_f_nv_razon option:selected').text() == "Fuera de Perfil" || $('.list_f_nv_razon')[0].innerText.trim() == "Fuera de Perfil") && $('.chk_f_nv')[0].checked) {
                $('.f_nv_razon_fp').show(); //CLASE DIV Fuera de Perfil (Razón)
            } else {
                $('.f_nv_razon_fp').hide(); //CLASE DIV Fuera de Perfil (Razón)
                $('.list_f_nv_razon_fp').select2('val', ""); //CLASE LISTA Fuera de Perfil (Razón)
            }
            // CLASE DE list_f_nv_razon -LISTA - Razón de Lead no viable FACTORAJE
            if (($('.list_f_nv_razon').select2('val') == "Ya está con la competencia" || $('.list_f_nv_razon option:selected').text() == "Ya está con la competencia" || $('.list_f_nv_razon')[0].innerText.trim() == "Ya está con la competencia" || $('.list_f_nv_razon option:selected').text() == "Ya está con la competencia") && $('.chk_f_nv')[0].checked) {
                $('.f_nv_quien').show(); //CLASE DIV ¿Quién? TEXTO
                $('.f_nv_porque').show(); //CLASE DIV ¿Por qué? TEXTO
            } else {
                $('.f_nv_quien').hide(); //CLASE DIV ¿Quién? TEXTO
                $('.f_nv_porque').hide(); //CLASE DIV ¿Por qué? TEXTO
                $('.txt_f_nv_quien').val(""); //CLASE DIV ¿Quién? TEXTO
                $('.txt_f_nv_porque').val(""); //CLASE DIV ¿Por qué? TEXTO
            }
            // CLASE DE list_f_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_f_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_f_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_f_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && $('.chk_f_nv')[0].checked) {
                $('.f_nv_producto').show(); //clase lista - ¿Qué producto?
            } else {
                $('.f_nv_producto').hide(); //clase lista - ¿Qué producto?
                $('.list_f_nv_producto').select2('val', ""); //clase lista - ¿Qué producto?
            }
            // CLASE DE list_f_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_f_nv_razon').select2('val') == "Condiciones Financieras" || $('.list_f_nv_razon option:selected').text() == "Condiciones Financieras" || $('.list_f_nv_razon')[0].innerText.trim() == "Condiciones Financieras") && $('.chk_f_nv')[0].checked) {
                $('.f_nv_razon_cf').show(); //clase lista Condiciones Financieras
            } else {
                $('.f_nv_razon_cf').hide(); //clase lista Condiciones Financieras
                $('.list_f_nv_razon_cf').select2('val', ""); //clase lista Condiciones Financieras
            }
            // CLASE DE list_f_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_f_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_f_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_f_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && ($('.list_f_nv_producto').select2('val') == "Otro" || $('.list_f_nv_producto option:selected').text() == "Otro" || $('.list_f_nv_producto')[0].innerText.trim() == "Otro") && $('.chk_f_nv')[0].checked) {
                $('.f_nv_otro').show(); //TEXTO CLASE ¿Qué producto?
            } else {
                $('.f_nv_otro').hide(); //TEXTO CLASE ¿Qué producto?
                $('.txt_f_nv_otro').val(""); //TEXTO CLASE ¿Qué producto?
            }
            // CLASE DE list_f_nv_razon -LISTA - Razón de Lead no viable LEASING
            if (($('.list_f_nv_razon').select2('val') == "No se encuentra interesado" || $('.list_f_nv_razon option:selected').text() == "No se encuentra interesado" || $('.list_f_nv_razon')[0].innerText.trim() == "No se encuentra interesado") && $('.chk_f_nv')[0].checked) {
                $('.f_nv_razon_ni').show(); //LISTA Razón No se encuentra interesado
            } else {
                $('.f_nv_razon_ni').hide(); //LISTA Razón No se encuentra interesado
                $('.list_f_nv_razon_ni').select2('val', ""); //LISTA Razón No se encuentra interesado
            }
        }
    },

    /*************************************PRODUCTO CREDITO AUTOMOTRIZ*********************************************/
    MuestraCamposCA: function () {
        $('.ca_nv_razon').hide(); //CLASE Razón de Lead no viable CA
        $('.ca_nv_razon_fp').hide(); //CLASE Fuera de Perfil (Razón) CA
        $('.ca_nv_quien').hide(); //CLASE ¿Quién? CA
        $('.ca_nv_porque').hide(); //CLASE ¿Por qué? CA
        $('.ca_nv_producto').hide(); //CLASE ¿Qué producto? CA
        $('.ca_nv_razon_cf').hide(); //CLASE Condiciones Financieras CA
        $('.ca_nv_otro').hide(); //CLASE ¿Qué producto? CA
        $('.ca_nv_razon_ni').hide(); //CLASE Razón No se encuentra interesado CA
        if ($('.chk_ca_nv')[0] != undefined) {
            if ($('.chk_ca_nv')[0].checked) { //CHECK - CLASE No Viable CA
                $('.ca_nv_razon').show(); //MUESTRA - CLASE Razón de Lead no viable CA
            }
        }
    },
    //FUNCION DE PRODUCTO CREDITO AUTOMOTRIZ PARA LAS DEPENDENCIAS DE LOS CAMPOS
    dependenciasCA: function () {

        if ($('.chk_ca_nv')[0] != undefined) {
            // CLASE DE list_ca_nv_razon -LISTA - Razón de Lead no viable CA
            if (($('.list_ca_nv_razon').select2('val') == "Fuera de Perfil" || $('.list_ca_nv_razon option:selected').text() == "Fuera de Perfil" || $('.list_ca_nv_razon')[0].innerText.trim() == "Fuera de Perfil") && $('.chk_ca_nv')[0].checked) {
                $('.ca_nv_razon_fp').show(); //CLASE DIV Fuera de Perfil (Razón)
            } else {
                $('.ca_nv_razon_fp').hide(); //CLASE DIV Fuera de Perfil (Razón)
                $('.list_ca_nv_razon_fp').select2('val', ""); //CLASE LISTA Fuera de Perfil (Razón)
            }
            // CLASE DE list_ca_nv_razon -LISTA - Razón de Lead no viable CA
            if (($('.list_ca_nv_razon').select2('val') == "Ya está con la competencia" || $('.list_ca_nv_razon option:selected').text() == "Ya está con la competencia" || $('.list_ca_nv_razon')[0].innerText.trim() == "Ya está con la competencia" || $('.list_ca_nv_razon option:selected').text() == "Ya está con la competencia") && $('.chk_ca_nv')[0].checked) {
                $('.ca_nv_quien').show(); //CLASE DIV ¿Quién? TEXTO
                $('.ca_nv_porque').show(); //CLASE DIV ¿Por qué? TEXTO
            } else {
                $('.ca_nv_quien').hide(); //CLASE DIV ¿Quién? TEXTO
                $('.ca_nv_porque').hide(); //CLASE DIV ¿Por qué? TEXTO
                $('.txt_ca_nv_quien').val(""); //CLASE DIV ¿Quién? TEXTO
                $('.txt_ca_nv_porque').val(""); //CLASE DIV ¿Por qué? TEXTO
            }
            // CLASE DE list_ca_nv_razon -LISTA - Razón de Lead no viable CA
            if (($('.list_ca_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_ca_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_ca_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && $('.chk_ca_nv')[0].checked) {
                $('.ca_nv_producto').show(); //clase lista - ¿Qué producto?
            } else {
                $('.ca_nv_producto').hide(); //clase lista - ¿Qué producto?
                $('.list_ca_nv_producto').select2('val', ""); //clase lista - ¿Qué producto?
            }
            // CLASE DE list_ca_nv_razon -LISTA - Razón de Lead no viable CA
            if (($('.list_ca_nv_razon').select2('val') == "Condiciones Financieras" || $('.list_ca_nv_razon option:selected').text() == "Condiciones Financieras" || $('.list_ca_nv_razon')[0].innerText.trim() == "Condiciones Financieras") && $('.chk_ca_nv')[0].checked) {
                $('.ca_nv_razon_cf').show(); //clase lista Condiciones Financieras
            } else {
                $('.ca_nv_razon_cf').hide(); //clase lista Condiciones Financieras
                $('.list_ca_nv_razon_cf').select2('val', ""); //clase lista Condiciones Financieras
            }
            // CLASE DE list_ca_nv_razon -LISTA - Razón de Lead no viable CA
            if (($('.list_ca_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_ca_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_ca_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && ($('.list_ca_nv_producto').select2('val') == "Otro" || $('.list_ca_nv_producto option:selected').text() == "Otro" || $('.list_ca_nv_producto')[0].innerText.trim() == "Otro") && $('.chk_ca_nv')[0].checked) {
                $('.ca_nv_otro').show(); //TEXTO CLASE ¿Qué producto?
            } else {
                $('.ca_nv_otro').hide(); //TEXTO CLASE ¿Qué producto?
                $('.txt_ca_nv_otro').val(""); //TEXTO CLASE ¿Qué producto?
            }
            // CLASE DE list_ca_nv_razon -LISTA - Razón de Lead no viable CA
            if (($('.list_ca_nv_razon').select2('val') == "No se encuentra interesado" || $('.list_ca_nv_razon option:selected').text() == "No se encuentra interesado" || $('.list_ca_nv_razon')[0].innerText.trim() == "No se encuentra interesado") && $('.chk_ca_nv')[0].checked) {
                $('.ca_nv_razon_ni').show(); //LISTA Razón No se encuentra interesado
            } else {
                $('.ca_nv_razon_ni').hide(); //LISTA Razón No se encuentra interesado
                $('.list_ca_nv_razon_ni').select2('val', ""); //LISTA Razón No se encuentra interesado
            }
        }
    },

    /*************************************PRODUCTO FLEET*********************************************/
    MuestraCamposFleet: function () {
        $('.fl_nv_razon').hide(); //CLASE Razón de Lead no viable FLEET
        $('.fl_nv_razon_fp').hide(); //CLASE Fuera de Perfil (Razón) FLEET
        $('.fl_nv_quien').hide(); //CLASE ¿Quién? FLEET
        $('.fl_nv_porque').hide(); //CLASE ¿Por qué? FLEET
        $('.fl_nv_producto').hide(); //CLASE ¿Qué producto? FLEET
        $('.fl_nv_razon_cf').hide(); //CLASE Condiciones Financieras FLEET
        $('.fl_nv_otro').hide(); //CLASE ¿Qué producto? FLEET
        $('.fl_nv_razon_ni').hide(); //CLASE Razón No se encuentra interesado FLEET
        if ($('.chk_fl_nv')[0] != undefined) {
            if ($('.chk_fl_nv')[0].checked) { //CHECK - CLASE No Viable FLEET
                $('.fl_nv_razon').show(); //MUESTRA - CLASE Razón de Lead no viable FLEET
            }
        }
    },
    //FUNCION DE PRODUCTO FLEET PARA LAS DEPENDENCIAS DE LOS CAMPOS
    dependenciasFleet: function () {

        if ($('.chk_fl_nv')[0] != undefined) {
            // CLASE DE list_fl_nv_razon -LISTA - Razón de Lead no viable FLEET
            if (($('.list_fl_nv_razon').select2('val') == "Fuera de Perfil" || $('.list_fl_nv_razon option:selected').text() == "Fuera de Perfil" || $('.list_fl_nv_razon')[0].innerText.trim() == "Fuera de Perfil") && $('.chk_fl_nv')[0].checked) {
                $('.fl_nv_razon_fp').show(); //CLASE DIV Fuera de Perfil (Razón)
            } else {
                $('.fl_nv_razon_fp').hide(); //CLASE DIV Fuera de Perfil (Razón)
                $('.list_fl_nv_razon_fp').select2('val', ""); //CLASE LISTA Fuera de Perfil (Razón)
            }
            // CLASE DE list_fl_nv_razon -LISTA - Razón de Lead no viable FLEET
            if (($('.list_fl_nv_razon').select2('val') == "Ya está con la competencia" || $('.list_fl_nv_razon option:selected').text() == "Ya está con la competencia" || $('.list_fl_nv_razon')[0].innerText.trim() == "Ya está con la competencia" || $('.list_fl_nv_razon option:selected').text() == "Ya está con la competencia") && $('.chk_fl_nv')[0].checked) {
                $('.fl_nv_quien').show(); //CLASE DIV ¿Quién? TEXTO
                $('.fl_nv_porque').show(); //CLASE DIV ¿Por qué? TEXTO
            } else {
                $('.fl_nv_quien').hide(); //CLASE DIV ¿Quién? TEXTO
                $('.fl_nv_porque').hide(); //CLASE DIV ¿Por qué? TEXTO
                $('.txt_fl_nv_quien').val(""); //CLASE DIV ¿Quién? TEXTO
                $('.txt_fl_nv_porque').val(""); //CLASE DIV ¿Por qué? TEXTO
            }
            // CLASE DE list_fl_nv_razon -LISTA - Razón de Lead no viable FLEET
            if (($('.list_fl_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_fl_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_fl_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && $('.chk_fl_nv')[0].checked) {
                $('.fl_nv_producto').show(); //clase lista - ¿Qué producto?
            } else {
                $('.fl_nv_producto').hide(); //clase lista - ¿Qué producto?
                $('.list_fl_nv_producto').select2('val', ""); //clase lista - ¿Qué producto?
            }
            // CLASE DE list_fl_nv_razon -LISTA - Razón de Lead no viable FLEET
            if (($('.list_fl_nv_razon').select2('val') == "Condiciones Financieras" || $('.list_fl_nv_razon option:selected').text() == "Condiciones Financieras" || $('.list_fl_nv_razon')[0].innerText.trim() == "Condiciones Financieras") && $('.chk_fl_nv')[0].checked) {
                $('.fl_nv_razon_cf').show(); //clase lista Condiciones Financieras
            } else {
                $('.fl_nv_razon_cf').hide(); //clase lista Condiciones Financieras
                $('.list_fl_nv_razon_cf').select2('val', ""); //clase lista Condiciones Financieras
            }
            // CLASE DE list_l_nv_razon -LISTA - Razón de Lead no viable FLEET
            if (($('.list_fl_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_fl_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_fl_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && ($('.list_fl_nv_producto').select2('val') == "Otro" || $('.list_fl_nv_producto option:selected').text() == "Otro" || $('.list_fl_nv_producto')[0].innerText.trim() == "Otro") && $('.chk_fl_nv')[0].checked) {
                $('.fl_nv_otro').show(); //TEXTO CLASE ¿Qué producto?
            } else {
                $('.fl_nv_otro').hide(); //TEXTO CLASE ¿Qué producto?
                $('.txt_fl_nv_otro').val(""); //TEXTO CLASE ¿Qué producto?
            }
            // CLASE DE list_fl_nv_razon -LISTA - Razón de Lead no viable FLEET
            if (($('.list_fl_nv_razon').select2('val') == "No se encuentra interesado" || $('.list_fl_nv_razon option:selected').text() == "No se encuentra interesado" || $('.list_fl_nv_razon')[0].innerText.trim() == "No se encuentra interesado") && $('.chk_fl_nv')[0].checked) {
                $('.fl_nv_razon_ni').show(); //LISTA Razón No se encuentra interesado
            } else {
                $('.fl_nv_razon_ni').hide(); //LISTA Razón No se encuentra interesado
                $('.list_fl_nv_razon_ni').select2('val', ""); //LISTA Razón No se encuentra interesado
            }
        }
    },

    /*************************************PRODUCTO UNICLICK*********************************************/
    MuestraCamposUniclick: function () {
        $('.u_nv_razon').hide(); //CLASE Razón de Lead no viable UNICLICK
        $('.u_nv_razon_fp').hide(); //CLASE Fuera de Perfil (Razón) UNICLICK
        $('.u_nv_quien').hide(); //CLASE ¿Quién? UNICLICK
        $('.u_nv_porque').hide(); //CLASE ¿Por qué? UNICLICK
        $('.u_nv_producto').hide(); //CLASE ¿Qué producto? UNICLICK
        $('.u_nv_razon_cf').hide(); //CLASE Condiciones Financieras UNICLICK
        $('.u_nv_otro').hide(); //CLASE ¿Qué producto? UNICLICK
        $('.u_nv_razon_ni').hide(); //CLASE Razón No se encuentra interesado UNICLICK
        if ($('.chk_u_nv')[0] != undefined) {
            if ($('.chk_u_nv')[0].checked) { //CHECK - CLASE No Viable UNICLICK
                $('.u_nv_razon').show(); //MUESTRA - CLASE Razón de Lead no viable UNICLICK
            }
        }
    },
    //FUNCION DE PRODUCTO UNICLICK PARA LAS DEPENDENCIAS DE LOS CAMPOS
    dependenciasUniclick: function () {

        if ($('.chk_u_nv')[0] != undefined) {
            // CLASE DE list_u_nv_razon -LISTA - Razón de Lead no viable UNICLICK
            if (($('.list_u_nv_razon').select2('val') == "Fuera de Perfil" || $('.list_u_nv_razon option:selected').text() == "Fuera de Perfil" || $('.list_u_nv_razon')[0].innerText.trim() == "Fuera de Perfil") && $('.chk_u_nv')[0].checked) {
                $('.u_nv_razon_fp').show(); //CLASE DIV Fuera de Perfil (Razón)
            } else {
                $('.u_nv_razon_fp').hide(); //CLASE DIV Fuera de Perfil (Razón)
                $('.list_u_nv_razon_fp').select2('val', ""); //CLASE LISTA Fuera de Perfil (Razón)
            }
            // CLASE DE list_u_nv_razon -LISTA - Razón de Lead no viable UNICLICK
            if (($('.list_u_nv_razon').select2('val') == "Ya está con la competencia" || $('.list_u_nv_razon option:selected').text() == "Ya está con la competencia" || $('.list_u_nv_razon')[0].innerText.trim() == "Ya está con la competencia" || $('.list_u_nv_razon option:selected').text() == "Ya está con la competencia") && $('.chk_u_nv')[0].checked) {
                $('.u_nv_quien').show(); //CLASE DIV ¿Quién? TEXTO
                $('.u_nv_porque').show(); //CLASE DIV ¿Por qué? TEXTO
            } else {
                $('.u_nv_quien').hide(); //CLASE DIV ¿Quién? TEXTO
                $('.u_nv_porque').hide(); //CLASE DIV ¿Por qué? TEXTO
                $('.txt_u_nv_quien').val(""); //CLASE DIV ¿Quién? TEXTO
                $('.txt_u_nv_porque').val(""); //CLASE DIV ¿Por qué? TEXTO
            }
            // CLASE DE list_u_nv_razon -LISTA - Razón de Lead no viable UNICLICK
            if (($('.list_u_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_u_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_u_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && $('.chk_u_nv')[0].checked) {
                $('.u_nv_producto').show(); //clase lista - ¿Qué producto?
            } else {
                $('.u_nv_producto').hide(); //clase lista - ¿Qué producto?
                $('.list_u_nv_producto').select2('val', ""); //clase lista - ¿Qué producto?
            }
            // CLASE DE list_u_nv_razon -LISTA - Razón de Lead no viable UNICLICK
            if (($('.list_u_nv_razon').select2('val') == "Condiciones Financieras" || $('.list_u_nv_razon option:selected').text() == "Condiciones Financieras" || $('.list_u_nv_razon')[0].innerText.trim() == "Condiciones Financieras") && $('.chk_u_nv')[0].checked) {
                $('.u_nv_razon_cf').show(); //clase lista Condiciones Financieras
            } else {
                $('.u_nv_razon_cf').hide(); //clase lista Condiciones Financieras
                $('.list_u_nv_razon_cf').select2('val', ""); //clase lista Condiciones Financieras
            }
            // CLASE DE list_u_nv_razon -LISTA - Razón de Lead no viable UNICLICK
            if (($('.list_u_nv_razon').select2('val') == "No tenemos el producto que requiere" || $('.list_u_nv_razon option:selected').text() == "No tenemos el producto que requiere" || $('.list_u_nv_razon')[0].innerText.trim() == "No tenemos el producto que requiere") && ($('.list_u_nv_producto').select2('val') == "Otro" || $('.list_u_nv_producto option:selected').text() == "Otro" || $('.list_u_nv_producto')[0].innerText.trim() == "Otro") && $('.chk_u_nv')[0].checked) {
                $('.u_nv_otro').show(); //TEXTO CLASE ¿Qué producto?
            } else {
                $('.u_nv_otro').hide(); //TEXTO CLASE ¿Qué producto?
                $('.txt_u_nv_otro').val(""); //TEXTO CLASE ¿Qué producto?
            }
            // CLASE DE list_u_nv_razon -LISTA - Razón de Lead no viable UNICLICK
            if (($('.list_u_nv_razon').select2('val') == "No se encuentra interesado" || $('.list_u_nv_razon option:selected').text() == "No se encuentra interesado" || $('.list_u_nv_razon')[0].innerText.trim() == "No se encuentra interesado") && $('.chk_u_nv')[0].checked) {
                $('.u_nv_razon_ni').show(); //LISTA Razón No se encuentra interesado
            } else {
                $('.u_nv_razon_ni').hide(); //LISTA Razón No se encuentra interesado
                $('.list_u_nv_razon_ni').select2('val', ""); //LISTA Razón No se encuentra interesado
            }
        }
    },

    //Funcion para habilitar la funcionalidad de los checks de cada producto dependiendo del producto que tenga el usuario logueado.
    nvproductos: function () {
        var productos = App.user.attributes.productos_c; //USUARIOS CON LOS SIGUIENTES PRODUCTOS
        if (productos.includes("1") && cont_uni_p.action == "edit") { //PRODUCTO LEASING
            $('[data-field="chk_l_nv"]').attr('style', 'pointer-events:block;');
            if (app.user.attributes.multilinea_c == 1 ) {
                $('[data-field="chk_ls_multi"]').attr('style', 'pointer-events:block;');
            }
        }
        if (productos.includes("4") && cont_uni_p.action == "edit") {  //PRODUCTO FACTORAJE
            $('[data-field="chk_f_nv"]').attr('style', 'pointer-events:block;');
            if (app.user.attributes.multilinea_c == 1 ) {
                $('[data-field="chk_fac_multi"]').attr('style', 'pointer-events:block;');
            }
        }
        if (productos.includes("3") && cont_uni_p.action == "edit") { //PRODUCTO CREDITO AUTOMOTRIZ
            $('[data-field="chk_ca_nv"]').attr('style', 'pointer-events:block;');
            if (app.user.attributes.multilinea_c == 1) {
                $('[data-field="chk_ca_multi"]').attr('style', 'pointer-events:block;');
            }
        }
        if (productos.includes("6") && cont_uni_p.action == "edit") { //PRODUCTO FLEET
            $('[data-field="chk_fl_nv"]').attr('style', 'pointer-events:block;');
            if (app.user.attributes.multilinea_c == 1 ) {
                $('[data-field="chk_fe_multi"]').attr('style', 'pointer-events:block;');
            }
        }
        if (productos.includes("8") && cont_uni_p.action == "edit") { //PRODUCTO UNICLICK
            $('[data-field="chk_u_nv"]').attr('style', 'pointer-events:block;');
            if (app.user.attributes.multilinea_c == 1 ) {
                $('[data-field="chk_uniclick_multi"]').attr('style', 'pointer-events:block;');
            }
        }
    },

    SaveUniProductos: function (fields, errors, callback) {
		if (cont_uni_p.ResumenProductos == undefined) {
			cont_uni_p.ResumenProductos = contexto_cuenta.ResumenProductos;
		}
        if (cont_uni_p.ResumenProductos != undefined) {
            //Valida tipo de cuenta
            var guardaL = false;
            var guardaF = false;
            var guardaCA = false;
            var guardaFL = false;
            var guardaU = false;
            //Valida Leasing TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.leasing.tipo_cuenta == 1 || cont_uni_p.ResumenProductos.leasing.subtipo_cuenta == 2 || cont_uni_p.ResumenProductos.leasing.subtipo_cuenta == 7) {
                guardaL = true;
            }
            //Valida Factoraje TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.factoring.tipo_cuenta == 1 || cont_uni_p.ResumenProductos.factoring.subtipo_cuenta == 2 || cont_uni_p.ResumenProductos.factoring.subtipo_cuenta == 7) {
                guardaF = true;
            }
            //Valida CA TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.credito_auto.tipo_cuenta == 1 || cont_uni_p.ResumenProductos.credito_auto.subtipo_cuenta == 2 || cont_uni_p.ResumenProductos.credito_auto.subtipo_cuenta == 7) {
                guardaCA = true;
            }
            //Valida FLEET TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.fleet.tipo_cuenta == 1 || cont_uni_p.ResumenProductos.fleet.subtipo_cuenta == 2 || cont_uni_p.ResumenProductos.fleet.subtipo_cuenta == 7) {
                guardaFL = true;
            }
            //Valida UNICLICK TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.uniclick.tipo_cuenta == 1 || cont_uni_p.ResumenProductos.uniclick.subtipo_cuenta == 2 || cont_uni_p.ResumenProductos.uniclick.subtipo_cuenta == 7) {
                guardaU = true;
            }

            //Evalua guardado de No viable
            if ((guardaL || guardaF || guardaCA || guardaFL || guardaU) && this.model.get('id') != "" && this.model.get('id') != undefined && Object.entries(errors).length == 0) {
                //Mapea los campos del modulo UNI PRODUCTOS con producto LEASING en el objeto cont_uni_p.leadNoViable
                if ($('.chk_l_nv')[0] != undefined) {
                    if ($('.chk_l_nv')[0].checked == true && typeof $('.list_l_nv_razon').select2('val') == "string") {
                        cont_uni_p.ResumenProductos.leasing.no_viable = $('.chk_l_nv')[0].checked; //check No Viable Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_razon = $('.list_l_nv_razon').select2('val'); //lista Razón de Lead no viable Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_razon_fp = $('.list_l_nv_razon_fp').select2('val'); //lista Fuera de Perfil (Razón) Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_quien = $('.txt_l_nv_quien').val().trim(); //texto ¿Quién? Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_porque = $('.txt_l_nv_porque').val().trim(); //texto ¿Por qué? Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_producto = $('.list_l_nv_producto').select2('val'); //lista ¿Qué producto? Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_razon_cf = $('.list_l_nv_razon_cf').select2('val'); //lista Condiciones Financieras Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_otro_c = $('.txt_l_nv_otro').val().trim(); //texto ¿Qué producto? Leasing
                        cont_uni_p.ResumenProductos.leasing.no_viable_razon_ni = $('.list_l_nv_razon_ni').select2('val'); //lista Razón No se encuentra interesado Leasing
                        this.tipoProducto.leasing = cont_uni_p.ResumenProductos.leasing;
                    }
                }
                //Mapea los campos del modulo UNI PRODUCTOS con producto FACTORAJE en el objeto cont_uni_p.leadNoViable
                if ($('.chk_f_nv')[0] != undefined) {
                    if ($('.chk_f_nv')[0].checked == true && typeof $('.list_f_nv_razon').select2('val') == "string") {

                        cont_uni_p.ResumenProductos.factoring.no_viable = $('.chk_f_nv')[0].checked; //check No Viable Factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_razon = $('.list_f_nv_razon').select2('val'); //Razón de Lead no viable factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_razon_fp = $('.list_f_nv_razon_fp').select2('val'); //lista Fuera de Perfil (Razón) factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_quien = $('.txt_f_nv_quien').val().trim(); //texto ¿Quién? factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_porque = $('.txt_f_nv_porque').val().trim(); //texto ¿Por qué? factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_producto = $('.list_f_nv_producto').select2('val'); //lista ¿Qué producto? factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_razon_cf = $('.list_f_nv_razon_cf').select2('val'); //lista Condiciones Financieras factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_otro_c = $('.txt_f_nv_otro').val().trim(); //texto ¿Qué producto? factoraje
                        cont_uni_p.ResumenProductos.factoring.no_viable_razon_ni = $('.list_f_nv_razon_ni').select2('val'); //lista Razón No se encuentra interesado factoraje

                        this.tipoProducto.factoring = cont_uni_p.ResumenProductos.factoring;
                    }
                }
                //Mapea los campos del modulo UNI PRODUCTOS con producto CREDITO AUTOMOTRIZ en el objeto cont_uni_p.leadNoViable
                if ($('.chk_ca_nv')[0] != undefined) {
                    if ($('.chk_ca_nv')[0].checked == true && typeof $('.list_ca_nv_razon').select2('val') == "string") {

                        cont_uni_p.ResumenProductos.credito_auto.no_viable = $('.chk_ca_nv')[0].checked; //check No Viable Crédito Automotriz
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_razon = $('.list_ca_nv_razon').select2('val'); //Razón de Lead no viable CA
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_razon_fp = $('.list_ca_nv_razon_fp').select2('val');  //lista Fuera de Perfil (Razón) CA
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_quien = $('.txt_ca_nv_quien').val().trim(); //texto ¿Quién? CA
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_porque = $('.txt_ca_nv_porque').val().trim(); //texto ¿Por qué? CA
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_producto = $('.list_ca_nv_producto').select2('val'); //lista ¿Qué producto?  CA
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_razon_cf = $('.list_ca_nv_razon_cf').select2('val');  //lista Condiciones Financieras CA
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_otro_c = $('.txt_ca_nv_otro').val().trim(); //texto ¿Qué producto? CA
                        cont_uni_p.ResumenProductos.credito_auto.no_viable_razon_ni = $('.list_ca_nv_razon_ni').select2('val'); //lista Razón No se encuentra interesado CA

                        this.tipoProducto.credito_auto = cont_uni_p.ResumenProductos.credito_auto;
                    }
                }
                //Mapea los campos del modulo UNI PRODUCTOS con producto FLEET en el objeto cont_uni_p.leadNoViable
                if ($('.chk_fl_nv')[0] != undefined) {
                    if ($('.chk_fl_nv')[0].checked == true && typeof $('.list_fl_nv_razon').select2('val') == "string") {

                        cont_uni_p.ResumenProductos.fleet.no_viable = $('.chk_fl_nv')[0].checked; //check No Viable Crédito Automotriz
                        cont_uni_p.ResumenProductos.fleet.no_viable_razon = $('.list_fl_nv_razon').select2('val'); //Razón de Lead no viable CA
                        cont_uni_p.ResumenProductos.fleet.no_viable_razon_fp = $('.list_fl_nv_razon_fp').select2('val');  //lista Fuera de Perfil (Razón) CA
                        cont_uni_p.ResumenProductos.fleet.no_viable_quien = $('.txt_fl_nv_quien').val().trim(); //texto ¿Quién? CA
                        cont_uni_p.ResumenProductos.fleet.no_viable_porque = $('.txt_fl_nv_porque').val().trim(); //texto ¿Por qué? CA
                        cont_uni_p.ResumenProductos.fleet.no_viable_producto = $('.list_fl_nv_producto').select2('val'); //lista ¿Qué producto?  CA
                        cont_uni_p.ResumenProductos.fleet.no_viable_razon_cf = $('.list_fl_nv_razon_cf').select2('val');  //lista Condiciones Financieras CA
                        cont_uni_p.ResumenProductos.fleet.no_viable_otro_c = $('.txt_fl_nv_otro').val().trim();  //texto ¿Qué producto? CA
                        cont_uni_p.ResumenProductos.fleet.no_viable_razon_ni = $('.list_fl_nv_razon_ni').select2('val'); //lista Razón No se encuentra interesado CA

                        this.tipoProducto.fleet = cont_uni_p.ResumenProductos.fleet;
                    }
                }
                //Mapea los campos del modulo UNI PRODUCTOS con producto UNICLICK en el objeto cont_uni_p.leadNoViable
                if ($('.chk_u_nv')[0] != undefined) {
                    if ($('.chk_u_nv')[0].checked == true && typeof $('.list_u_nv_razon').select2('val') == "string") {

                        cont_uni_p.ResumenProductos.uniclick.no_viable = $('.chk_u_nv')[0].checked; //check No Viable Crédito Automotriz
                        cont_uni_p.ResumenProductos.uniclick.no_viable_razon = $('.list_u_nv_razon').select2('val'); //Razón de Lead no viable CA
                        cont_uni_p.ResumenProductos.uniclick.no_viable_razon_fp = $('.list_u_nv_razon_fp').select2('val');  //lista Fuera de Perfil (Razón) CA
                        cont_uni_p.ResumenProductos.uniclick.no_viable_quien = $('.txt_u_nv_quien').val().trim(); //texto ¿Quién? CA
                        cont_uni_p.ResumenProductos.uniclick.no_viable_porque = $('.txt_u_nv_porque').val().trim(); //texto ¿Por qué? CA
                        cont_uni_p.ResumenProductos.uniclick.no_viable_producto = $('.list_u_nv_producto').select2('val'); //lista ¿Qué producto?  CA
                        cont_uni_p.ResumenProductos.uniclick.no_viable_razon_cf = $('.list_u_nv_razon_cf').select2('val');  //lista Condiciones Financieras CA
                        cont_uni_p.ResumenProductos.uniclick.no_viable_otro_c = $('.txt_u_nv_otro').val().trim();  //texto ¿Qué producto? CA
                        cont_uni_p.ResumenProductos.uniclick.no_viable_razon_ni = $('.list_u_nv_razon_ni').select2('val'); //lista Razón No se encuentra interesado CA

                        this.tipoProducto.uniclick = cont_uni_p.ResumenProductos.uniclick;
                    }
                }

                this.model.set('account_uni_productos', this.tipoProducto);
            }


        }

        if (contexto_cuenta.createMode) {
            //this.tipoProducto.uniclick = cont_uni_p.ResumenProductos.uniclick;
            if (this.tipoProducto.uniclick != null && typeof (this.$('.list_u_canal').select2('val')) == "string") {
                this.tipoProducto.uniclick.canal_c = $('.list_u_canal').select2('val'); //lista Canal uniclcick
                //Establece el objeto para guardar
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            // Asigna multilinea_c value
            if (this.tipoProducto.leasing != null) {
                this.tipoProducto.leasing.multilinea_c = $('.chk_ls_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);

            }
            if (this.tipoProducto.factoring != null) {
                //    this.tipoProducto.factoring = cont_uni_p.ResumenProductos.factoring
                this.tipoProducto.factoring.multilinea_c = $('.chk_fac_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if (this.tipoProducto.credito_auto != null) {
                //    this.tipoProducto.credito_auto = cont_uni_p.ResumenProductos.credito_auto
                this.tipoProducto.credito_auto.multilinea_c = $('.chk_ca_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if (this.tipoProducto.fleet != null) {
                //    this.tipoProducto.fleet = cont_uni_p.ResumenProductos.fleet
                this.tipoProducto.fleet.multilinea_c = $('.chk_fe_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if (this.tipoProducto.uniclick != null) {
                //this.tipoProducto.uniclick = cont_uni_p.ResumenProductos.leasing
                this.tipoProducto.uniclick.multilinea_c = $('.chk_uniclick_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }


        }
        else {
            if (this.tipoProducto.uniclick != null && typeof (this.$('.list_u_canal').select2('val')) == "string") {
                this.tipoProducto.uniclick = cont_uni_p.ResumenProductos.uniclick;
                this.tipoProducto.uniclick.canal_c = $('.list_u_canal').select2('val');
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            // Asigna multilinea_c value
            if ($('.chk_ls_multi')[0] != undefined) {
                this.tipoProducto.leasing = cont_uni_p.ResumenProductos.leasing
                this.tipoProducto.leasing.multilinea_c = $('.chk_ls_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if ($('.chk_fac_multi')[0] != undefined) {
                this.tipoProducto.factoring = cont_uni_p.ResumenProductos.factoring
                this.tipoProducto.factoring.multilinea_c = $('.chk_fac_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if ($('.chk_ca_multi')[0] != undefined) {
                this.tipoProducto.credito_auto = cont_uni_p.ResumenProductos.credito_auto
                this.tipoProducto.credito_auto.multilinea_c = $('.chk_ca_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if ($('.chk_fe_multi')[0] != undefined) {
                this.tipoProducto.fleet = cont_uni_p.ResumenProductos.fleet
                this.tipoProducto.fleet.multilinea_c = $('.chk_fe_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if ($('.chk_uniclick_multi')[0] != undefined) {
                //this.tipoProducto.uniclick = cont_uni_p.ResumenProductos.leasing
                this.tipoProducto.uniclick.multilinea_c = $('.chk_uniclick_multi')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }
            if($('.chk_ls_excluir')[0]!=undefined){
               //Check Excluir Pre-Calificación
                this.tipoProducto.leasing.exclu_precalif_c = $('.chk_ls_excluir')[0].checked;
                cont_uni_p.ResumenProductos.leasing.exclu_precalif_c=$('.chk_ls_excluir')[0].checked;
                this.model.set('account_uni_productos', this.tipoProducto);
            }

        }

        callback(null, fields, errors);
    },

    //Validación para dejar sin editar los campos de producto después de haberlos editado por primera y única vez.
    noeditables: function () {
        // Declara variables para permitir edición
        var editaL = true;
        var editaF = true;
        var editaCA = true;
        var editaFL = true;
        var editaU = true;
        // Valida tipo de cuenta por producto
        if (cont_uni_p.ResumenProductos != undefined) {
            //Valida Leasing TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.leasing.tipo_cuenta != 1 && cont_uni_p.ResumenProductos.leasing.subtipo_cuenta != 2 && cont_uni_p.ResumenProductos.leasing.subtipo_cuenta != 7 && this.model.get('user_id_c') != App.user.id) {
                editaL = false;
            }
            //Valida Factoraje TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.factoring.tipo_cuenta != 1 && cont_uni_p.ResumenProductos.factoring.subtipo_cuenta != 2 && cont_uni_p.ResumenProductos.factoring.subtipo_cuenta != 7 && this.model.get('user_id1_c') != App.user.id) {
                editaF = false;
            }
            //Valida CA TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.credito_auto.tipo_cuenta != 1 && cont_uni_p.ResumenProductos.credito_auto.subtipo_cuenta != 2 && cont_uni_p.ResumenProductos.credito_auto.subtipo_cuenta != 7 && this.model.get('user_id2_c') != App.user.id) {
                editaCA = false;
            }
            //Valida FLEET TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.fleet.tipo_cuenta != 1 && cont_uni_p.ResumenProductos.fleet.subtipo_cuenta != 2 && cont_uni_p.ResumenProductos.fleet.subtipo_cuenta != 7 && this.model.get('user_id6_c') != App.user.id) {
                editaFL = false;
            }
            //Valida UNICLICK TIPO CUENTA 1-LEAD - SUBTIPO CUENTA 2-CONTACTADO - SUBTIPO CUENTA 7-INTERESADO
            if (cont_uni_p.ResumenProductos.uniclick.tipo_cuenta != 1 && cont_uni_p.ResumenProductos.uniclick.subtipo_cuenta != 2 && cont_uni_p.ResumenProductos.uniclick.subtipo_cuenta != 7 && this.model.get('user_id7_c') != App.user.id) {
                editaU = false;
            }
        }
        // Evalua condiciones para bloquear edición
        if ($('.chk_l_nv')[0] != undefined) {
            if ($('.chk_l_nv')[0].checked || !editaL) {
                //Campos sin editar Leasing
                $('.chk_l_nv').prop("disabled", true);  //No Viable Leasing LEASING
                $('.list_l_nv_razon').prop("disabled", true); //Razón de Lead no viable LEASING
                $('.list_l_nv_razon_fp').prop("disabled", true); //Fuera de Perfil (Razón) LEASING
                $('.txt_l_nv_quien').prop("disabled", true); //¿Quién? LEASING
                $('.txt_l_nv_porque').prop("disabled", true);  //¿Por qué? LEASING
                $('.list_l_nv_producto').prop("disabled", true); // ¿Qué producto? LEASING
                $('.list_l_nv_razon_cf').prop("disabled", true); //Condiciones Financieras LEASING
                $('.txt_l_nv_otro').prop("disabled", true);   // TXT ¿Qué producto? LEASING
                $('.list_l_nv_razon_ni').prop("disabled", true);  // Razón No se encuentra interesado LEASING
            }
        }
        if ($('.chk_f_nv')[0] != undefined) {
            if ($('.chk_f_nv')[0].checked || !editaF) {
                //Campos sin editar Factoraje
                $('.chk_f_nv').prop("disabled", true); //No Viable Leasing FACTORAJE
                $('.list_f_nv_razon').prop("disabled", true); //Razón de Lead no viable FACTORAJE
                $('.list_f_nv_razon_fp').prop("disabled", true); //Fuera de Perfil (Razón) FACTORAJE
                $('.txt_f_nv_quien').prop("disabled", true); //¿Quién? FACTORAJE
                $('.txt_f_nv_porque').prop("disabled", true); //¿Por qué? FACTORAJE
                $('.list_f_nv_producto').prop("disabled", true); // ¿Qué producto? FACTORAJE
                $('.list_f_nv_razon_cf').prop("disabled", true); //Condiciones Financieras FACTORAJE
                $('.txt_f_nv_otro').prop("disabled", true); // TXT ¿Qué producto? FACTORAJE
                $('.list_f_nv_razon_ni').prop("disabled", true); // Razón No se encuentra interesado FACTORAJE
            }
        }
        if ($('.chk_ca_nv')[0] != undefined) {
            if ($('.chk_ca_nv')[0].checked || !editaCA) {
                //Campos sin editar Credito Automotriz
                $('.chk_ca_nv').prop("disabled", true); //No Viable Leasing CA
                $('.list_ca_nv_razon').prop("disabled", true); //Razón de Lead no viable CA
                $('.list_ca_nv_razon_fp').prop("disabled", true); //Fuera de Perfil (Razón) CA
                $('.txt_ca_nv_quien').prop("disabled", true); //¿Quién? CA
                $('.txt_ca_nv_porque').prop("disabled", true); //¿Por qué? CA
                $('.list_ca_nv_producto').prop("disabled", true); // ¿Qué producto? CA
                $('.list_ca_nv_razon_cf').prop("disabled", true); //Condiciones Financieras CA
                $('.txt_ca_nv_otro').prop("disabled", true); // TXT ¿Qué producto? CA
                $('.list_ca_nv_razon_ni').prop("disabled", true); // Razón No se encuentra interesado CA
            }
        }
        if ($('.chk_fl_nv')[0] != undefined) {
            if ($('.chk_fl_nv')[0].checked || !editaFL) {
                //Campos sin editar Fleet
                $('.chk_fl_nv').prop("disabled", true); //No Viable Leasing FLEET
                $('.list_fl_nv_razon').prop("disabled", true); //Razón de Lead no viable FLEET
                $('.list_fl_nv_razon_fp').prop("disabled", true); //Fuera de Perfil (Razón) FLEET
                $('.txt_fl_nv_quien').prop("disabled", true); //¿Quién? FLEET
                $('.txt_fl_nv_porque').prop("disabled", true); //¿Por qué? FLEET
                $('.list_fl_nv_producto').prop("disabled", true); // ¿Qué producto? FLEET
                $('.list_fl_nv_razon_cf').prop("disabled", true); //Condiciones Financieras FLEET
                $('.txt_fl_nv_otro').prop("disabled", true); // TXT ¿Qué producto? FLEET
                $('.list_fl_nv_razon_ni').prop("disabled", true); // Razón No se encuentra interesado FLEET
            }
        }
        if ($('.chk_u_nv')[0] != undefined) {
            if ($('.chk_u_nv')[0].checked || !editaU) {
                //Campos sin editar Uniclick
                $('.chk_u_nv').prop("disabled", true); //No Viable Leasing Uniclick
                $('.list_u_nv_razon').prop("disabled", true); //Razón de Lead no viable Uniclick
                $('.list_u_nv_razon_fp').prop("disabled", true); //Fuera de Perfil (Razón) Uniclick
                $('.txt_u_nv_quien').prop("disabled", true); //¿Quién? Uniclick
                $('.txt_u_nv_porque').prop("disabled", true); //¿Por qué? Uniclick
                $('.list_u_nv_producto').prop("disabled", true); // ¿Qué producto? Uniclick
                $('.list_u_nv_razon_cf').prop("disabled", true); //Condiciones Financieras Uniclick
                $('.txt_u_nv_otro').prop("disabled", true); // TXT ¿Qué producto? Uniclick
                $('.list_u_nv_razon_ni').prop("disabled", true); // Razón No se encuentra interesado Uniclick
            }
        }
    },

    //Carga las listas desplegables para los campos.
    cargalistas: function () {
        cont_uni_p.razones_ddw_list = app.lang.getAppListStrings('razones_ddw_list');
        cont_uni_p.fuera_de_perfil_ddw_list = app.lang.getAppListStrings('fuera_de_perfil_ddw_list');
        cont_uni_p.no_producto_requiere_list = app.lang.getAppListStrings('no_producto_requiere_list');
        cont_uni_p.razones_cf_list = app.lang.getAppListStrings('razones_cf_list');
        cont_uni_p.tct_razon_ni_l_ddw_c_list = app.lang.getAppListStrings('tct_razon_ni_l_ddw_c_list');
        cont_uni_p.canales_ddw_list = app.lang.getAppListStrings('canal_list');

    },

    //Funcion que acepta solo letras (a-z), puntos(.) y comas(,)
    PuroTexto: function (evt) {
        //console.log(evt.keyCode);
        if ($.inArray(evt.keyCode, [9, 16, 17, 110, 190, 45, 33, 36, 46, 35, 34, 8, 9, 20, 16, 17, 37, 40, 39, 38, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 16, 32, 192]) < 0) {
            if (evt.keyCode != 186) {
                app.alert.show("Caracter Invalido", {
                    level: "error",
                    title: "Solo texto es permitido en este campo.",
                    autoClose: true
                });
                return false;
            }
        }
    },
})
