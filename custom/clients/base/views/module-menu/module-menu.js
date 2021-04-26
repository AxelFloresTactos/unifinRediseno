({
	/* File: ./custom/clients/base/views/module-menu/module-menu.js */

	extendsFrom: 'ModuleMenuView',

    initialize: function(options) {
        this._super('initialize', [options]);

        //this.customPopulateMenu();
        var puesto_usuario=App.user.attributes.puestousuario_c;
        var privilegio_cartera=App.user.attributes.admin_cartera_c;

        /*
        puesto 6 - BO Leasing, 12 - BO Factoraje, 17 - BO CA
        puesto 5 - Asesor Leasing, 11 - Asesor Factoraje, 16 - Asesor CA, 53 - Asesor Uniclick, 54 - Asesor RM
				puesto 19 - Ejecutivo estrategia comercial
        */
       /**
        * Mostrar sección de menú Quántico cuando usuario tenga el provilegio especial de Admin de Cartera
        */
        //Mostrar lista de tareas únicamente para los puestos mencionados arriba
        /*if(options.module=="Quantico"){

            if(puesto_usuario =="6" || puesto_usuario =="12" || puesto_usuario =="17" || puesto_usuario =="19" || 
            puesto_usuario =="5" || puesto_usuario =="11" || puesto_usuario =="16" || puesto_usuario =="53" || puesto_usuario =="54" ||
            privilegio_cartera==1){

                this.tienePuesto=true;

            }else{
                this.tienePuesto=false;
            }

        }*/

    },

    handleRouteEvent: function(event) {
        var currentRoute,
            $currentTarget = this.$(event.currentTarget),
            route = $currentTarget.data('route');

        switch (route) {
        	case '#Cotizador':
        		route = '#bwc/index.php?entryPoint=OpportunidadVaadin';
        		//app.user.lastState.set('Leads:filter:last-Leads-records', this.meta.filter);
        		break;


            case '#Expediente':
                route = '#bwc/index.php?entryPoint=ExpedienteMod';
                break;

            case '#ExpedienteUniclick':
                route = '#bwc/index.php?entryPoint=ExpedienteUniclick';
                break;


            case '#CotizadorProspectos':
                route = '#bwc/index.php?entryPoint=CotizadorProspectos';
                //app.user.lastState.set('Leads:filter:last-Leads-records', this.meta.filter);
                break;

            case '#BuscaDisposicion':
                route = '#bwc/index.php?entryPoint=BuscaDisposicion';
                //app.user.lastState.set('Leads:filter:last-Leads-records', this.meta.filter);
                break;

            case '#RefinanciamientosMasivos':
                route = '#bwc/index.php?entryPoint=RefinanciamientosMasivos';
                break;

            case '#Quantico':
                route = '#bwc/index.php?entryPoint=ListaTareasQuantico';
                break;
        }

        event.preventDefault();
        if ((!_.isUndefined(event.button) && event.button !== 0) || event.ctrlKey || event.metaKey) {
            event.stopPropagation();
            window.open(route, '_blank');
            return false;
        }

        currentRoute = '#' + Backbone.history.getFragment();
        (currentRoute === route) ? app.router.refresh() : app.router.navigate(route, {trigger: true});
    },

    customPopulateMenu: function () {

	    if(this.module == "Accounts"){
            var meta = app.metadata.getModule(this.module) || {};
            if (_.isEmpty(_.omit(meta.fields, '_hash'))) {
                return;
            }

            app.api.call("read", app.api.buildURL("UserRoles", null, null, {
            }), null, {
                success: _.bind(function (data) {
                    var roleReasignacionPromotores = false;
                    _.each(data, function (key, value) {

                        if (key == "Reasignacion de Promotores" || key == "Admin CRM" ) {
                            roleReasignacionPromotores = true;
                        }
                    });

                    if(roleReasignacionPromotores == false){
                        if(meta.menu.header.meta[5].label == "LNK_REASIGNACION_DE_PROMOTORES"){
                            delete meta.menu.header.meta[5];
                            this.render();
                        }
                    }

                }, this)
            });
        }
    },

})
