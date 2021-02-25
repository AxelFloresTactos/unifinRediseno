({
    extendsFrom: 'RecordView',

    initialize: function (options) {
        this._super("initialize", [options]);
        this.model.on('sync', this.roFunction, this);
        this.model.on('change:etapa', this.refrescaPipeLine, this);
        this.model.on("change:referenciador",this.addRegion, this);
        this.model.on("change:empleados_c",this.adDepartment, this);
        this.model.on("change:tipo_cuenta_c",this.setTipo, this);
        this.model.addValidationTask('fecha_req', _.bind(this.validaFecha, this));
        this.model.addValidationTask('referenciado', _.bind(this.validauser, this));
        this.model.addValidationTask('Requeridos_c', _.bind(this.valida_Req, this));
        this.model.addValidationTask('prima_neta_ganada_c', _.bind(this.valida_PN, this));
        this.model.addValidationTask('comision_c', _.bind(this.comision, this));
        this.model.addValidationTask('validaDoc', _.bind(this.validaDoc, this));
        this.model.addValidationTask('Notifica', _.bind(this.notifica, this));
    },

    _render: function() {
        this._super("_render");
        //Desabilita accion sobre pipeline
        $('[data-name="seguro_pipeline"]').attr('style', 'pointer-events:none');
        //Oculta etiqueta del campo custom pipeline_opp
        $("div.record-label[data-name='seguro_pipeline']").attr('style', 'display:none;');
        //Desabilita edicion campo pipeline
        this.noEditFields.push('seguro_pipeline');
        //Oculta campo UNI2
        this.$('[data-name=seguro_uni2_c]').hide();
    },

    setTipo: function() {
        //Pone el tipo de cliente
        this.model.set('tipo_cliente_c', 1);
        if(this.model.get('tipo_cuenta_c') == 3) this.model.set('tipo_cliente_c', 2);
    },

    roFunction: function() {
    		if(this.model.get('etapa') == 2 || this.model.get('etapa') == 5 || this.model.get('etapa') == 9 || this.model.get('etapa') == 10 || (app.user.get('puestousuario_c') != 56 && this.model.get('etapa') != 1))
    		{
          $('[name="edit_button"]').hide();
    		  _.each(this.model.fields, function(field)
       	  {
     			  this.noEditFields.push(field.name);
            $('.record-edit-link-wrapper[data-name='+field.name+']').remove();
         	},this);
     			this.noEditFields.push('prima_objetivo');
          this.$("[data-name='prima_objetivo']").attr('style', 'pointer-events:none;');
      	}
    },
        
    addRegion: function() {
      var usrid = this.model.get('user_id1_c');
      app.api.call("read", app.api.buildURL("Users/" + usrid, null, null, {}), null, {
        success: _.bind(function (data) {
          this.model.set('region',data.region_c);
        }, this)
      });
    },

    adDepartment: function() {
      var empid = this.model.get('user_id2_c');
      app.api.call("read", app.api.buildURL("Employees/" + empid, null, null, {}), null, {
        success: _.bind(function (data) {
          this.model.set('departamento_c',data.no_empleado_c);
        }, this)
      });
    },

    validaFecha: function(fields, errors, callback) {
      if(this.model.get('date_entered')) {
        var hoy = new Date(this.model.get('date_entered'));
      }
      else {
       var hoy = new Date();
      }
      var fecha_req = new Date(this.model.get('fecha_req'));
      var festivos = app.lang.getAppListStrings('festivos_list');
      for(dias = 1; dias < 10;) {
        hoy.setDate(hoy.getDate()+1);
        var pasa = true;
        var cuenta = 0;
        var total = 0;
        if(hoy.getDay() != 6 && hoy.getDay() != 0) {
          for(var key in festivos) {
            var dia = hoy.getDate();
            var mes = hoy.getMonth()+1;
            var fecha = dia+"/"+mes;
            total = total + 1;
            if(fecha != festivos[key]) cuenta++;
          }
          if(total != cuenta) pasa = false;
        } else pasa = false;
        if(pasa) dias++;
      }
      if(fecha_req < hoy){
        errors['fecha_req'] = errors['fecha_req'] || {};
        errors['fecha_req'].required = true;
        app.alert.show("Fecha", {
          level: "error",
          title: "La fecha en la que se requiere la Oportunidad no debe ser menor a 10 días",
          autoClose: false
        });
        this.model.set('fecha_req','');
      }
      callback(null, fields, errors);
    },

    valida_Req: function (fields, errors, callback) {
        var campos = "";
        _.each(errors, function (value, key) {
            _.each(this.model.fields, function (field) {
                if (_.isEqual(field.name, key)) {
                    if (field.vname) {
                        campos = campos + '<b>' + app.lang.get(field.vname, "S_seguros") + '</b><br>';
                    }
                }
            }, this);
        }, this);

        if (campos) {
            app.alert.show("Campos_Requeridos", {
                level: "error",
                messages: "Hace falta completar la siguiente información en la oportunidad de <b>Seguro:</b><br>" + campos,
                autoClose: false
            });
        }
        callback(null, fields, errors);
    },

    refrescaPipeLine: function () {
        //Limpia pipeline
        pipe_s.render();
        //Ejecuta funcion para actualizar pipeline
        pipe_s.pipelineseguro();

    },

    validauser: function(fields, errors, callback) {
        //Validación para el referenciador asignado no sea un usuario inactivo
        if(this.model.get('user_id1_c')) var usrid = this.model.get('user_id1_c');
        if(this.model.get('user_id2_c')) var usrid = this.model.get('user_id2_c');
        app.api.call("read", app.api.buildURL("Recuperauser/" + usrid, null, null, {}), null, {
            success: _.bind(function (data) {
                if(data=="Inactive"){
                  if(this.model.get('user_id1_c')) {
                    errors['referenciador'] = errors['referenciador'] || {};
                    errors['referenciador'].required = true;
                  }
                  if(this.model.get('user_id2_c')) {
                    errors['empleados_c'] = errors['empleados_c'] || {};
                    errors['empleados_c'].required = true;
                  }
                  app.alert.show("Error Referenciador", {
                    level: "error",
                    title: "El referenciador seleccionado no se encuentra activo, favor de elegir otro.",
                    autoClose: false
                  });
                }
                callback(null, fields, errors);
            }, this),
            error: function (e) {
                throw e;
            }
        });
    },

    valida_PN: function(fields, errors, callback) {
      //Validación de Prima Neta Ganada mayor a 0
      if(this.model.get('prima_neta_ganada_c') <= 0 && this.model.get('etapa') == 9) {
        errors['prima_neta_ganada_c'] = errors['prima_neta_ganada_c'] || {};
        errors['prima_neta_ganada_c'].required = true;
        app.alert.show("Error Prima Neta", {
          level: "error",
          title: "La Prima Neta Ganada debe ser mayor a cero.",
          autoClose: false
        });
      }
      callback(null, fields, errors);
    },

    comision: function(fields, errors, callback) {
      //Validación de Comisión Ganada mayor a 0
      if(this.model.get('comision_c') <= 0 && this.model.get('etapa') == 9) {
        errors['comision_c'] = errors['comision_c'] || {};
        errors['comision_c'].required = true;
        app.alert.show("Error Comision", {
          level: "error",
          title: "La Comisión debe ser mayor a cero.",
          autoClose: false
        });
      }
      callback(null, fields, errors);
    },

    validaDoc: function (fields, errors, callback) {
        var id = this.model.get('id');
        var notikam = this.model.get('notifica_kam_c');
        var etapa = this.model.get('etapa');
        if(notikam == 1 && etapa == 1) {
            app.api.call('GET', app.api.buildURL("S_seguros/" + id + "/link/s_seguros_documents_1"), null, {
                success: function (data) {
                    if(data.records.length == 0) {
                      errors['doc_cliente_c'] = errors['doc_cliente_c'] || {};
                      errors['doc_cliente_c'].required = true;
                      app.alert.show("Error_documento", {
                        level: "error",
                        messages: "Se debe adjuntar al menos un documento para poder notificar al KAM.",
                        autoClose: false
                      });
                    }
                    callback(null, fields, errors);
                },
                error: function (e) {
                    throw e;
                }
            });
        }
        else
        {
          callback(null, fields, errors);
        }
    },

    notifica: function (fields, errors, callback) {
        if (this.model.get('etapa') == 1 || this.model.get('etapa') == 2 || this.model.get('etapa') == 11) {
            app.alert.show("Notifica", {
                level: "info",
                messages: "Favor de Integrar la documentación/Información mínima requerida para determinar las condiciones del seguro a cotizar, tales como: Carátula de póliza actual, términos y condiciones, reporte de siniestralidad, listados de asegurados o bienes por asegurar, ubicaciones del bien, otros",
                autoClose: false
            });
        }
        callback(null, fields, errors);
    },
})