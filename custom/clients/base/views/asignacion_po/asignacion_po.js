({
    className: 'asignacion_po',

    events: {
        'click #btn_guardar': 'guardar',
        'change .oficinas_atiende': 'actualizaOficinasAtiende',
        'click #btnGuardarAsignados': 'saveAsignados',
        'change .usersActive': 'updateAsignado',
    },

    initialize: function(options){
        this._super("initialize", [options]);
        this.loadView = false;
        if(app.user.attributes.asignacion_po_c == 1){
          this.loadView = true;
          asignacionPO = this;
          asignacionPO.lista_equipo = app.lang.getAppListStrings('equipo_list');

          asignacionPO.listAsignadosActualizados = [];

          this.getUsuariosActivos();
          app.alert.show('loadRecords', {
            level: 'process',
            title: 'Cargando...',
          });
          app.api.call("read", app.api.buildURL('getAsignacionPO'), null, {
            success: _.bind(function (data) {
              app.alert.dismiss('loadRecords');
              if(data.length > 0) {

                asignacionPO.listaAsignacionPO = [];
                asignacionPO.listaAsignacionPO_previo = [];

                for(var i = 0; i < data.length; i++) {

                  var equiposOA = data[i].equipos;
                  var equiposOA_concat = "";
                  equiposOA_concat = equiposOA;
         
                  var actual = {
                       "zona_geografica": data[i].zona_geografica,
                       "equipos": equiposOA_concat,
                       "uName": data[i].uName,
                       "date_modified": data[i].date_modified
                   };
                   var previo = {
                     "zona_geografica": data[i].zona_geografica,
                     "equipos": equiposOA_concat,
                     "uName": data[i].uName,
                     "date_modified": data[i].date_modified
                   };
                   asignacionPO.listaAsignacionPO.push(actual);
                   asignacionPO.listaAsignacionPO_previo.push(previo);
                   asignacionPO.Total = data.length;
                }

              } else {
                asignacionPO.listaAsignacionPO = [];
                asignacionPO.listaAsignacionPO_previo = [];
                asignacionPO.Total = 0;
              }
              asignacionPO.render();

              asignacionPO.getRecordsSinEquipo();
            }, this)
          });


        }else{
            var route = app.router.buildRoute(this.module, null, '');
            app.router.navigate(route, {trigger: true});
        }
    },

    getUsuariosActivos: function(){
      app.alert.show('loadActiveUsers', {
        level: 'process',
        title: 'Cargando...',
      });
      app.api.call('GET', app.api.buildURL('Users?filter[0][status][$equals]=Active&fields=id,full_name,first_name&order_by=first_name:ASC&max_num=-1'), null, {
        success: function(data){
          app.alert.dismiss('loadActiveUsers');
          asignacionPO.listUsersActive = data.records;
          
        },
        error: function (e) {
          //console.log(e);
        }
      });
    },

    getRecordsSinEquipo: function(){
      //selfAsignacion = this;
      app.alert.show('loadRegistrosAsignacionPoUsers', {
        level: 'process',
        title: 'Cargando...',
      });
      app.api.call("read", app.api.buildURL('getAsignacionPoUsers'), null, {

        success: _.bind(function (data) {
          app.alert.dismiss('loadRegistrosAsignacionPoUsers');
          if(data.length > 0) {

            asignacionPO.listaAsignacionSinEquipo = [];
            asignacionPO.listaAsignacionPOSinEquipoPrevio = [];

            for(var i = 0; i < data.length; i++) {

              var actual = {
                "id": data[i].id,
                "zona_geografica": data[i].zona_geografica,
                "municipio": data[i].municipio,
                "nMunicipio": data[i].nMunicipio,
                "asignado": data[i].asignado_id,
                "uName": data[i].uName,
                "date_modified": data[i].date_modified
              };

              var previo = {
                "id": data[i].id,
                "zona_geografica": data[i].zona_geografica,
                "municipio": data[i].municipio,
                "nMunicipio": data[i].nMunicipio,
                "asignado": data[i].asignado_id,
                "uName": data[i].uName,
                "date_modified": data[i].date_modified
              };

              asignacionPO.listaAsignacionSinEquipo.push(actual);
              asignacionPO.listaAsignacionPOSinEquipoPrevio.push(previo);

            }
          }else {
            asignacionPO.listaAsignacionSinEquipo = [];
            asignacionPO.listaAsignacionPOSinEquipoPrevio = [];
            
          }

          asignacionPO.render();

        }, this)

      });
    },

    actualizaOficinasAtiende: function(evt) {
      
      var inputs = this.$('[data-field="oficinas_atiende_id"].updateOA');
      var input = this.$(evt.currentTarget);
      var index = inputs.index(input);
      var selectOA = $(evt.currentTarget).val();

      for (var i = 0; i < selectOA.length; i++) {
        selectOA[i] = '^' + selectOA[i] + '^'; 
      }
      asignacionPO.listaAsignacionPO[index].equipos = selectOA.toString();
      $('#btn_guardar').attr('style', 'pointer-events:auto;');
    },
    
    guardar: function(){
        $('#btn_guardar').attr('style', 'pointer-events:none;');
        for(var i = 0; i < asignacionPO.listaAsignacionPO.length; i++) {
          if(asignacionPO.listaAsignacionPO[i].equipos != asignacionPO.listaAsignacionPO_previo[i].equipos) {
            
            app.alert.show("alerta_update", {
                level: 'process',
                title: "Actualizando mapeo, por favor espere.",
                autoClose: false
            });
            var update = {
              zona_geografica: asignacionPO.listaAsignacionPO[i].zona_geografica,
              equipos: asignacionPO.listaAsignacionPO[i].equipos,
              modified_by: App.user.id
            };
            
            var Url = app.api.buildURL("upAsignacionPO", '', {}, {});
            app.api.call("create", Url, update, {
              success: _.bind(function (data) {
                app.alert.dismiss('alerta_update');
                app.alert.show("Confirmacion_agentes", {
                  level: 'success',
                  title: "Mapeo actualizado correctamente",
                  autoClose: true
                });
                //this.buscar();
              }, this),
                error: function (error) {
                  app.alert.dismiss('alerta_update');
                  app.alert.show('Confirmacion_error', {
                    level: 'error',
                    messages: error,
                    autoClose: true
                  });
                }
            });
            asignacionPO.listaAsignacionPO[i].equipos = asignacionPO.listaAsignacionPO[i].equipos;
          }
        }
    },

    updateAsignado: function(evt){
      console.log("updateAsignado");
      var idAsignado = $(evt.currentTarget).val();
      var idRegistro = $(evt.currentTarget).closest('tr').attr('data-id');

      var objetoActualizado = { "asignado": idAsignado, "idRegistro": idRegistro };

      asignacionPO.listAsignadosActualizados.push(objetoActualizado);

    },

    saveAsignados: function(){
      if( asignacionPO.listAsignadosActualizados.length > 0 ){

        console.log("ENVIAR OBJETO DE TODOS LOS ACTUALIZADOS");

        app.alert.show('saveAsignados', {
          level: 'process',
          title: 'Cargando...',
        });
        $('#btnGuardarAsignados').attr('style', 'pointer-events:none;');
        $('#btnGuardarAsignados').addClass('disabled');
        app.api.call('create', app.api.buildURL('updateAsignadosPO'),  { newAsignados : asignacionPO.listAsignadosActualizados } , {
          success: _.bind(function (data) {
            $('#btnGuardarAsignados').attr('style', 'pointer-events:block;');
            $('#btnGuardarAsignados').removeClass('disabled');
            
            app.alert.dismiss('saveAsignados');
            
            app.alert.show('successAsignados', {
              level: 'success',
              title: "Éxito",
              messages: data.msj,
              autoClose: true
            });

            asignacionPO.getRecordsSinEquipo();

          }, this),
        });

      }else{
        app.alert.show('sin-registros', {
          level: 'error',
          messages: 'No hay registros por actualizar',
          autoClose: true
      });
      }
    }
})
