({
    extendsFrom: 'RecordView',

    initialize: function (options) {
        this._super("initialize", [options]);
        this.model.on('sync', this.roFunction, this);
        this.model.on('change:etapa', this.refrescaPipeLine, this);
        this.model.on("change:referenciador",this.addRegion, this);
        this.model.on("change:empleados_c",this.adDepartment, this);
        this.model.addValidationTask('fecha_req', _.bind(this.validaFecha, this));
        this.model.addValidationTask('referenciado', _.bind(this.validauser, this));
        this.model.addValidationTask('Requeridos_c', _.bind(this.valida_Req, this));
    },

    _render: function() {
        this._super("_render");
        //Desabilita accion sobre pipeline
        $('[data-name="seguro_pipeline"]').attr('style', 'pointer-events:none');
        //Oculta etiqueta del campo custom pipeline_opp
        $("div.record-label[data-name='seguro_pipeline']").attr('style', 'display:none;');
        //Desabilita edicion campo pipeline
        this.noEditFields.push('seguro_pipeline');
    },

    roFunction: function() {
    		if(this.model.get('etapa') == 2 || this.model.get('etapa') == 9 || app.user.get('puestousuario_c') != 55)
    		{
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
})