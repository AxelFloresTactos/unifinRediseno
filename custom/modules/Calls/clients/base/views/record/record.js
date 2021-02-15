({
    extendsFrom: 'RecordView',

    fechaInicioTemp: "",
    personasRelData_list: null,
    seleccionado:null,
    TipoDePersona:"",
    events: {
        'click .record-edit-link-wrapper': 'handleEdit',
    },

    initialize: function (options) {
        self = this;
        this._super("initialize", [options]);
        this.on('render', this.disableparentsfields, this);
        this.on('render', this.noEditStatus, this);
        //this.model.on('sync', this.bloqueaTodo, this);
        //Habilita el campo parent_name cuando esta vacio y lo deshabilta cuando ya tiene una cuenta
        this.model.on('sync', this.enableparentname, this);
        this.model.on('sync', this.cambioFecha, this);

        this.model.addValidationTask('valida_cuenta_no_contactar', _.bind(this.valida_cuenta_no_contactar, this));
        this.model.addValidationTask('VaildaFechaPermitida', _.bind(this.validaFechaInicial2Call, this));
        this.model.addValidationTask('VaildaConferencia', _.bind(this.validaConferencia, this));

        /*****************************************/
        //this.model.addValidationTask('valida_requeridos_Leads',_.bind(this.valida_requeridos_Leads, this));
        /*********************************************/
        this.model.addValidationTask('VaildaFecha', _.bind(this.VaildaFecha, this));
        /*@Jesus Carrillo
            Funcion que pinta de color los paneles relacionados
        */
        this.model.on('sync', this.fulminantcolor, this);
        $('[data-name="status"]').find('.fa-pencil').remove();
        $('.record-edit-link-wrapper[data-name=status]').remove();

        this.model.on('sync', this.disablestatus1, this);
        this.model.on('sync', this.disableFieldsTime, this);
        this.model.on('sync', this.getPersonas, this);
        this.model.on('sync', this.hidePErsonaEdit, this);

        this.model.addValidationTask('resultCallReq', _.bind(this.resultCallRequerido, this));
        this.events['click a[name=edit_button]'] = 'fechascallsymeet';
        this.model.addValidationTask('rqueridoPErsona', _.bind(this.reqPersona, this));
        this.model.addValidationTask('valida_requeridos', _.bind(this.valida_requeridos, this));
        /***********  Lead Management  *************/
        this.model.addValidationTask('lead_management', _.bind(this.ConfirmCancelar, this));  //OnConfirm cancelar LEad-PRospecto contactado
        this.model.addValidationTask('lmanage_seg_reun', _.bind(this.SegundaReunion, this));  //OnConfirm cancelar Cuenta segunda llamada

    },

    _render: function (options) {
        this._super("_render");
        this.enableparentname();
        this.getPersonas();
    },

    handleCancel: function () {
        this._super("handleCancel");
        if(self.model.get('persona_relacion_c')!="")
        {
            self.model.set('calls_persona_relacion','Muestra')
        }
    },

    bloqueaTodo: function () {
        //this._super("_renderHtml");
        var self = this;

        if (this.model.get('status') == 'Held' || this.model.get('status') == 'Not Held') {

            _.each(this.model.fields, function (field) {
                self.noEditFields.push(field.name);
            }, self);

        }

    },

    resultCallRequerido: function (fields, errors, callback) {
        if (this.model.get('status') == 'Held' || this.model.get('status') == 'Not Held') {
            if (this.model.get('tct_resultado_llamada_ddw_c') == '') {
                /*app.alert.show("Resultado de la llamada", {
                    level: "error",
                    messages: "El resultado de la Llamada es requerido",
                    autoClose: false
                });*/
                errors['tct_resultado_llamada_ddw_c'] = errors['tct_resultado_llamada_ddw_c'] || {};
                errors['tct_resultado_llamada_ddw_c'].required = true;

            }
        }
        callback(null, fields, errors);
    },

    /*
    * F. Javier G. Solar 13/09/2018
    * Se bloquea el campo estatus si aun no se ha cumplido la fecha y hora cumplida**/
    disablestatus1: function () {

        if (Date.parse(this.model.get('date_end')) > Date.now() || this.model.get('status') == 'Held' || this.model.get('status') == 'Not Held') {
            $('span[data-name=status]').css("pointer-events", "none");
        } else {
            $('span[data-name=status]').css("pointer-events", "auto");
        }

    },

    /**
     * @author Salvador Lopez
     * Se habilita handleEdit, editClicked y cancelClicked para dejar habilitado el campo parent_name y solo se bloquea al
     * dar click en el campo e intentar editar
     * */
    handleEdit: function (e, cell) {
        var target,
            cellData,
            field;
        if (e) { // If result of click event, extract target and cell.
            target = this.$(e.target);
            cell = target.parents('.record-cell');
        }

        if (e.currentTarget.dataset['name'] == 'parent_name') {

            this.inlineEditMode = false;

        } else {

            cellData = cell.data();
            field = this.getField(cellData.name);

            // Set Editing mode to on.
            this.inlineEditMode = true;

            this.setButtonStates(this.STATE.EDIT);

            this.toggleField(field);

            if (cell.closest('.headerpane').length > 0) {
                this.toggleViewButtons(true);
                this.adjustHeaderpaneFields();
            }

        }


    },

    editClicked: function () {
        this._super("editClicked");

        if (this.model.get('status') == 'Held' || this.model.get('status') == 'Not Held') {
            this.setButtonStates(this.STATE.VIEW);
            this.action = 'detail';
            this.toggleEdit(false);
            this.setRoute('');

        }

    },

    cancelClicked: function () {

        this._super("cancelClicked");

        this.$('[data-name="parent_name"]').attr('style', '');
        this.setButtonStates(this.STATE.VIEW);
        this.action = 'detail';
        this.handleCancel();
        this.clearValidationErrors(this.editableFields);
        this.setRoute();
        this.unsetContextAction();
    },

    /*Victor Martinez Lopez
    *25-09-2018
    *El campo parent_name se habilita cuando esta vacio
    */
    enableparentname: function () {
        if (this.model.get('parent_name') !== '' && this.model.get('parent_name') !== undefined) {
            var self = this;
            self.noEditFields.push('parent_name');
        }
        else {
            this.$('[data-name="parent_name"]').attr('style', '');
            //this.setButtonStates(this.STATE.EDIT);
            this.action = 'detail';
            this.toggleEdit(false);
            //this.setRoute('edit');
        }

        this.disableFieldCallMeeting();
    },

    disableFieldCallMeeting: function () {

        //Reemplazo de etiqueta

        if (this.model.get('status') == 'Held' || this.model.get('status') == 'Not Held') {
            //Establecer como solo lectura el campo custom para creación de Reuniones o llamadas

            //Se remueve la clase record-edit-link-wrapper para evitar que se muestre el template edit del campo custom
            $('span[data-name="calls_meeting_call"]').siblings('span.record-edit-link-wrapper').removeClass('record-edit-link-wrapper');
            //Remover ícono de lapiz
            $('span[data-name="calls_meeting_call"]').find('.fa-pencil').remove();
        }

        /*Cuando el registro de la llamada ya cuenta con un registro "hijo" (llamada o reunión),
        se bloquea campo de resultado para evitar que se cree un nuevo registro "hijo" pero de otro tipo*/
        if (this.model.get('tct_resultado_llamada_ddw_c') == "Cita" || this.model.get('tct_resultado_llamada_ddw_c') == "Nueva_llamada") {

            this.noEditFields.push('tct_resultado_llamada_ddw_c');

        }
    },


    VaildaFecha: function (fields, errors, callback) {
        var startDate = new Date(this.model.get('date_start'));
        var startMonth = startDate.getMonth() + 1;
        var startDay = startDate.getDate();
        var startYear = startDate.getFullYear();
        var startDateText = startDay + "/" + startMonth + "/" + startYear;
        var conferDate = new Date(this.model.get('tct_conferencia_fecha_dat_c'));
        var conferMonth = conferDate.getMonth() + 1;
        var conferDay = conferDate.getDate();
        var conferYear = conferDate.getFullYear();
        var conferDateText = conferDay + "/" + conferMonth + "/" + conferYear;
        var startToDate = Date.parse(startDateText);
        var inputToDate = Date.parse(conferDateText);
        if (inputToDate < startToDate) {
            app.alert.show("Fecha Incorrecta", {
                level: "error",
                title: "La fecha a contactar debe ser mayor a la fecha actual",
                autoClose: false
            });
            errors['tct_conferencia_fecha_dat_c'] = "La fecha a contactar debe ser mayor a la fecha actual";
            errors['tct_conferencia_fecha_dat_c'].required = true;
        }
        callback(null, fields, errors);
    },

    validaConferencia: function (fields, errors, callback) {
        if (this.model.get('tct_conferencia_chk_c') && this.model.get('tct_calificacion_conferencia_c') === "") {
            /*app.alert.show("Calificacion Requerida", {
              level: "error",
              title: "El campo Calificaci&oacuten de la Conferencia es requerido",
              autoClose: false
            });*/
            errors['tct_calificacion_conferencia_c'] = "El campo Calificaci&oacuten de la Conferencia es requerido";
            errors['tct_calificacion_conferencia_c'].required = true;
        }

        if (this.model.get('tct_conferencia_chk_c') && this.model.get('tct_conferencia_fecha_dat_c') != '') {
            //var todayDate = new Date();
            var dateStart = Date.parse(this.model.get('date_start'));
            var inputToDate = Date.parse(this.model.get('tct_conferencia_fecha_dat_c'));
            if (dateStart > inputToDate) {
                app.alert.show("Fecha_Incorrecta_Conferencia", {
                    level: "error",
                    title: "La fecha a contactar debe ser mayor a la fecha de inicio",
                    autoClose: false
                });

                errors['tct_conferencia_fecha_dat_c'] = "La fecha a contactar debe ser mayor a la fecha de inicio";
                errors['tct_conferencia_fecha_dat_c'].required = true;
            }
        }

        callback(null, fields, errors);
    },

    /* @Salvador Lopez Y Adrian Arauz
        Oculta los campos relacionados
    */
    disableparentsfields: function () {

        //this.$('[data-name="parent_name"]').attr('style', 'pointer-events:none;');

        //Elimina �cono de l�piz para editar parent_name
        $('[data-name="parent_name"]').find('.fa-pencil').remove();

    },

    /*Victor Martinez Lopez
    *El estado no es editable de manera directa al dar click, solo cuando se presiona el boton editar
    */
    noEditStatus: function () {
        $('[data-name="status"]').find('.fa-pencil').remove();
        $('.record-edit-link-wrapper[data-name=status]').remove();
    },

    cambioFecha: function () {
        this.fechaInicioTemp = Date.parse(this.model.get("date_start"));
        // console.log("Fechas: " + this.fechaInicioTemp);
        //Coloca solo lectura el campo Conferencia
        if (this.model.get('tct_conferencia_chk_c')) {
            var self = this;
            self.noEditFields.push('tct_conferencia_chk_c');
            $('.record-edit-link-wrapper[data-name=tct_conferencia_chk_c]').remove();
        }
    },

    valida_cuenta_no_contactar: function (fields, errors, callback) {

        if (this.model.get('parent_id') && this.model.get('parent_type') == "Accounts") {
            var account = app.data.createBean('Accounts', {id: this.model.get('parent_id')});
            account.fetch({
                success: _.bind(function (model) {
                    if (model.get('tct_no_contactar_chk_c') == true) {

                        app.alert.show("cuentas_no_contactar", {
                            level: "error",
                            title: "Cuenta No Contactable<br>",
                            messages: "Cualquier duda o aclaraci\u00F3n, favor de contactar al \u00E1rea de <b>Administraci\u00F3n de cartera</b>",
                            autoClose: false
                        });

                        errors['parent_name'] = errors['parent_name'] || {};
                        errors['parent_name'].required = true;

                    }
                    callback(null, fields, errors);
                }, this)
            });
        } else {
            callback(null, fields, errors);
        }

    },

    /* @F. Javier G. Solar
     * Valida que la Fecha Inicial no sea menor que la actual
     * 14/08/2018
     */
    validaFechaInicial2Call: function (fields, errors, callback) {

        // FECHA ACTUAL
        var dateActual = new Date();
        var d1 = dateActual.getDate();
        var m1 = dateActual.getMonth() + 1;
        var y1 = dateActual.getFullYear();
        var dateActualFormat = [m1, d1, y1].join('/');
        var fechaActual = Date.parse(dateActualFormat);

        // FECHA INICIO ANTES DE CAMBIAR
        var dateInicioTmp = new Date(this.fechaInicioTemp);
        var d = dateInicioTmp.getDate();
        var m = dateInicioTmp.getMonth() + 1;
        var y = dateInicioTmp.getFullYear();
        var fechaCompletaTmp = [m, d, y].join('/');
        var fechaInicioTmp = Date.parse(fechaCompletaTmp);

        // FECHA INICIO EN CAMPO
        var dateInicio = new Date(this.model.get("date_start"));
        var d = dateInicio.getDate();
        var m = dateInicio.getMonth() + 1;
        var y = dateInicio.getFullYear();
        var fechaCompleta = [m, d, y].join('/');
        var fechaInicioNueva = Date.parse(fechaCompleta);

        if (fechaInicioTmp != fechaInicioNueva) {
            if (fechaInicioTmp < fechaActual) {
                if (fechaInicioNueva >= fechaInicioTmp) {
                    console.log("Guarda por opcion 1");
                }
                else {
                    app.alert.show("Fecha no valida", {
                        level: "error",
                        title: "No puedes guardar una Llamada con fecha menor a la que se habia establecido",
                        autoClose: false
                    });

                    app.error.errorName2Keys['custom_message_date_init0'] = 'No puedes guardar una Llamada con fecha menor a la que se habia establecido';
                    errors['date_start'] = errors['date_start'] || {};
                    errors['date_start'].custom_message_date_init0 = true;
                }

                //callback(null, fields, errors);
            }
            if (fechaInicioTmp >= fechaActual) {
                if (fechaInicioNueva >= fechaActual) {
                    console.log("Guarda por opcion 2")
                }
                else {
                    app.alert.show("Fecha no valida", {
                        level: "error",
                        title: "No puedes agendar Llamada con fecha menor al d&Iacutea de hoy",
                        autoClose: false
                    });

                    app.error.errorName2Keys['custom_message_date_init1'] = 'No puedes agendar Llamada con fecha menor al d&Iacutea de hoy';
                    errors['date_start'] = errors['date_start'] || {};
                    errors['date_start'].custom_message_date_init1 = true;
                }

                //callback(null, fields, errors);
            }
        }
        callback(null, fields, errors);
    },

    /*@Jesus Carrillo
        Funcion que pinta de color los paneles relacionados
    */
    fulminantcolor: function () {
        this.blockRecordNoContactar();
        $('#space').remove();
        $('.control-group').before('<div id="space" style="background-color:#000042"><br></div>');
        $('.control-group').css("background-color", "#e5e5e5");
        $('.a11y-wrapper').css("background-color", "#e5e5e5");
        //$('.a11y-wrapper').css("background-color", "#c6d9ff");
    },

    blockRecordNoContactar: function () {

        var id_cuenta = this.model.get('parent_id');

        if (id_cuenta != '' && id_cuenta != undefined && this.model.get('parent_type') == "Accounts") {

            var account = app.data.createBean('Accounts', {id: this.model.get('parent_id')});
            account.fetch({
                success: _.bind(function (model) {

                    if (model.get('tct_no_contactar_chk_c') == true) {

                        app.alert.show("cuentas_no_contactar", {
                            level: "error",
                            title: "Cuenta No Contactable<br>",
                            messages: "Unifin ha decidido NO trabajar con la cuenta relacionada a esta llamada.<br>Cualquier duda o aclaraci\u00F3n, favor de contactar al \u00E1rea de <b>Administraci\u00F3n de cartera</b>",
                            autoClose: false
                        });

                        //Bloquear el registro completo y mostrar alerta
                        $('.record').attr('style', 'pointer-events:none')
                    }
                }, this)
            });

        }

    },

    /*Victor Martinez López
    * Duración y recordatorios no son editables cuando la reunión esta como realizada
    * */
    disableFieldsTime: function () {
        $('.record-edit-link-wrapper[data-name=duration]').remove();
        $('.record-edit-link-wrapper[data-name=reminders]').remove();
        if (this.model.get('tct_resultado_llamada_ddw_c') == '') {
            this.$("[data-name='tct_resultado_llamada_ddw_c']").prop("enable", true);
        } else {
            $('.record-edit-link-wrapper[data-name=tct_resultado_llamada_ddw_c]').remove();
        }

        //Establece campo dependientes de resultado de llamada como editables mientras sea planeado
        if (this.model.get('status') == 'Planned') {
            this.$("[data-name='tct_motivo_ilocalizable_ddw_c']").prop("enable", true);
            this.$("[data-name='tct_usuario_cita_rel_c']").prop("enable", true);
            this.$("[data-name='tct_fecha_cita_dat_c']").prop("enable", true);
            this.$("[data-name='tct_fecha_seguimiento_dat_c']").prop("enable", true);
            this.$("[data-name='tct_motivo_desinteres_ddw_c']").prop("enable", true);
        } else {
            $('.record-edit-link-wrapper[data-name=tct_motivo_ilocalizable_ddw_c]').remove();
            $('.record-edit-link-wrapper[data-name=tct_usuario_cita_rel_c]').remove();
            $('.record-edit-link-wrapper[data-name=tct_fecha_cita_dat_c]').remove();
            $('.record-edit-link-wrapper[data-name=tct_fecha_seguimiento_dat_c]').remove();
            $('.record-edit-link-wrapper[data-name=tct_motivo_desinteres_ddw_c]').remove();
        }
    },

    fechascallsymeet: function () {
        if (this.model.get('status') == 'Held' || this.model.get('status') == 'Not Held') {
            var self = this;
            self.noEditFields.push('date_start');
            self.noEditFields.push('date_end');
            self.render();
        }
    },

    valida_requeridos: function (fields, errors, callback) {
        var campos = "";
        _.each(errors, function (value, key) {
            _.each(this.model.fields, function (field) {
                if (_.isEqual(field.name, key)) {
                    if (field.vname) {
                        campos = campos + '<b>' + app.lang.get(field.vname, "Calls") + '</b><br>';
                    }
                }
            }, this);
        }, this);
        if (campos) {
            app.alert.show("Campos Requeridos", {
                level: "error",
                messages: "Hace falta completar la siguiente información en la <b>Llamada:</b><br>" + campos,
                autoClose: false
            });
        }
        callback(null, fields, errors);
    },

    valida_requeridos_Leads: function (fields, errors, callback) {
        var requerido = 0;
        var texto = "";
        if (this.model.get('parent_id') != "" && this.model.get('parent_type') == "Leads" && this.model.get('status') == "Held") {
            var lead = app.data.createBean('Leads', {id: this.model.get('parent_id')});
            lead.fetch({
                success: _.bind(function (model) {
                    //
                    //if(model.get('tct_no_contactar_chk_c')==true){
                    //regimen_fiscal_c
                    //Persona Fisica,Persona Fisica con Actividad Empresarial,Persona Moral
                    if (model.get('subtipo_registro_c') == "1") {

                        if (model.get('nombre_empresa_c') == '' && model.get('regimen_fiscal_c') == 'Persona Moral') {
                            errors['nombre_empresa_c'] = errors['nombre_empresa_c'] || {};
                            errors['nombre_empresa_c'].required = true;
                            texto += "<b>Nombre de la Empresa</b> <br>";
                            requerido++;
                        }

                        if (model.get('nombre_c') == '' && model.get('apellido_paterno_c') == '' &&
                            model.get('regimen_fiscal_c') != 'Persona Moral') {
                            errors['nombre_c'] = errors['nombre_c'] || {};
                            errors['nombre_c'].required = true;
                            texto += "<b>Nombre</b> <br>";
                            errors['apellido_paterno_c'] = errors['apellido_paterno_c'] || {};
                            errors['apellido_paterno_c'].required = true;
                            texto += "<b>Apellido Paterno</b> <br>";
                            requerido++;
                        }

                        if (model.get('origen_c') == '') {
                            errors['origen_c'] = errors['origen_c'] || {};
                            errors['origen_c'].required = true;
                            texto += "<b>Origen</b> <br>";
                            requerido++;
                        }

                        if (model.get('macrosector_c') == '') {
                            errors['macrosector_c'] = errors['macrosector_c'] || {};
                            errors['macrosector_c'].required = true;
                            texto += "<b>Macro Sector</b> <br>";
                            requerido++;
                        }

                        if (model.get('ventas_anuales_c') == 0.00) {
                            errors['ventas_anuales_c'] = errors['ventas_anuales_c'] || {};
                            errors['ventas_anuales_c'].required = true;
                            texto += "<b>Ventas Anuales</b> <br>";
                            requerido++;
                        }

                        if (model.get('potencial_lead_c') == 0.00) {
                            errors['potencial_lead_c'] = errors['potencial_lead_c'] || {};
                            errors['potencial_lead_c'].required = true;
                            texto += "<b>Potencial de Lead</b> <br>";
                            requerido++;
                        }


                        if (model.get('zona_geografica_c') == '') {
                            errors['zona_geografica_c'] = errors['zona_geografica_c'] || {};
                            errors['zona_geografica_c'].required = true;
                            texto += "<b>Zona Geográfica</b> <br>";
                            requerido++;
                        }

                        if (model.get('email') == null || model.get('email') == "") {
                            errors['email'] = errors['email'] || {};
                            errors['email'].required = true;
                            texto += "<b>Email</b> <br>";
                            requerido++;
                        }

                        if (model.get('puesto_c') == '' && model.get('regimen_fiscal_c') != 'Persona Moral') {
                            errors['puesto_c'] = errors['puesto_c'] || {};
                            errors['puesto_c'].required = true;
                            texto += "<b>Puesto</b> <br>";
                            requerido++;
                        }

                        if (model.get('assigned_user_id') == '') {
                            errors['assigned_user_id'] = errors['assigned_user_id'] || {};
                            errors['assigned_user_id'].required = true;
                            texto += "<b>Promotor asignado</b> <br>";
                            requerido++;
                        }

                        if (model.get('phone_home') == '' && model.get('phone_mobile') == '' && model.get('phone_work') == '') {
                            errors['phone_home'] = errors['phone_home'] || {};
                            errors['phone_home'].required = true;
                            errors['phone_mobile'] = errors['phone_mobile'] || {};
                            errors['phone_mobile'].required = true;
                            errors['phone_work'] = errors['phone_work'] || {};
                            errors['phone_work'].required = true;

                            texto += "<b>Necesita agregar al menos un teléfono</b> <br>";
                            requerido++;
                        }

                        /*if (model.get('leads_leads_1_name')=='') {
                            errors['leads_leads_1_name'] = errors['leads_leads_1_name'] || {};
                            errors['leads_leads_1_name'].required = true;
                            texto += "<b>No se tiene contacto asociado</b> <br>";
                            requerido++;
                        }*/

                        if (requerido > 0) {
                            app.alert.show("Campos Requeridos en Leads", {
                                level: "error",
                                messages: 'Hace falta completar la siguiente información en el <b>Lead</b>: <br> ' + texto,
                                autoClose: false
                            });
                            callback(null, fields, errors);
                        } else {
                            callback(null, fields, errors);
                        }
                    } else {
                        callback(null, fields, errors);
                    }
                }, this)
            });
        } else {
            callback(null, fields, errors);
        }
        //this._super('_render');
        //callback(null, fields, errors);
    },

    ConfirmCancelar: function (fields, errors, callback) {
        var puesto_usuario = App.user.attributes.puestousuario_c;
        var leasingPuestos = ['1', '2', '3', '4', '5', '6', '20', '33', '44', '55'];
        if ($.isEmptyObject(errors) && this.model.get('parent_id') != "" && this.model.get('parent_type') == "Leads" && this.model.get('status') == "Held" && leasingPuestos.includes(puesto_usuario)) {
            var lead = app.data.createBean('Leads', {id: this.model.get('parent_id')});
            lead.fetch({
                success: _.bind(function (model) {
                    var puesto_usuario = App.user.attributes.puestousuario_c;
                    if (model.get('subtipo_registro_c') == '1' || model.get('subtipo_registro_c') == '2') {
                        if (this.model.get('tct_resultado_llamada_ddw_c') == 'Ilocalizable' || this.model.get('tct_resultado_llamada_ddw_c') == 'No_esta_Interesado' || this.model.get('tct_resultado_llamada_ddw_c') == 'Fuera_de_Perfil') {
                            model.set('lead_cancelado_c', true);
                            model.save();

                            app.alert.show('message-id', {
                                level: 'success',
                                messages: 'Lead Cancelado',
                                autoClose: true
                            });
                            /*************************************************/
                            if (Modernizr.touch) {
                                app.$contentEl.addClass('content-overflow-visible');
                            }
                            /**check whether the view already exists in the layout.
                             * If not we will create a new view and will add to the components list of the record layout
                             * */

                                //var quickCreateView = this.layout.getComponent('MotivoCancelModal');
                            var quickCreateView = null;
                            if (!quickCreateView) {
                                /** Create a new view object */
                                quickCreateView = app.view.createView({
                                    context: this.context,
                                    name: 'MotivoCancelModal',
                                    layout: this.layout,
                                    module: 'Calls'
                                });
                                /** add the new view to the components list of the record layout*/
                                this.layout._components.push(quickCreateView);
                                this.layout.$el.append(quickCreateView.$el);
                            }
                            /**triggers an event to show the pop up quick create view*/
                            this.layout.trigger("app:view:MotivoCancelModal");
                            /**************************************/
                            callback(null, fields, errors);
                        } else if (this.model.get('tct_resultado_llamada_ddw_c') == 'Checklist_expediente' && puesto_usuario != "31") {
                            var filter_arguments = {
                                "id": this.model.get('parent_id')
                            };
                            elemento = document.getElementById("content");
                            elemento.setAttribute("style", "position: fixed;");

                            app.api.call("create", app.api.buildURL("existsLeadAccounts", null, null, filter_arguments), null, {
                                success: _.bind(function (data) {
                                    //console.log(data);
                                    app.alert.dismiss('upload');
                                    app.controller.context.reloadData({});
                                    if (data.idCuenta === "") {
                                        app.alert.show("Conversión", {
                                            level: "error",
                                            messages: data.mensaje,
                                            autoClose: false
                                        });
                                        errors['status'] = errors['status'] || {};
                                        errors['status'].required = true;
                                        callback(null, fields, errors);
                                    } else {
                                        app.alert.show("Conversión", {
                                            level: "success",
                                            messages: data.mensaje,
                                            autoClose: false
                                        });
                                        //this._disableActionsSubpanel();
                                        callback(null, fields, errors);
                                    }

                                }, this),
                                failure: _.bind(function (data) {
                                    app.alert.dismiss('upload');
                                    errors['status'] = errors['status'] || {};
                                    errors['status'].required = true;
                                    callback(null, fields, errors);
                                }, this),
                                error: _.bind(function (data) {
                                    errors['status'] = errors['status'] || {};
                                    errors['status'].required = true;
                                    app.alert.dismiss('upload');
                                    callback(null, fields, errors);
                                }, this)
                            });
                        } else {
                            callback(null, fields, errors);
                        }
                    } else {
                        callback(null, fields, errors);
                    }
                }, this)
            });
        } else {
            callback(null, fields, errors);
        }
    },

    SegundaReunion: function (fields, errors, callback) {
        var idcall = this.model.get('id');
        var held = 0;
        var puesto_usuario = App.user.attributes.puestousuario_c;
        var leasingPuestos = ['1', '2', '3', '4', '5', '6', '20', '33', '44', '55'];

        if ($.isEmptyObject(errors) && this.model.get('parent_id') != "" && this.model.get('parent_type') == "Accounts" && this.model.get('status') == "Held" && leasingPuestos.includes(puesto_usuario)) {

            app.api.call('get', app.api.buildURL('getallcallmeetAccount/?id_Account=' + this.model.get('parent_id')), null, {
                success: _.bind(function (data) {
                    obj = JSON.parse(data);
                    if (obj.total > 0) {
                        // Cancelar - no esta interesado, NO viable, NO interesado- cita forada,Cancelada por el prospecto no le interesa
                        /*************************************************/
                        if (Modernizr.touch) {
                            app.$contentEl.addClass('content-overflow-visible');
                        }
                        /**check whether the view already exists in the layout.
                         * If not we will create a new view and will add to the components list of the record layout
                         * */

                            //var quickCreateView = this.layout.getComponent('MotivoCancelModal');
                        var quickCreateView = null;
                        if (!quickCreateView) {
                            /** Create a new view object */
                            quickCreateView = app.view.createView({
                                context: this.context,
                                name: 'SegundaReunionModal',
                                layout: this.layout,
                                module: 'Calls'
                            });
                            /** add the new view to the components list of the record layout*/
                            this.layout._components.push(quickCreateView);
                            this.layout.$el.append(quickCreateView.$el);
                        }
                        /**triggers an event to show the pop up quick create view*/
                        this.layout.trigger("app:view:SegundaReunionModal");
                        /**************************************/
                        callback(null, fields, errors);
                    } else {
                        callback(null, fields, errors);
                    }
                }, this)
            });
        } else {
            callback(null, fields, errors);
        }
    },

    reqPersona: function (fields, errors, callback) {
        var idCuenta = person.model.get('parent_id');
        var parentModule = person.model.get('parent_type');
        if(idCuenta!=undefined && idCuenta!="" && parentModule !=undefined && parentModule == 'Accounts'){
            var idUsrFirmado = App.user.attributes.id;
            var tipoCuenta = person.TipoDePersona;
            var idUsrAsignado = person.model.get('assigned_user_id');
            var puestosDispo = app.lang.getAppListStrings('puestos_llamadas_list');
            var arrayPuestos = [];
            Object.keys(puestosDispo).forEach(function (key) {
                arrayPuestos.push(Number(key));
            });
            var puesto_usr = Number(app.user.attributes.puestousuario_c);

            if (arrayPuestos.includes(puesto_usr) && idUsrFirmado == idUsrAsignado && tipoCuenta == 'Persona Moral' && this.model.get('persona_relacion_c') == "") {
                app.alert.show("Falta Persona", {
                    level: "error",
                    title: "Hace falta completar la siguiente información: <br> Persona con quien se atiende la llamada. <br> Nota: Si no cuenta con algún registro, favor de agregar uno en el módulo de RELACIÓN.",
                    autoClose: false
                });
                $('[data-name="calls_persona_relacion"]').find('.select2-choice').css('border-color', 'red');
                errors['calls_persona_relaccion'] = errors['calls_persona_relaccion'] || {};
                errors['calls_persona_relaccion'].custom_message1 = true;
            }
        }
        callback(null, fields, errors);
    },

    getPersonas: function () {
        nombreSelect="";
        var idCuenta = selfPerson.model.get('parent_id');
        var parentModule = selfPerson.model.get('parent_type');
        if(idCuenta!=undefined && idCuenta!="" && parentModule !=undefined && parentModule == 'Accounts'){
            app.api.call('GET', app.api.buildURL('GetRelRelaciones/' + idCuenta), null, {
                success: function (data) {
                    //console.log(data.records);
                    var idpersonas = selfPerson.model.get('persona_relacion_c');
                    var arrayPersonas = [];
                    var isSelect = false;
                    for (var i = 0; i < data.length; i++) {

                        if (idpersonas != "" && idpersonas == data[i]['id']) {
                            isSelect = true;
                            nombreSelect=data[i]['name'];
                        }else
                        {
                            isSelect = false;
                        }
                        arrayPersonas.push({
                            "id": data[i]['id'],
                            "name": data[i]['name'],
                            "select": isSelect
                        });
                    }
                    console.log(arrayPersonas);
                    selfPerson.seleccionado=nombreSelect;
                    selfPerson.personasRelData_list = arrayPersonas;
                    selfPerson.render();
                    if(idpersonas!="")
                    {
                        selfPerson.model.set('calls_persona_relacion','nombreSelect')
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
    },

    hidePErsonaEdit: function () {
        person = this;
        var puestosDispo = app.lang.getAppListStrings('puestos_llamadas_list');
        var arrayPuestos = [];
        Object.keys(puestosDispo).forEach(function (key) {
            arrayPuestos.push(Number(key));
        });
        var puesto_usr = Number(app.user.attributes.puestousuario_c);
        var parentiD = person.model.get('parent_id');
        var parentModule = person.model.get('parent_type');

        if (parentModule == 'Accounts') {
            app.api.call("read", app.api.buildURL("Accounts/" + parentiD, null, null, {}), null, {
                success: function (data) {
                    console.log(data);
                    person.TipoDePersona=data.tipodepersona_c;
                   if (arrayPuestos.includes(puesto_usr) && data.tipodepersona_c == 'Persona Moral') {
                       person.$('[data-name="persona_relacion_c"]').hide()
                        // Valida si el usuario firmado pertenece a la cuenta o a la llamada
                        var idUsrFirmado = app.user.attributes.id;
                        var idUsrLeading = data.user_id_c;
                        var idUsrAsignado = person.model.get('assigned_user_id');
                        if (idUsrFirmado != idUsrAsignado || idUsrFirmado != idUsrLeading) {
                            $('[data-name="calls_persona_relacion"]').attr('style', 'pointer-events:none')
                        }
                    }
                    else {
                       person.$('[data-name="calls_persona_relacion"]').hide();
                       person.$('[data-name="persona_relacion_c"]').hide();
                    }
                },
                error: function (e) {
                    console.log(e);
                }
            });
        } else {
            $person.$('[data-name="calls_persona_relacion"]').hide();
            person.$('[data-name="persona_relacion_c"]').hide();
        }


    },

})