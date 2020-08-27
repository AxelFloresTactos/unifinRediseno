({
    //Carga de Listas de valores
    actividadeconomica_list: null,
    subsectoreconomico_list: null,
    sectoreconomico_list: null,
    tct_macro_sector_ddw_list: null,
    inegi_rama_list: null,
    inegi_subrama_list: null,
    inegi_sector_list: null,
    inegi_subsector_list: null,
    inegi_clase_list: null,
    inegi_descripcion_list: null,

    initialize: function (options) {
        //Inicializa campo custom
        this._super('initialize', [options]);
        options = options || {};
        options.def = options.def || {};
        clasf_sectorial = this;

        //Guarda valores en los campos de clasificacion sectorial
        this.model.addValidationTask('GuardaClasfSectorial', _.bind(this.SaveClasfSectorial, this));
        this.model.on('sync', this.loadData, this);
        clasf_sectorial.renderlista = 0;
        clasf_sectorial.check_uni2 = 0;

        this.ActividadEconomica = {
            'combinaciones': '',
            'ae': {
                'id': '',
            },
            'sse': {
                'id': '',
            },
            'se': {
                'id': '',
            },
            'ms': {
                'id': '',
            },
            'inegi_sector': '',
            'inegi_subsector': '',
            'inegi_rama': '',
            'inegi_subrama': '',
            'inegi_clase': '',
            'inegi_descripcion': ''
        };

        this.prevActEconomica = {
            'combinaciones': '',
            'ae': {
                'id': '',
            },
            'sse': {
                'id': '',
            },
            'se': {
                'id': '',
            },
            'ms': {
                'id': '',
            },
            'inegi_sector': '',
            'inegi_subsector': '',
            'inegi_rama': '',
            'inegi_subrama': '',
            'inegi_clase': '',
            'inegi_descripcion': ''
        };

        this.ResumenCliente = {
            'inegi': {
                'inegi_sector': '',
                'inegi_subsector': '',
                'inegi_rama': '',
                'inegi_subrama': '',
                'inegi_clase': '',
                'inegi_descripcion': ''
            }
        };
    },

    loadData: function () {
        clasf_sectorial = this;

        clasf_sectorial.ActividadEconomica.ae.id = this.model.get("actividadeconomica_c");
        clasf_sectorial.ActividadEconomica.sse.id = this.model.get("subsectoreconomico_c");
        clasf_sectorial.ActividadEconomica.se.id = this.model.get("sectoreconomico_c");
        clasf_sectorial.ActividadEconomica.ms.id = this.model.get("tct_macro_sector_ddw_c");

        clasf_sectorial['prevActEconomica'] = app.utils.deepCopy(clasf_sectorial.ActividadEconomica);
        clasf_sectorial.render();
        $('.list_ae').trigger('change');

        //Api ResumenCliente para los campos de INEGI
        var idCuenta = clasf_sectorial.model.id; //Id de la Cuenta
        if (idCuenta != '' && idCuenta != undefined && idCuenta != null && clasf_sectorial.prevActEconomica.inegi_sector == '') {
            var url = app.api.buildURL('ResumenCliente/' + idCuenta, null, null,);

            app.api.call('GET', url, {}, {
                success: function (data) {
                    clasf_sectorial.ResumenCliente = data;
                    clasf_sectorial.check_uni2 = clasf_sectorial.ResumenCliente.inegi.inegi_acualiza_uni2;

                    clasf_sectorial.ActividadEconomica.inegi_sector = clasf_sectorial.ResumenCliente.inegi.inegi_sector;
                    clasf_sectorial.ActividadEconomica.inegi_subsector = clasf_sectorial.ResumenCliente.inegi.inegi_subsector;
                    clasf_sectorial.ActividadEconomica.inegi_rama = clasf_sectorial.ResumenCliente.inegi.inegi_rama;
                    clasf_sectorial.ActividadEconomica.inegi_subrama = clasf_sectorial.ResumenCliente.inegi.inegi_subrama;
                    clasf_sectorial.ActividadEconomica.inegi_clase = clasf_sectorial.ResumenCliente.inegi.inegi_clase;
                    clasf_sectorial.ActividadEconomica.inegi_descripcion = clasf_sectorial.ResumenCliente.inegi.inegi_descripcion;

                    clasf_sectorial['prevActEconomica'] = app.utils.deepCopy(clasf_sectorial.ActividadEconomica);

                    _.extend(this, clasf_sectorial.ResumenCliente);
                    clasf_sectorial.render();
                }
            });
        }
    },

    bindDataChange: function () {
        this.model.on('change:' + this.name, function () {
            if (this.action !== 'edit') {
            }
        }, this);
    },

    _render: function () {
        this._super("_render");
        //campo custom account_clasf_sectorial ocualta la Etiqueta
        $("div.record-label[data-name='account_clasf_sectorial']").attr('style', 'display:none;');
        //funcion de cargar listas
        if (clasf_sectorial.renderlista != 1) {
            this.cargalistas();
        }
        //Funcion para dar estilo select2 a las listas deplegables.
        var $select = $('select.select2');
        $select.select2();
        //Muestra campos dependientes de Actividad Economica
        this.MuestraCamposAE();

        if (clasf_sectorial.check_uni2 != 0) {
            //Campos ReadOnly de Actividad Economica dependiendo del check de uni2
            $(".campoAE").attr('style', 'pointer-events:none;');
            $(".campoSSE").attr('style', 'pointer-events:none;');
            $(".campoSE").attr('style', 'pointer-events:none;');
            $(".campoMS").attr('style', 'pointer-events:none;');
        }

        //Campos INEGI de Solo Lectura 
        $(".campoIR").attr('style', 'pointer-events:none;');
        $(".campoISR").attr('style', 'pointer-events:none;');
        $(".campoIS").attr('style', 'pointer-events:none;');
        $(".campoISS").attr('style', 'pointer-events:none;');
        $(".campoIC").attr('style', 'pointer-events:none;');
        $(".campoID").attr('style', 'pointer-events:none;');

        //Carga los valores en los campos dependientes de Actividad Económica al momento de hacer el change
        $('.list_ae').change(function (evt) {
            clasf_sectorial.MuestraCamposAE();
            clasf_sectorial.ClasfSectorialApi(evt);
        });
        //carga los valores del sector dependientes del sub sector
        $('.list_sse').change(function (evt) {
            clasf_sectorial.obtenerSubSector();
        });
        //carga los valores del macrosector dependientes del sector
        $('.list_se').change(function (evt) {
            clasf_sectorial.obtenerSector();
        });
    },

    MuestraCamposAE: function () {
        //Muestra los campos dependientes de Actividad Economica
        if ($('.list_ae').select2('val') == "" || $('.list_ae')[0].innerText.trim() == "") {
            $('.campoSSE').hide();
            $('.campoSE').hide();
            $('.campoMS').hide();

        } else {
            $('.campoSSE').show();
            $('.campoSE').show();
            $('.campoMS').show();
        }
    },

    ClasfSectorialApi: function (evt) {

        clasf_sectorial = this;
        dataCS = [];
        var idActEconomica = "";

        if ($(evt.currentTarget).val() == '' || $(evt.currentTarget).val() == null || $(evt.currentTarget).val() == undefined) {
            idActEconomica = clasf_sectorial.ActividadEconomica.ae.id;
        } else {
            idActEconomica = $('.list_ae').select2('val');
        }
        // console.log("AE " + idActEconomica);
        if (idActEconomica != '' && idActEconomica != null && idActEconomica != undefined) {

            app.alert.show('obtiene_subsector', {
                level: 'process',
                title: 'Cargando...',
            });

            app.api.call('GET', app.api.buildURL('GetClasfSectorial/' + idActEconomica), null, {
                success: function (data) {
                    dataCS = data;
                    app.alert.dismiss('obtiene_subsector');
                    if (dataCS != '') {
                        clasf_sectorial['ActividadEconomica'] = dataCS;
                        clasf_sectorial.combinaciones = dataCS['combinaciones'];

                        var arrSubSector = [];
                        for (var key in clasf_sectorial.combinaciones) { //actividad economica
                            // console.log(key);
                            var contador = 0;
                            for (llave in clasf_sectorial.combinaciones[key]) {  //subsector economico
                                arrSubSector[contador] = llave;
                                contador++;
                            }
                        }

                        var lista_sse = clasf_sectorial.valorSubsector(arrSubSector);
                        clasf_sectorial.subsectoreconomico_list = lista_sse;
                        // clasf_sectorial.render();
                        $('.list_sse').trigger('change');
                        $('.list_se').trigger('change');
                    }
                },
                error: function (e) {
                    throw e;
                }
            });
        }
    },

    SaveClasfSectorial: function (fields, errors, callback) {

        if ($('.list_ae').select2('val') != '') {
            this.ActividadEconomica = clasf_sectorial.ActividadEconomica;
        }
        //Establece el objeto para guardar en los campos de Clasificacion Sectorial 
        this.model.set('account_clasf_sectorial', this.ActividadEconomica);

        callback(null, fields, errors);
    },

    valorSubsector: function (valores) {
        //Se obtiene el Subsector dependiendo de la Actividad Economica que le corresponde 
        var subsector_list = app.lang.getAppListStrings('subsectoreconomico_list');
        var newSubSector_list = {};
        for (var i = 0; i < valores.length; i++) {
            var element = valores[i];

            Object.keys(subsector_list).forEach(function (key) {

                if (key == element) {
                    newSubSector_list[key] = subsector_list[key];
                }
            });
        }
        return newSubSector_list;
    },

    obtenerSubSector: function () {
        //Se obtiene el ID del Subsector para setear el Sector que le corresponde
        var idActEconomica = clasf_sectorial.ActividadEconomica.ae.id;
        var idSubSector = clasf_sectorial.ActividadEconomica.sse.id;

        if (idActEconomica != '' && idActEconomica != undefined && idSubSector != '' && idSubSector != null && idSubSector != undefined) {

            var arrsector = clasf_sectorial.combinaciones[idActEconomica][idSubSector];
            var sector_list = app.lang.getAppListStrings('sectoreconomico_list');
            var newSector_list = {};

            for (var keys in arrsector) {
                var elemento = keys;
                // console.log(elemento);
                Object.keys(sector_list).forEach(function (key) {
                    if (key == elemento) {
                        newSector_list[key] = sector_list[key];
                    }
                });
            }

            clasf_sectorial.sectoreconomico_list = newSector_list;
            clasf_sectorial.renderlista = 1;
            clasf_sectorial.render();
            $('.list_sse').select2('val', idSubSector);
        }

        /*************************************************API INEGI*************************************************/
        app.alert.show('obtiene_INEGI', {
            level: 'process',
            title: 'Cargando...',
        });

        app.api.call('GET', app.api.buildURL('clasificacionSectorialCNVB/' + idActEconomica + '/' + idSubSector), null, {
            success: function (data) {
                dataInegi = data;
                app.alert.dismiss('obtiene_INEGI');
                // console.log(data);
                if (dataInegi != '') {
                    //Envia los valores de los campos de INEGI a la vista HBS
                    clasf_sectorial.ResumenCliente.inegi.inegi_sector = dataInegi['id_sector_inegi'];
                    clasf_sectorial.ResumenCliente.inegi.inegi_subsector = dataInegi['id_subsector_inegi'];
                    clasf_sectorial.ResumenCliente.inegi.inegi_rama = dataInegi['id_rama_inegi'];
                    clasf_sectorial.ResumenCliente.inegi.inegi_subrama = dataInegi['id_subrama_inegi'];
                    clasf_sectorial.ResumenCliente.inegi.inegi_clase = dataInegi['id_clase_inegi'];
                    clasf_sectorial.ResumenCliente.inegi.inegi_descripcion = dataInegi['id_descripcion_inegi'];
                    //Envia los valores al LH para guardarlos en el modulo de Resumen
                    clasf_sectorial.ActividadEconomica.inegi_sector = dataInegi['id_sector_inegi'];
                    clasf_sectorial.ActividadEconomica.inegi_subsector = dataInegi['id_subsector_inegi'];
                    clasf_sectorial.ActividadEconomica.inegi_rama = dataInegi['id_rama_inegi'];
                    clasf_sectorial.ActividadEconomica.inegi_subrama = dataInegi['id_subrama_inegi'];
                    clasf_sectorial.ActividadEconomica.inegi_clase = dataInegi['id_clase_inegi'];
                    clasf_sectorial.ActividadEconomica.inegi_descripcion = dataInegi['id_descripcion_inegi'];

                    clasf_sectorial.render();
                }
            },
            error: function (e) {
                throw e;
            }
        });
    },

    obtenerSector: function () {
        //Se obtiene el ID Sector para poder setear el Macro Sector que le corresponde
        var idActEconomica = clasf_sectorial.ActividadEconomica.ae.id;
        var idSubSector = clasf_sectorial.ActividadEconomica.sse.id;
        var idSector = clasf_sectorial.ActividadEconomica.se.id;

        if (idActEconomica != '' && idActEconomica != undefined && idSubSector != '' && idSubSector != undefined &&
            idSector != '' && idSector != null && idSector != undefined) {

            var arrmacro = clasf_sectorial.combinaciones[idActEconomica][idSubSector][idSector];
            var macro_list = app.lang.getAppListStrings('tct_macro_sector_ddw_list');
            var newMacro_list = {};

            for (var i = 0; i < arrmacro.length; i++) {
                var elementom = arrmacro[i];
                // console.log(elementom);
                Object.keys(macro_list).forEach(function (key) {

                    if (key == elementom) {
                        newMacro_list[key] = macro_list[key];
                    }
                });
            }

            clasf_sectorial.tct_macro_sector_ddw_list = newMacro_list;
            clasf_sectorial.renderlista = 1;
            clasf_sectorial.render();
            $('.list_se').select2('val', idSector);
        }
    },

    //Carga las listas desplegables para los campos.
    cargalistas: function () {
        //LISTAS CNBV
        clasf_sectorial.actividadeconomica_list = app.lang.getAppListStrings('actividadeconomica_list');
        clasf_sectorial.subsectoreconomico_list = app.lang.getAppListStrings('subsectoreconomico_list');
        clasf_sectorial.sectoreconomico_list = app.lang.getAppListStrings('sectoreconomico_list');
        clasf_sectorial.tct_macro_sector_ddw_list = app.lang.getAppListStrings('tct_macro_sector_ddw_list');

        //LISTAS INEGI
        clasf_sectorial.inegi_rama_list = app.lang.getAppListStrings('inegi_rama_list');
        clasf_sectorial.inegi_subrama_list = app.lang.getAppListStrings('inegi_subrama_list');
        clasf_sectorial.inegi_sector_list = app.lang.getAppListStrings('inegi_sector_list');
        clasf_sectorial.inegi_subsector_list = app.lang.getAppListStrings('inegi_subsector_list');
        clasf_sectorial.inegi_clase_list = app.lang.getAppListStrings('inegi_clase_list');
        clasf_sectorial.inegi_descripcion_list = app.lang.getAppListStrings('inegi_descripcion_list');
    },
})
