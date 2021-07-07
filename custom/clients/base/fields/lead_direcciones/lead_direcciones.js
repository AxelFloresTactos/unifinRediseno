({
    events: {
        //Eventos para nueva dirección
        'focusout #newPostalInputTemp': 'getInfoAboutCP',     //Recupera información asociada a CP
        'change .multiTipoNew': 'updateValueTipoMultiselect',     //Recupera valor para mapeo de tipo
        'change .multiIndicadorNew': 'updateValueIndicadorMultiselect',     //Recupera valor para mapeo de indicador
        'change .newCalle': 'updateValueCalle',     //Actualiza calle a modelo
        'change .newNumExt': 'updateValueNumExt',     //Actualiza número exterior a modelo
        'change .newNumInt': 'updateValueNumInt',     //Actualiza número interior a modelo
        'change .newPais': 'populateEdoByPais',     //Actualiza dependencias por País
        'change .newEstado': 'populateCiudadesByEstado',      //Actualiza estado a modelo y filtra ciudad y municipio
        'change .newMunicipio': 'populateColoniasByMunicipio',      //Actualiza municipio a modelo y filtra colonia
        'change .newColonia': 'updateValueColonia',     //Actualiza colonia a modelo
        'change .newCiudad': 'updateValueCiudad',     //Actualiza ciudad a modelo
        'click  .addDireccion': 'addNewDireccion',      //Agrega nueva dirección

        //Eventos para direcciones existentes
        'change .postalInputTempExisting': 'getInfoAboutCPExisting',      //Recupera información asociada a CP existente
        'change .multi_tipo_existing': 'updateValueTipoMultiselectDE',     //Recupera valor para mapeo de tipo y actualiza en modelo
        'change .multi1_n_existing': 'updateValueIndicadorMultiselectDE',     //Recupera valor para mapeo de indicador y actualiza en modelo
        'change .calleExisting': 'updateCalleDE',     //Actualiza calle existente en modelo
        'change .numExtExisting': 'updateNumExtDE',     //Actualiza número exterior en modelo
        'change .numIntExisting': 'updateNumIntDE',     //Actualiza número interior en modelo
        'change .paisExisting': 'populateEdoByPaisDE',     //Actualiza dependencias por País
        'change .estadoExisting': 'populateCiudadesByEstadoDE',      //Actualiza estado a modelo y filtra ciudad y municipio
        'change .municipioExisting': 'populateColoniasByMunicipioDE',      //Actualiza municipio a modelo y filtra colonia
        'change .coloniaExisting': 'updateValueColoniaDE',     //Actualiza colonia a modelo
        'change .ciudadExisting': 'updateValueCiudadDE',     //Actualiza ciudad a modelo
        'click .principal': 'updatePrincipalDE',     //Actualiza principal a modelo
        'click .inactivo': 'updateInactivoDE',     //Actualiza inactivo a modelo
    },

    initialize: function (options) {
        //Inicializa campo custom
        options = options || {};
        options.def = options.def || {};
        lead_dir = this;
        this.lDirecciones = [];
        this.lDirecciones.direccion = [];
        this.prev_lDirecciones = [];
        this.prev_lDirecciones.prev_direccion = [];
        this._super('initialize', [options]);
        this.principal = 1;
        //Declaración de variables
        this.paises_list = {};
        this.estados_list = [];
        this.municipios_list = [];
        this.ciudades_list = {};
        this.colonias_list = {};
        this.flagDirecciones = 0;
        this.direcciones = [];
        this.dataDireccionesApi = [];
        this.fiscalCounter = 0;
        this.counterTipoVacio = 0;
        this.tipo_direccion_list = App.lang.getAppListStrings('dir_tipo_unique_list');
        this.indicador_list = App.lang.getAppListStrings('dir_indicador_unique_list');
        //Tipos de dirección hidden para guardar valores en dire_direccion
        this.def.dir_tipo_list_html = App.lang.getAppListStrings('tipodedirecion_list');
        this.def.indicador_html = App.lang.getAppListStrings('dir_Indicador_list');
        this.def.listMapTipo = App.lang.getAppListStrings('tipo_dir_map_list');
        this.def.listTipo = App.lang.getAppListStrings('dir_tipo_unique_list');
        this.def.listMapIndicador = App.lang.getAppListStrings('dir_indicador_map_list');
        this.def.listIndicador = App.lang.getAppListStrings('dir_indicador_unique_list');
        //Valida perfil de usuario para ocultar dirección fiscal
        this.accesoFiscal = App.user.attributes.tct_alta_clientes_chk_c + App.user.attributes.tct_altaproveedor_chk_c + App.user.attributes.tct_alta_cd_chk_c + App.user.attributes.deudor_factoraje_c;
        if (this.accesoFiscal > 0) this.bloqueado = 0;
        //Declaración de validation Tasks
        this.model.addValidationTask('check_multiple_fiscal', _.bind(this._doValidateDireccionIndicador, this));
        //Declaración de modelo para nueva dirección
        this.nuevaDireccion = this.limpiaNuevaDireccion();
        this.cont_render = 0;
    },

    _render: function () {
        this._super("_render");

        // if (this.accesoFiscal == 0 && this.model.get('tipo_registro_cuenta_c') != 4 && this.cont_render == 0) {
        //     var auxindicador = new Object();
        //     for (var [key, value] of Object.entries(this.def.listIndicador)) {
        //         if (key != "2") {
        //             auxindicador[key] = value;
        //         }
        //     }
        //     //Permite edición para personas
        //     try {
        //         if (this.lDirecciones != undefined) {
        //             if (this.lDirecciones.direccion != undefined) {
        //                 for (var indexDir = 0; indexDir < this.lDirecciones.direccion.length; indexDir++) {
        //                     if (this.lDirecciones.direccion[indexDir].indicadorSeleccionados.includes('^2^')) {
        //                         this.lDirecciones.direccion[indexDir].bloqueado = 1;
        //                     }
        //                 }
        //             }
        //         }
        //     } catch (e) {
        //         console.log(e);
        //     }
        //     this.cont_render = 1;
        //     this.def.listIndicador = auxindicador;
        //     this.nuevaDireccion.listIndicador = this.def.listIndicador;
        //     this.render();
        // } else {
        //     this.def.listIndicador = App.lang.getAppListStrings('dir_indicador_unique_list');
        //     this.nuevaDireccion.listIndicador = this.def.listIndicador;
        //     this.cont_render = 0;
        // }
    },

    getInfoAboutCP: function (evt) {
        //Recupera y almacena CP
        var cp = evt.currentTarget.value;
        var str_length = cp.length;
        //Valida formato
        var pattern = /^\d+$/;
        var isNumber = pattern.test(cp);
        if (str_length >= 5 && isNumber) {
            if (this.nuevaDireccion.valCodigoPostal != cp) {
                //LLamada a api custom
                app.alert.show('loading_cp', {
                    level: 'process',
                    title: 'Cargando información de Código Postal ...',
                });

                var strUrl = 'DireccionesCP/' + cp + '/0';
                app.api.call('GET', app.api.buildURL(strUrl), null, {
                    success: _.bind(function (data) {
                        //Limpiar valores de modelo
                        lead_dir.nuevaDireccion.listPais = {};
                        lead_dir.nuevaDireccion.listMunicipio = {};
                        lead_dir.nuevaDireccion.listEstado = {};
                        lead_dir.nuevaDireccion.listColonia = {};
                        lead_dir.nuevaDireccion.listCiudad = {};
                        lead_dir.nuevaDireccion.listPaisFull = {};
                        lead_dir.nuevaDireccion.listMunicipioFull = {};
                        lead_dir.nuevaDireccion.listEstadoFull = {};
                        lead_dir.nuevaDireccion.listColoniaFull = {};
                        lead_dir.nuevaDireccion.listCiudadFull = {};
                        lead_dir.nuevaDireccion.pais = "";
                        lead_dir.nuevaDireccion.estado = "";
                        lead_dir.nuevaDireccion.municipio = "";
                        lead_dir.nuevaDireccion.ciudad = "";
                        lead_dir.nuevaDireccion.colonia = "";
                        lead_dir.nuevaDireccion.postal = "";
                        lead_dir.nuevaDireccion.valCodigoPostal = "";

                        //Agrega valores recuperados a modelo
                        if (data.idCP) {
                            //recupera info
                            lead_dir.nuevaDireccion.valCodigoPostal = cp;
                            lead_dir.nuevaDireccion.postal = data.idCP;
                            var list_paises = data.paises;
                            var list_municipios = data.municipios;
                            //var city_list = App.metadata.getCities();
                            var city_list = data.ciudades;
                            var list_estados = data.estados;
                            var list_colonias = data.colonias;

                            //Poarsea valores para listas
                            //País
                            listPais = {};
                            for (var i = 0; i < list_paises.length; i++) {
                                listPais[list_paises[i].idPais] = list_paises[i].namePais;
                            }
                            lead_dir.nuevaDireccion.listPais = listPais;
                            lead_dir.nuevaDireccion.listPaisFull = listPais;
                            //Municipio
                            listMunicipio = {};
                            for (var i = 0; i < list_municipios.length; i++) {
                                listMunicipio[list_municipios[i].idMunicipio] = list_municipios[i].nameMunicipio;
                            }
                            lead_dir.nuevaDireccion.listMunicipio = listMunicipio;
                            lead_dir.nuevaDireccion.listMunicipioFull = listMunicipio;
                            //Estado
                            listEstado = {};
                            for (var i = 0; i < list_estados.length; i++) {
                                listEstado[list_estados[i].idEstado] = list_estados[i].nameEstado;
                            }
                            lead_dir.nuevaDireccion.listEstado = listEstado;
                            lead_dir.nuevaDireccion.listEstadoFull = listEstado;
                            //Colonia
                            listColonia = {};
                            for (var i = 0; i < list_colonias.length; i++) {
                                listColonia[list_colonias[i].idColonia] = list_colonias[i].nameColonia;
                            }
                            lead_dir.nuevaDireccion.listColonia = listColonia;
                            lead_dir.nuevaDireccion.listColoniaFull = listColonia;
                            //Ciudad
                            listCiudad = {};
                            for (var i = 0; i < city_list.length; i++) {
                                listCiudad[city_list[i].idCiudad] = city_list[i].nameCiudad;
                            }
                            lead_dir.nuevaDireccion.listCiudad = listCiudad;
                            lead_dir.nuevaDireccion.listCiudadFull = listCiudad;

                            //Ejecuta filtro por dependencia de País
                            lead_dir.nuevaDireccion.pais = (Object.keys(lead_dir.nuevaDireccion.listPais)[0] != undefined) ? Object.keys(lead_dir.nuevaDireccion.listPais)[0] : "";
                            lead_dir.populateEdoByPais(lead_dir.nuevaDireccion.pais);
                            lead_dir.populateCiudadesByEstado(lead_dir.nuevaDireccion.estado);
                            lead_dir.populateColoniasByMunicipio(lead_dir.nuevaDireccion.municipio);
                        } else {
                            app.alert.show('cp_not_found', {
                                level: 'error',
                                autoClose: true,
                                messages: 'C\u00F3digo Postal no encontrado'
                            });
                        }
                        //Ejecuta render a campo
                        lead_dir.render();
                        app.alert.dismiss('loading_cp');
                    }, lead_dir)
                });
            }
        } else if (cp != "") {
            lead_dir.nuevaDireccion.valCodigoPostal = "";
            app.alert.show('invalid_cp', {
                level: 'error',
                autoClose: true,
                messages: 'C\u00F3digo Postal inv\u00E1lido'
            });

        } else {
            lead_dir.nuevaDireccion.valCodigoPostal = "";
            lead_dir.nuevaDireccion.postal = "";
        }

    },

    /*
    * Función que llena los campos de una direccíon ya existente, consumiendo el api DireccionesCP
    */
    getInfoAboutCPExisting: function (evt) {
        //Recupera y almacena CP
        var inputs = this.$('.postalInputTempExisting'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var cp = input.val();
        var str_length = cp.length;
        //Valida formato
        var pattern = /^\d+$/;
        var isNumber = pattern.test(cp);
        if (str_length >= 5 && isNumber) {
            if (this.lDirecciones.direccion.valCodigoPostal != cp) {
                //LLamada a api custom
                app.alert.show('loading_cp', {
                    level: 'process',
                    title: 'Cargando información de Código Postal ...',
                });

                var strUrl = 'DireccionesCP/' + cp + '/0';
                app.api.call('GET', app.api.buildURL(strUrl), null, {
                    success: _.bind(function (data) {
                        //Limpiar valores de modelo
                        lead_dir.lDirecciones.direccion[index].listPais = {};
                        lead_dir.lDirecciones.direccion[index].listMunicipio = {};
                        lead_dir.lDirecciones.direccion[index].listEstado = {};
                        lead_dir.lDirecciones.direccion[index].listColonia = {};
                        lead_dir.lDirecciones.direccion[index].listCiudad = {};
                        lead_dir.lDirecciones.direccion[index].listPaisFull = {};
                        lead_dir.lDirecciones.direccion[index].listMunicipioFull = {};
                        lead_dir.lDirecciones.direccion[index].listEstadoFull = {};
                        lead_dir.lDirecciones.direccion[index].listColoniaFull = {};
                        lead_dir.lDirecciones.direccion[index].listCiudadFull = {};
                        lead_dir.lDirecciones.direccion[index].pais = "";
                        lead_dir.lDirecciones.direccion[index].estado = "";
                        lead_dir.lDirecciones.direccion[index].municipio = "";
                        lead_dir.lDirecciones.direccion[index].ciudad = "";
                        lead_dir.lDirecciones.direccion[index].colonia = "";
                        lead_dir.lDirecciones.direccion[index].postal = "";
                        lead_dir.lDirecciones.direccion[index].valCodigoPostal = "";

                        //Agrega valores recuperados a modelo
                        if (data.idCP) {
                            //recupera info
                            lead_dir.lDirecciones.direccion[index].valCodigoPostal = cp;
                            lead_dir.lDirecciones.direccion[index].postal = data.idCP;
                            var list_paises = data.paises;
                            var list_municipios = data.municipios;
                            //var city_list = App.metadata.getCities();
                            var city_list = data.ciudades;
                            var list_estados = data.estados;
                            var list_colonias = data.colonias;

                            //Poarsea valores para listas
                            //País
                            listPais = {};
                            for (var i = 0; i < list_paises.length; i++) {
                                listPais[list_paises[i].idPais] = list_paises[i].namePais;
                            }
                            lead_dir.lDirecciones.direccion[index].listPais = listPais;
                            lead_dir.lDirecciones.direccion[index].listPaisFull = listPais;
                            //Municipio
                            listMunicipio = {};
                            for (var i = 0; i < list_municipios.length; i++) {
                                listMunicipio[list_municipios[i].idMunicipio] = list_municipios[i].nameMunicipio;
                            }
                            lead_dir.lDirecciones.direccion[index].listMunicipio = listMunicipio;
                            lead_dir.lDirecciones.direccion[index].listMunicipioFull = listMunicipio;
                            //Estado
                            listEstado = {};
                            for (var i = 0; i < list_estados.length; i++) {
                                listEstado[list_estados[i].idEstado] = list_estados[i].nameEstado;
                            }
                            lead_dir.lDirecciones.direccion[index].listEstado = listEstado;
                            lead_dir.lDirecciones.direccion[index].listEstadoFull = listEstado;
                            //Colonia
                            listColonia = {};
                            for (var i = 0; i < list_colonias.length; i++) {
                                listColonia[list_colonias[i].idColonia] = list_colonias[i].nameColonia;
                            }
                            lead_dir.lDirecciones.direccion[index].listColonia = listColonia;
                            lead_dir.lDirecciones.direccion[index].listColoniaFull = listColonia;
                            //Ciudad
                            listCiudad = {};
                            for (var i = 0; i < city_list.length; i++) {
                                listCiudad[city_list[i].idCiudad] = city_list[i].nameCiudad;
                            }
                            lead_dir.lDirecciones.direccion[index].listCiudad = listCiudad;
                            lead_dir.lDirecciones.direccion[index].listCiudadFull = listCiudad;

                            //Ejecuta filtro por dependencia de País
                            lead_dir.lDirecciones.direccion[index].pais = (Object.keys(lead_dir.lDirecciones.direccion[index].listPais)[0] != undefined) ? Object.keys(lead_dir.lDirecciones.direccion[index].listPais)[0] : "";
                            evt.index = index;

                            evt.idPais = lead_dir.lDirecciones.direccion[index].pais;
                            lead_dir.populateEdoByPaisDE(evt);

                            evt.idEstado = lead_dir.lDirecciones.direccion[index].estado;
                            lead_dir.populateCiudadesByEstadoDE(evt);

                            evt.idMunicipio = lead_dir.lDirecciones.direccion[index].municipio;
                            lead_dir.populateColoniasByMunicipioDE(evt);
                        } else {
                            app.alert.show('cp_not_found', {
                                level: 'error',
                                autoClose: true,
                                messages: 'C\u00F3digo Postal no encontrado'
                            });
                        }
                        //Ejecuta render a campo
                        lead_dir.render();
                        app.alert.dismiss('loading_cp');
                    }, lead_dir)
                });
            }
        } else if (cp != "") {
            lead_dir.lDirecciones.direccion[index].valCodigoPostal = "";
            app.alert.show('invalid_cp', {
                level: 'error',
                autoClose: true,
                messages: 'C\u00F3digo Postal inv\u00E1lido'
            });

        } else {
            lead_dir.lDirecciones.direccion[index].valCodigoPostal = "";
            lead_dir.lDirecciones.direccion[index].postal = "";
        }

    },

    populateEdoByPais: function (evt) {
        //Recuperar valores por pais
        var id_pais = (evt.length == undefined) ? $(evt.currentTarget).val() : evt;
        var filtroEstado = this.arraySearch(this.nuevaDireccion.listEstadoFull, id_pais, 'pais');
        var filtroMunicipio = this.arraySearch(this.nuevaDireccion.listMunicipioFull, id_pais, 'pais');
        var filtroCiudad = this.arraySearch(this.nuevaDireccion.listCiudadFull, id_pais, 'pais');
        var filtroColonia = this.arraySearch(this.nuevaDireccion.listColoniaFull, id_pais, 'pais');

        //Establece nuevos valores
        this.nuevaDireccion.pais = id_pais;
        this.nuevaDireccion.listEstado = filtroEstado;
        this.nuevaDireccion.listMunicipio = filtroMunicipio;
        this.nuevaDireccion.listCiudad = filtroCiudad;
        this.nuevaDireccion.listColonia = filtroColonia;

        //Limpia dependencias
        this.nuevaDireccion.municipio = (Object.keys(this.nuevaDireccion.listMunicipio)[0] != undefined) ? Object.keys(this.nuevaDireccion.listMunicipio)[0] : "";
        this.nuevaDireccion.estado = (Object.keys(this.nuevaDireccion.listEstado)[0] != undefined) ? Object.keys(this.nuevaDireccion.listEstado)[0] : "";
        this.nuevaDireccion.colonia = (Object.keys(this.nuevaDireccion.listColonia)[0] != undefined) ? Object.keys(this.nuevaDireccion.listColonia)[0] : "";
        this.nuevaDireccion.ciudad = (Object.keys(this.nuevaDireccion.listCiudad)[0] != undefined) ? Object.keys(this.nuevaDireccion.listCiudad)[0] : "";
        this.render();
    },

    populateEdoByPaisDE: function (evt) {
        //Recuperar valores por pais
        var id_pais = "";
        var index = "";
        if (evt.idPais == undefined) {
            var inputs = this.$('[data-field="paisExisting"].paisExisting'),
                input = this.$(evt.currentTarget),
                index = inputs.index(input);
            id_pais = input.val();
        } else {
            id_pais = evt.idPais;
            index = evt.index;
        }

        var filtroEstado = this.arraySearch(this.lDirecciones.direccion[index].listEstadoFull, id_pais, 'pais');
        var filtroMunicipio = this.arraySearch(this.lDirecciones.direccion[index].listMunicipioFull, id_pais, 'pais');
        var filtroCiudad = this.arraySearch(this.lDirecciones.direccion[index].listCiudadFull, id_pais, 'pais');
        var filtroColonia = this.arraySearch(this.lDirecciones.direccion[index].listColoniaFull, id_pais, 'pais');

        //Establece nuevos valores
        this.lDirecciones.direccion[index].pais = id_pais;
        this.lDirecciones.direccion[index].listEstado = filtroEstado;
        this.lDirecciones.direccion[index].listMunicipio = filtroMunicipio;
        this.lDirecciones.direccion[index].listCiudad = filtroCiudad;
        this.lDirecciones.direccion[index].listColonia = filtroColonia;

        //Limpia dependencias
        this.lDirecciones.direccion[index].municipio = (Object.keys(this.lDirecciones.direccion[index].listMunicipio)[0] != undefined) ? Object.keys(this.lDirecciones.direccion[index].listMunicipio)[0] : "";
        this.lDirecciones.direccion[index].estado = (Object.keys(this.lDirecciones.direccion[index].listEstado)[0] != undefined) ? Object.keys(this.lDirecciones.direccion[index].listEstado)[0] : "";
        this.lDirecciones.direccion[index].colonia = (Object.keys(this.lDirecciones.direccion[index].listColonia)[0] != undefined) ? Object.keys(this.lDirecciones.direccion[index].listColonia)[0] : "";
        this.lDirecciones.direccion[index].ciudad = (Object.keys(this.lDirecciones.direccion[index].listCiudad)[0] != undefined) ? Object.keys(this.lDirecciones.direccion[index].listCiudad)[0] : "";
        this.render();
    },

    arraySearch: function (arr, val, tipo) {
        var filtroLista = {};
        if (tipo == 'pais') {
            val = (val.length == 1) ? "00" + val : val;
            val = (val.length == 2) ? "0" + val : val;
        }
        for (var [key, value] of Object.entries(arr)) {
            if (key.startsWith(val)) {
                filtroLista[key] = value;
            }
        }
        return filtroLista;
    },

    getIndexOfAddress: function (arr, valor_buscar) {

        var index = '';
        if (arr.length > 0) {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i].postal == valor_buscar) {
                    index = i;
                }
            }
        }
        return index;
    },

    populateColoniasByMunicipio: function (evt) {

        //Recuperar valores por pais
        var id_municipio = (evt.length == undefined) ? $(evt.currentTarget).val() : evt;
        var filtroColonia = this.arraySearch(this.nuevaDireccion.listColoniaFull, id_municipio, 'municipio');

        //Establece nuevos valores
        this.nuevaDireccion.municipio = id_municipio;
        this.nuevaDireccion.listColonia = filtroColonia;

        //Establece ids default
        this.nuevaDireccion.colonia = (Object.keys(this.nuevaDireccion.listColonia)[0] != undefined) ? Object.keys(this.nuevaDireccion.listColonia)[0] : "";
        this.render();
    },

    populateColoniasByMunicipioDE: function (evt) {
        //Recuperar valores por municipio
        var id_municipio = "";
        var index = "";
        if (evt.idMunicipio == undefined) {
            var inputs = this.$('[data-field="municipioExisting"].municipioExisting'),
                input = this.$(evt.currentTarget),
                index = inputs.index(input);
            id_municipio = input.val();
        } else {
            id_municipio = evt.idMunicipio;
            index = evt.index;
        }
        var filtroColonia = this.arraySearch(this.lDirecciones.direccion[index].listColoniaFull, id_municipio, 'municipio');

        //Establece nuevos valores
        this.lDirecciones.direccion[index].municipio = id_municipio;
        this.lDirecciones.direccion[index].listColonia = filtroColonia;

        //Establece ids default
        this.lDirecciones.direccion[index].colonia = (Object.keys(this.lDirecciones.direccion[index].listColonia)[0] != undefined) ? Object.keys(this.lDirecciones.direccion[index].listColonia)[0] : "";
        this.render();

    },

    populateCiudadesByEstado: function (evt) {
        //Recuperar valores por estado
        var idEstado = (evt.length == undefined) ? $(evt.currentTarget).val() : evt;
        var filtroCiudad = this.arraySearch(this.nuevaDireccion.listCiudadFull, idEstado, 'estado');
        var filtroMunicipio = this.arraySearch(this.nuevaDireccion.listMunicipioFull, idEstado, 'estado');

        //Establece nuevos valores
        this.nuevaDireccion.estado = idEstado;
        this.nuevaDireccion.listCiudad = filtroCiudad;
        this.nuevaDireccion.listMunicipio = filtroMunicipio;

        //Establece ids default
        this.nuevaDireccion.ciudad = (Object.keys(this.nuevaDireccion.listCiudad)[0] != undefined) ? Object.keys(this.nuevaDireccion.listCiudad)[0] : "";
        this.nuevaDireccion.municipio = (Object.keys(this.nuevaDireccion.listMunicipio)[0] != undefined) ? Object.keys(this.nuevaDireccion.listMunicipio)[0] : "";

        //Actualiza Colonia
        this.populateColoniasByMunicipio(this.nuevaDireccion.municipio);
        this.render();
    },

    populateCiudadesByEstadoDE: function (evt) {
        //Recuperar valores por estado
        var idEstado = "";
        var index = "";
        if (evt.idEstado == undefined) {
            var inputs = this.$('[data-field="estadoExisting"].estadoExisting'),
                input = this.$(evt.currentTarget),
                index = inputs.index(input);
            var idEstado = input.val();
        } else {
            idEstado = evt.idEstado;
            index = evt.index;
        }
        var filtroCiudad = this.arraySearch(this.lDirecciones.direccion[index].listCiudadFull, idEstado, 'estado');
        var filtroMunicipio = this.arraySearch(this.lDirecciones.direccion[index].listMunicipioFull, idEstado, 'estado');

        //Establece nuevos valores
        this.lDirecciones.direccion[index].estado = idEstado;
        this.lDirecciones.direccion[index].listCiudad = filtroCiudad;
        this.lDirecciones.direccion[index].listMunicipio = filtroMunicipio;

        //Establece ids default
        this.lDirecciones.direccion[index].ciudad = (Object.keys(this.lDirecciones.direccion[index].listCiudad)[0] != undefined) ? Object.keys(this.lDirecciones.direccion[index].listCiudad)[0] : "";
        this.lDirecciones.direccion[index].municipio = (Object.keys(this.lDirecciones.direccion[index].listMunicipio)[0] != undefined) ? Object.keys(this.lDirecciones.direccion[index].listMunicipio)[0] : "";

        //Actualiza Colonia
        evt.idMunicipio = this.lDirecciones.direccion[index].municipio;
        evt.index = index;
        this.populateColoniasByMunicipioDE(evt);
        this.render();
    },

    addNewDireccion: function (evt) {
        //Varibles para contro de errores
        var errorMsg = '';
        var dirErrorCounter = 0;
        var dirError = false;

        //Validación de campos
        if (this.lDirecciones == undefined) {
            this.lDirecciones = lead_dir.lDirecciones;
        }

        //Tipo
        if (this.nuevaDireccion.tipodedireccion == "") {
            errorMsg += '<br><b>Tipo</b>';
            dirError = true;
            dirErrorCounter++;
            this.$('.multiTipoNew').children().eq(0).css('border-color', 'red');
        } else {
            this.$('.multiTipoNew').children().eq(0).css('border-color', '');
        }

        //Indicador
        if (this.nuevaDireccion.indicador == "") {
            errorMsg += '<br><b>Tipo de dirección</b>';
            dirError = true;
            dirErrorCounter++;
            this.$('.multiIndicadorNew').children().eq(0).css('border-color', 'red');
        } else {
            this.$('.multiIndicadorNew').children().eq(0).css('border-color', '');
        }

        //Código postal
        if (this.nuevaDireccion.valCodigoPostal == "" || this.nuevaDireccion.valCodigoPostal.trim() == "") {
            errorMsg += '<br><b>Código Postal</b>';
            dirError = true;
            dirErrorCounter++;
            this.$('#newPostalInputTemp').css('border-color', 'red');
        } else {
            this.$('#newPostalInputTemp').css('border-color', '');
        }

        //Calle
        if (this.nuevaDireccion.calle == "" || this.nuevaDireccion.calle.trim() == "") {
            errorMsg += '<br><b>Calle</b>';
            dirError = true;
            dirErrorCounter++;
            this.$('.newCalle').css('border-color', 'red');
        } else {
            this.$('.newCalle').css('border-color', '');
        }

        //Num Ext
        if (this.nuevaDireccion.numext == "" || this.nuevaDireccion.numext.trim() == "") {
            errorMsg += '<br><b>Número Exterior</b>';
            dirError = true;
            dirErrorCounter++;
            this.$('.newNumExt').css('border-color', 'red');
        } else {
            this.$('.newNumExt').css('border-color', '');
        }

        if (this.nuevaDireccion.inactivo == "0") {
            errorMsg += '<br><b>Número Exterior</b>';
            dirError = true;
            dirErrorCounter++;
            this.$('.newNumExt').css('border-color', 'red');
        } else {
            this.$('.newNumExt').css('border-color', '');
        }

        if (dirError && dirErrorCounter >= 1) {
            errorMsg = 'Hace falta completar la siguiente información en la <b>Direcci\u00F3n</b>:' + errorMsg;
            app.alert.show('list_delete_direccion_info', {
                level: 'error',
                autoClose: true,
                messages: errorMsg
            });
            return;
        }

        //Valida duplicado, nueva dirección contra direcciones existente
        var duplicado = 0;
        var cDuplicado = 0;
        var cDireccionFiscal = 0;
        var cDireccionAdmin = 0;
        var direccion = lead_dir.lDirecciones.direccion;
        Object.keys(direccion).forEach(key => {
            //Compara
            duplicado = 0;
            duplicado = (direccion[key].valCodigoPostal == this.nuevaDireccion.valCodigoPostal) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].pais == this.nuevaDireccion.pais) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].estado == this.nuevaDireccion.estado) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].municipio == this.nuevaDireccion.municipio) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].ciudad == this.nuevaDireccion.ciudad) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].colonia == this.nuevaDireccion.colonia) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].calle.trim().toLowerCase() == this.nuevaDireccion.calle.trim().toLowerCase()) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].numext.trim().toLowerCase() == this.nuevaDireccion.numext.trim().toLowerCase()) ? duplicado + 1 : duplicado;
            duplicado = (direccion[key].inactivo == this.nuevaDireccion.inactivo && this.nuevaDireccion.inactivo == 0) ? duplicado + 1 : duplicado;
            //cDireccionFiscal = (direccion[key].indicadorSeleccionados.includes('2') && direccion[key].inactivo == 0) ? cDireccionFiscal+1 : cDireccionFiscal;
            //cDireccionAdmin = (direccion[key].indicadorSeleccionados.includes('16') && direccion[key].inactivo == 0) ? cDireccionAdmin+1 : cDireccionAdmin;
            if (direccion[key].indicadorSeleccionados.includes('2') && direccion[key].inactivo == 0) { cDireccionFiscal = cDireccionFiscal + 1; }
            if (direccion[key].indicadorSeleccionados.includes('16') && direccion[key].inactivo == 0) { cDireccionAdmin = cDireccionAdmin + 1; }
            //Valida duplicado
            if (duplicado == 9) {
                cDuplicado++;
            }
        });
        //Muestra error
        if (cDuplicado >= 1) {
            app.alert.show('nueva_direccion_duplicada', {
                level: 'error',
                autoClose: true,
                messages: 'La dirección ya existe, favor de validar.'
            });
            return;
        }

        //Valida multiples direcciones fiscales
        if (cDireccionFiscal >= 1 && this.nuevaDireccion.indicadorSeleccionados.includes('2')) {
            app.alert.show('multiple_fiscal', {
                level: 'error',
                autoClose: true,
                messages: 'No se pueden agregar múltiples direcciones fiscales, favor de validar.'
            });
            this.$('.multiIndicadorNew').children().eq(0).css('border-color', 'red');
            return;
        }

        //Valida multiples direcciones administración
        if (cDireccionAdmin >= 1 && this.nuevaDireccion.indicadorSeleccionados.includes('16')) {
            app.alert.show('multiple_admin', {
                level: 'error',
                autoClose: true,
                messages: 'No se pueden agregar múltiples direcciones de Administración, favor de validar.'
            });
            this.$('.multiIndicadorNew').children().eq(0).css('border-color', 'red');
            return;
        }

        //Obteniendo posición de dirección añadida
        this.nuevaDireccion.secuencia = this.lDirecciones.direccion.length + 1;
        //Establece dirección principal
        if (this.nuevaDireccion.secuencia == 1) {
            this.nuevaDireccion.principal = 1;
        }

        //Agregando nuevo valor al modelo de direcciones existentes
        this.lDirecciones.direccion.push(this.nuevaDireccion);
        //Limpia nueva dirección
        this.nuevaDireccion = this.limpiaNuevaDireccion();
        //Aplica render a campo
        this.render();

    },

    checkcallenum: function (evt) {
        var limite = this.limitto100(evt);
        if (limite == false) {
            return false;
        }
    },

    checknumint: function (evt) {
        var limite = this.limitto50(evt);
        if (limite == false) {
            return false;
        }
    },

    limitto100: function (evt) {
        if (!evt) return;
        //get field that changed
        var $input = this.$(evt.currentTarget);

        var direccion = $input.val();

        if (direccion.length > 99 && evt.key != "Backspace" && evt.key != "Tab" && evt.key != "ArrowLeft" && evt.key != "ArrowRight") {
            return false;
        }
    },

    limitto50: function (evt) {
        if (!evt) return;
        //get field that changed
        var $input = this.$(evt.currentTarget);
        var direccion = $input.val();
        if (direccion.length > 49 && evt.key != "Backspace" && evt.key != "Tab" && evt.key != "ArrowLeft" && evt.key != "ArrowRight") {
            return false;
        }
    },

    /**
     * Establece campo original de Tipo de Dirección depende el valor del campo multiselect
     * @param  {object} evt, Objeto que contiene información del evento
     */
    updateValueTipoMultiselect: function (evt) {
        //Aplica estilo
        //  this.$('[data-field="multiTipoNew"].multiTipoNew').select2({
        //     width:'100%',
        //     minimumResultsForSearch:7,
        //     closeOnSelect: false,
        //     containerCssClass: 'select2-choices-pills-close'
        // });
        //Recupera valor
        var tipoSeleccionados = this.$('#multiTipoNew').val().toString();
        //Limpia borde
        this.$('.multiTipoNew').children().eq(0).css('border-color', '');
        //Parsea valor con mapeo
        this.nuevaDireccion.tipodedireccion = "";
        for (var [key, value] of Object.entries(this.def.listMapTipo)) {
            if (value == tipoSeleccionados) {
                this.nuevaDireccion.tipodedireccion = key;
            }
        }
        //Actualiza valor a modelo
        this.nuevaDireccion.tipoSeleccionados = '^' + tipoSeleccionados.replace(/,/gi, "^,^") + '^';
    },

    /**
     * Establece campo original de Indicador depende el valor del campo multiselect
     * @param  {object} evt, Objeto que contiene información del evento
    */
    updateValueIndicadorMultiselect: function (evt) {
        //Aplica estilo
        // this.$('[data-field="multiIndicadorNew"].multiIndicadorNew').select2({
        //     width:'100%',
        //     minimumResultsForSearch:7,
        //     closeOnSelect: false,
        //     containerCssClass: 'select2-choices-pills-close'
        // });

        //Recupera valor seleccionado
        var indicadorSeleccionados = this.$('#multiIndicadorNew').val().toString();
        //Limpia borde
        this.$('.multiIndicadorNew').children().eq(0).css('border-color', '');
        //Parsea valor con mapeo
        this.nuevaDireccion.indicador = "";
        for (var [key, value] of Object.entries(this.def.listMapIndicador)) {
            if (value == indicadorSeleccionados) {
                this.nuevaDireccion.indicador = key;
            }
        }

        var res = indicadorSeleccionados.split(",");

        //Actualiza modelo
        this.nuevaDireccion.indicadorSeleccionados = '^' + indicadorSeleccionados.replace(/,/gi, "^,^") + '^';

    },

    _getTipoDireccion: function (idSelected, valuesSelected) {

        //variable con resultado
        var result = null;

        //Arma objeto de mapeo
        var tipo_dir_map_list = App.lang.getAppListStrings('tipo_dir_map_list');

        var element = {};
        var object = [];
        var values = [];

        for (var key in tipo_dir_map_list) {
            var element = {};
            element.id = key;
            values = tipo_dir_map_list[key].split(",");
            element.values = values;
            object.push(element);
        }

        //Recupera arreglo de valores por id
        if (idSelected) {
            for (var i = 0; i < object.length; i++) {
                if ((object[i].id) == idSelected) {
                    result = object[i].values;
                }
            }
        }

        //Recupera id por valores
        if (valuesSelected) {
            result = [];
            for (var i = 0; i < object.length; i++) {
                if (object[i].values.length == valuesSelected.length) {
                    //Ordena arreglos y compara
                    valuesSelected.sort();
                    object[i].values.sort();
                    var tempVal = true;
                    for (var j = 0; j < valuesSelected.length; j++) {
                        if (valuesSelected[j] != object[i].values[j]) {
                            tempVal = false;
                        }
                    }
                    if (tempVal == true) {
                        result[0] = object[i].id;
                    }

                }
            }

        }

        return result;
    },

    /**
     * Establece identificador dependiendo "id"
     * @param  {string} idSelected, valor en campo indicador
     * @param  {object} valueSelected, valores en campo multiselect
     * @return  {array}, valor(es) a establecer en campo indicador
     */
    _getIndicador: function (idSelected, valuesSelected) {

        //variable con resultado
        var result = null;

        //Arma objeto de mapeo
        var dir_indicador_map_list = App.lang.getAppListStrings('dir_indicador_map_list');

        var element = {};
        var object = [];
        var values = [];

        for (var key in dir_indicador_map_list) {
            var element = {};
            element.id = key;
            values = dir_indicador_map_list[key].split(",");
            element.values = values;
            object.push(element);
        }

        //Recupera arreglo de valores por id
        if (idSelected) {
            for (var i = 0; i < object.length; i++) {
                if ((object[i].id) == idSelected) {
                    result = object[i].values;
                }
            }
        }

        //Recupera id por valores
        if (valuesSelected) {
            result = [];
            for (var i = 0; i < object.length; i++) {
                if (object[i].values.length == valuesSelected.length) {
                    //Ordena arreglos y compara
                    valuesSelected.sort();
                    object[i].values.sort();
                    var tempVal = true;
                    for (var j = 0; j < valuesSelected.length; j++) {
                        if (valuesSelected[j] != object[i].values[j]) {
                            tempVal = false;
                        }
                    }
                    if (tempVal == true) {
                        result[0] = object[i].id;
                    }

                }
            }

        }

        return result;
    },

    updateIndicadores: function (evt) {
        this.updateIndicadorFiscal(evt);
        this.updateIndicadorAdmin(evt);
    },
    /** BEGIN CUSTOMIZATION: jescamilla@levementum.com 6/18/2015 Description: detect multiple fiscal address*/
    updateIndicadorFiscal: function (evt) {

        var $input = this.$(evt.currentTarget);
        var class_name = $input[0].className,
            field_name = $($input).attr('data-field');
        var $inputs = this.$('.' + class_name),
            $index = $inputs.index($input),
            dropdown_value = $input.val(),
            primaryRemoved;

        //contar las direcciones fiscales existentes
        var fiscalCounter = 0;
        this.$('.existingIndicador').each(function () {
            if (String($(this).find('option:selected').text()).toLowerCase().indexOf('fiscal') >= 0) {
                fiscalCounter = parseInt(fiscalCounter + 1);
            }

        });

        if (dropdown_value == "") {
            this.counterEmptyFields++;
        }

        //contar las direcciones fiscales nuevas
        this.$('.newIndicador').each(function () {
            if (String($(this).find('option:selected').text()).toLowerCase().indexOf('fiscal') >= 0) {
                fiscalCounter = parseInt(fiscalCounter + 1);
            }
        });

        this.fiscalCounter = fiscalCounter;

        if (this.fiscalCounter > 1) {
            var alertOptions = { title: "M\u00FAltiples direcciones fiscales, favor de corregir.", level: "error" };
            app.alert.show('validation', alertOptions);
            $input.val('');
            //evt.target.parentElement.previousElementSibling.children[1].value='';

            //Obtener valores de multiselect
            var valores = $(evt.currentTarget).siblings('select').val();

            //Obteniendo índice de "Fiscal"
            var index = valores.indexOf("2");
            //Eliminando el valor "Fiscal" del arreglo
            valores.splice(index, 1);
            //Estableciendo nuevo arreglo a campo multiselect (sin "Fiscal")
            $(evt.currentTarget).siblings('select').select2('val', valores);
            $(evt.currentTarget).val(this._getIndicador(null, valores));

            $input.focus();
            this.fiscalCounter = 0;
        } else {
            if ($input.attr('class') == 'existingIndicador') {
                this.updateExistingDireccion($index, dropdown_value, 'indicador');
            }
        }
        /* END CUSTOMIZATION */
    },

    updateIndicadorAdmin: function (evt) {

        var $input = this.$(evt.currentTarget);
        var class_name = $input[0].className,
            field_name = $($input).attr('data-field');
        var $inputs = this.$('.' + class_name),
            $index = $inputs.index($input),
            dropdown_value = $input.val(),
            primaryRemoved;

        //contar las direcciones Administrativas existentes
        var adminCounter = 0;
        this.$('.existingIndicador').each(function () {
            if (String($(this).find('option:selected').text()).toLowerCase().indexOf('administraci\u00F3n') >= 0) {
                adminCounter = parseInt(adminCounter + 1);
            }

        });

        if (dropdown_value == "") {
            this.counterEmptyFields++;
        }

        //contar las direcciones Administrativas nuevas
        this.$('.newIndicador').each(function () {
            if (String($(this).find('option:selected').text()).toLowerCase().indexOf('administraci\u00F3n') >= 0) {
                adminCounter = parseInt(adminCounter + 1);
            }
        });

        this.adminCounter = adminCounter;

        if (this.adminCounter > 1) {
            var alertOptions = {
                title: "M\u00FAltiples direcciones administrativas, favor de corregir.",
                level: "error"
            };
            app.alert.show('validation2', alertOptions);
            $input.val('');
            //evt.target.parentElement.previousElementSibling.children[1].value='';

            //Obtener valores de multiselect
            var valores = $(evt.currentTarget).siblings('select').val();

            //Obteniendo índice de "Administracion"
            var index = valores.indexOf("5");
            //Eliminando el valor "Administracion" del arreglo
            valores.splice(index, 4);
            //Estableciendo nuevo arreglo a campo multiselect (sin "Administracion")
            $(evt.currentTarget).siblings('select').select2('val', valores);
            $(evt.currentTarget).val(this._getIndicador(null, valores));

            $input.focus();
            this.adminCounter = 0;
        } else {
            if ($input.attr('class') == 'existingIndicador') {
                this.updateExistingDireccion($index, dropdown_value, 'indicador');
            }
        }
        /* END CUSTOMIZATION */
    },

    updateExistingCiudad: function (evt) {

        var $input = this.$(evt.currentTarget);
        var class_name = $input[0].className;
        var $inputs = this.$('select.' + class_name),
            $index = $inputs.index($input),
            nuevo_valor = $input.val();

        this.updateExistingDireccion($index, nuevo_valor, 'ciudad');

    },

    updateExistingColonia: function (evt) {

        var $input = this.$(evt.currentTarget);
        var class_name = $input[0].className;
        var $inputs = this.$('select.' + class_name),
            $index = $inputs.index($input),
            nuevo_valor = $input.val();

        this.updateExistingDireccion($index, nuevo_valor, 'colonia');

    },

    updateExistingInputs: function (evt) {

        var $input = this.$(evt.currentTarget);
        var class_name = $input[0].classList[0],
            field_name = $($input).attr('data-field');
        var $inputs = this.$('.' + class_name),
            $index = $inputs.index($input),
            nuevo_valor = $input.val();

        this.updateExistingDireccion($index, nuevo_valor, field_name);

    },

    _doValidateEmptyTipo: function (fields, errors, callback) {
        if (this.counterTipoVacio > 0) {

            var alertOptions = { title: "Tipo de direcci\u00F3n requerido", level: "error" };
            app.alert.show('validation_tipo', alertOptions);
            $('select.existingTipodedireccion').each(function () {
                if ($(this).val() == null || $(this).val() == "") {
                    $(this).next().find('ul').css('border-color', 'red');
                } else {
                    $(this).next().find('ul').css('border-color', '');
                }
            });

            //Se establece un atributo (no existente) en array de errors, para detener la ejecución de guardado y no pintar ningún campo del modelo
            // ya que estos se pintan con jquery
            errors['lead_direcciones_'] = errors['lead_direcciones_'] || {};
            errors['lead_direcciones_'].required = true;
        }

        callback(null, fields, errors);
    },

    /**
     * ValidationTask: Validaciones para indicador en dirección
     * 1.- No existan multiples direcciones fiscales
     * 2.- Exista dirección fiscal y correspondencia para; Clientes,
     * 3.- No existan multiples direcciones de administración
     * @param fields
     * @param errors
     * @param callback
    */
    _doValidateDireccionIndicador: function (fields, errors, callback) {
        //Itera direcciones y suma a contadores
        var cDireccionFiscal = 0;
        var cDireccionAdmin = 0;
        var cDireccionCorrs = 0;
        if (lead_dir.lDirecciones != undefined) {
            var direccion = lead_dir.lDirecciones.direccion;
            for (iDireccion = 0; iDireccion < direccion.length; iDireccion++) {
                //Indicador: 1.- Correspondencia
                if (direccion[iDireccion].indicadorSeleccionados.includes('1') && direccion[iDireccion].inactivo == 0) {
                    cDireccionCorrs++;
                }
                //Indicador: 2 = Fiscal
                if (direccion[iDireccion].indicadorSeleccionados.includes('2') && direccion[iDireccion].inactivo == 0) {
                    cDireccionFiscal++;
                }
                //Indicador: 16 = Administración
                if (direccion[iDireccion].indicadorSeleccionados.includes('16') && direccion[iDireccion].inactivo == 0) {
                    cDireccionAdmin++;
                }

            }

            //Validación 1: Si existe más de 1 dirección fiscal regresa error y muestra alerta
            if (cDireccionFiscal > 1) {
                app.alert.show('multiple_fiscal', {
                    level: 'error',
                    autoClose: true,
                    messages: 'M\u00FAltiples direcciones fiscales, favor de corregir.'
                });
                errors['lead_direcciones_fiscal'] = errors['lead_direcciones_fiscal'] || {};
                errors['lead_direcciones_fiscal'].required = true;
            }

            //Validación 2:
            // if (this.model.get("tipo_registro_cuenta_c") == "3" || this.model.get("subtipo_registro_cuenta_c") == "8" || this.model.get("subtipo_registro_cuenta_c") == "9") {
            //     if (cDireccionFiscal == 0 || cDireccionCorrs == 0) {
            //         app.alert.show('multiple_fiscal', {
            //             level: 'error',
            //             autoClose: true,
            //             messages: "Se requiere de al menos una direcci\u00F3n fiscal y una de correspondencia.",
            //         });
            //         errors['lead_direcciones_corr_fiscal'] = errors['lead_direcciones_corr_fiscal'] || {};
            //         errors['lead_direcciones_corr_fiscal'].required = true;
            //     }
            // }

            //Validación 3: Si existe más de 1 dirección Administración regresa error y muestra alerta
            if (cDireccionAdmin > 1) {
                app.alert.show('multiple_admin', {
                    level: 'error',
                    autoClose: true,
                    messages: 'M\u00FAltiples direcciones de Administración, favor de corregir.'
                });
                errors['lead_direcciones_admin'] = errors['lead_direcciones_admin'] || {};
                errors['lead_direcciones_admin'].required = true;
            }
        }
        //Callback para validación
        callback(null, fields, errors);
    },


    /**
     * When data changes, re-render the field only if it is not on edit (see MAR-1617).
     * @inheritdoc
     */
    bindDataChange: function () {
        this.model.on('change:' + this.name, function () {
            if (this.action !== 'edit') {
                this.render();
            }
        }, this);
    },   

    updateValueCalle: function (evt) {
        //Recupera valor
        calle = this.$('.newCalle').val();
        calle = calle.toUpperCase();
        //Limipa borde
        this.$('.newCalle').css('border-color', '');
        //Actualiza modelo
        this.nuevaDireccion.calle = calle;
    },

    updateValueNumExt: function (evt) {
        //Recupera valor
        numExt = this.$('.newNumExt').val();
        numExt = numExt.toUpperCase();
        //Limpia borde
        this.$('.newNumExt').css('border-color', '');
        //Actualiza modelo
        this.nuevaDireccion.numext = numExt;
    },

    updateValueNumInt: function (evt) {
        //Recupera valor
        numInt = this.$('.newNumInt').val();
        numInt = numInt.toUpperCase();
        //Actualiza modelo
        this.nuevaDireccion.numint = numInt;
    },

    updateValueColonia: function (evt) {
        //Recupera valor
        var idColonia = this.$(evt.currentTarget).val();
        //Actualiza modelo
        this.nuevaDireccion.colonia = idColonia;
    },

    updateValueCiudad: function (evt) {
        //Recupera valor
        var idCiudad = this.$(evt.currentTarget).val();
        //Actualiza modelo
        this.nuevaDireccion.ciudad = idCiudad;
    },

    limpiaNuevaDireccion: function () {
        //Declaración de modelo para nueva dirección
        var nuevaDireccion = {
            "tipodedireccion": "",
            "listTipo": this.def.listTipo,
            "tipoSeleccionados": "",
            "indicador": "",
            "listIndicador": this.def.listIndicador,
            "indicadorSeleccionados": "",
            "valCodigoPostal": "",
            "postal": "",
            "valPais": "",
            "pais": "",
            "listPais": {},
            "listPaisFull": {},
            "valEstado": "",
            "estado": "",
            "listEstado": {},
            "listEstadoFull": {},
            "valMunicipio": "",
            "municipio": "",
            "listMunicipio": {},
            "listMunicipioFull": {},
            "valCiudad": "",
            "ciudad": "",
            "listCiudad": {},
            "listCiudadFull": {},
            "valColonia": "",
            "colonia": "",
            "listColonia": {},
            "listColoniaFull": {},
            "calle": "",
            "numext": "",
            "numint": "",
            "principal": "",
            "inactivo": "",
            "secuencia": "",
            "id": "",
            "direccionCompleta": "",
            "bloqueado": ""
        };
        return nuevaDireccion;

    },

    //Actualiza Calle de dirección existente
    updateCalleDE: function (evt) {
        //Recupera valor
        var inputs = this.$('.calleExisting'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var calle = input.val();
        calle = calle.toUpperCase();
        //Actualiza modelo
        this.lDirecciones.direccion[index].calle = calle;
    },
    //Actualiza Número exterior de dirección existente
    updateNumExtDE: function (evt) {
        //Recupera valor
        var inputs = this.$('.numExtExisting'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var numExt = input.val();
        numExt = numExt.toUpperCase();
        //Actualiza modelo
        this.lDirecciones.direccion[index].numext = numExt;
    },

    /**
     * Actualiza Número interior de dirección existente
     * @param  {object} evt, Objeto que contiene información del evento
    */
    updateNumIntDE: function (evt) {
        //Recupera valor
        var inputs = this.$('.numIntExisting'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var numInt = input.val();
        numInt = numInt.toUpperCase();
        //Actualiza modelo
        this.lDirecciones.direccion[index].numint = numInt;
    },


    /**
     * Actualiza Tipo de dirección existente en modelo
     * @param  {object} evt, Objeto que contiene información del evento
    */
    updateValueTipoMultiselectDE: function (evt) {
        //Recupera valor
        var inputs = this.$('[data-field="multi_tipo_existing"].multi_tipo_existing'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var tipoSeleccionados = input.val().toString();
        //Limpia borde
        this.$('.multi_tipo_existing ul.select2-choices').eq(index).css('border-color', '');
        //Parsea valor con mapeo
        this.lDirecciones.direccion[index].tipodedireccion = "";
        for (var [key, value] of Object.entries(this.def.listMapTipo)) {
            if (value == tipoSeleccionados) {
                this.lDirecciones.direccion[index].tipodedireccion = key;
            }
        }
        //Actualiza valor a modelo
        this.lDirecciones.direccion[index].tipoSeleccionados = "";
        this.lDirecciones.direccion[index].tipoSeleccionados = '^' + tipoSeleccionados.replace(/,/gi, "^,^") + '^';
    },

    /**
     * Establece el valor del campo indicador para dirección existente en modelo
     * @param  {object} evt, Objeto que contiene información del evento
    */
    updateValueIndicadorMultiselectDE: function (evt) {
        //Recupera valor seleccionado
        var inputs = this.$('[data-field="multi1_n_existing"].multi1_n_existing'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var indicadorSeleccionados = input.val().toString();
        //Limpia borde
        this.$('.multi1_n_existing ul.select2-choices').eq(index).css('border-color', '');
        //Parsea valor con mapeo
        this.lDirecciones.direccion[index].indicador = "";
        for (var [key, value] of Object.entries(this.def.listMapIndicador)) {
            if (value == indicadorSeleccionados) {
                this.lDirecciones.direccion[index].indicador = key;
            }
        }

        //Actualiza modelo
        this.lDirecciones.direccion[index].indicadorSeleccionados = "";
        this.lDirecciones.direccion[index].indicadorSeleccionados = '^' + indicadorSeleccionados.replace(/,/gi, "^,^") + '^';
        var res = indicadorSeleccionados.split(",");
        var bloqueado = (res.indexOf('2') != -1) ? 1 : 0;
        // bloqueado = (this.accesoFiscal > 0 || this.model.get('tipo_registro_cuenta_c') == 4 || this.model.get('tipo_registro_cuenta_c') == 5) ? 0 : bloqueado;
        this.lDirecciones.direccion[index].bloqueado = bloqueado;
        this.render();
        document.getElementsByClassName("multi1_n_existing")[index].focus();
        document.getElementsByClassName("postalInputTempExisting")[index].focus();
    },

    updateValueColoniaDE: function (evt) {
        //Recupera valor
        var inputs = this.$('[data-field="coloniaExisting"].coloniaExisting'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var idColonia = input.val();
        //Actualiza modelo
        this.lDirecciones.direccion[index].colonia = idColonia;
    },

    updateValueCiudadDE: function (evt) {
        //Recupera valor
        var inputs = this.$('[data-field="ciudadExisting"].ciudadExisting'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        var idCiudad = input.val();
        //Actualiza modelo
        this.lDirecciones.direccion[index].ciudad = idCiudad;
    },

    updatePrincipalDE: function (evt) {
        var inputs = this.$('.principal'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        if (this.lDirecciones.direccion[index].principal == 0) {
            for (var i = 0; i < this.lDirecciones.direccion.length; i++) {
                this.lDirecciones.direccion[i].principal = 0;
            }
            this.lDirecciones.direccion[index].principal = 1;
        }
        this.render();
    },

    updateInactivoDE: function (evt) {
        var inputs = this.$('.inactivo'),
            input = this.$(evt.currentTarget),
            index = inputs.index(input);
        if (this.lDirecciones.direccion[index].inactivo == 0) {
            this.lDirecciones.direccion[index].inactivo = 1;
        } else {
            this.lDirecciones.direccion[index].inactivo = 0;
        }
        this.render();
    },

})
