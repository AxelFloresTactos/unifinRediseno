/**
 * @class View.Views.Base.QuickCreateView
 * @alias SUGAR.App.view.views.BaseQuickCreateView
 * @extends View.Views.Base.BaseeditmodalView
 */
({
    extendsFrom: 'BaseeditmodalView',
    fallbackFieldTemplate: 'edit',
    razon_nv_list: null,
    fuera_perfil_list: null,
    condiciones_financieras_list: null,
    no_producto_list: null,
    no_interesado_list: null,
    context_NoViable: null,

    events: {
        'click #btn-cancela': 'closeModal',
        'click #btn-aceptar': 'aceptarModal',
    },

    initialize: function (options) {
        self_modal_get = this;
        contextIdCuentas = options.contextIdCuenta;

        app.view.View.prototype.initialize.call(this, options);
        if (this.layout) {
            this.layout.on('app:view:ModalNoViableCuentas', function () {

                var temp_array_get = [];
                var newContext = options.context.get('model');

                // RAZON CUENTA NO VIABLE
                var razon_noviable = app.lang.getAppListStrings('razones_ddw_list');
                var list_html_nv = '<option value=""></option>';
                _.each(razon_noviable, function (value, key) {
                    list_html_nv += '<option value="' + key + '">' + razon_noviable[key] + '</option>';
                });
                self_modal_get.razon_nv_list = list_html_nv;

                // RAZON FUERA DE PERFIL
                var razon_fueraperfil = app.lang.getAppListStrings('fuera_de_perfil_ddw_list');
                var list_html_fp = '<option value=""></option>';
                _.each(razon_fueraperfil, function (value, key) {
                    list_html_fp += '<option value="' + key + '">' + razon_fueraperfil[key] + '</option>';
                });
                self_modal_get.fuera_perfil_list = list_html_fp;

                //CONDICIONES FINANCIERAS
                var condiciones_financieras = app.lang.getAppListStrings('razones_cf_list');
                var list_html_cf = '<option value=""></option>';
                _.each(condiciones_financieras, function (value, key) {
                    list_html_cf += '<option value="' + key + '">' + condiciones_financieras[key] + '</option>';
                });
                self_modal_get.condiciones_financieras_list = list_html_cf;

                //NO TENEMOS EL PRODUCTO QUE REQUIERE
                var no_producto = app.lang.getAppListStrings('no_producto_requiere_list');
                var list_html_npr = '<option value=""></option>';
                _.each(no_producto, function (value, key) {
                    list_html_npr += '<option value="' + key + '">' + no_producto[key] + '</option>';
                });
                self_modal_get.no_producto_list = list_html_npr;

                //NO SE ENCUENTRA INTERESADO
                var no_interesado = app.lang.getAppListStrings('tct_razon_ni_l_ddw_c_list');
                var list_html_ni = '<option value=""></option>';
                _.each(no_interesado, function (value, key) {
                    list_html_ni += '<option value="' + key + '">' + no_interesado[key] + '</option>';
                });
                self_modal_get.no_interesado_list = list_html_ni;

                self_modal_get.context_NoViable = options;
                self_modal_get.render();
                this.$('.modal').modal({
                    backdrop: '',
                    // keyboard: true,
                    // focus: true
                });
                this.$('.modal').modal('show');
                $('.datepicker').css('z-index', '2000px');
                app.$contentEl.attr('aria-hidden', true);
                $('.modal-backdrop').insertAfter($('.modal'));
                /**If any validation error occurs, system will throw error and we need to enable the buttons back*/
                this.context.get('model').on('error:validation', function () {
                    this.disableButtons(false);
                }, this);
            }, this);
        }
        this.bindDataChange();
    },

    _render: function () {
        this._super("_render");

        $('#RazonNoViable').change(function (evt) {
            self_modal_get.dependenciasNV();
        });
        self_modal_get.dependenciasNV();
    },

    dependenciasNV: function () {

        KeyRazonNV = $("#RazonNoViable").val();
        
        //Campos ocultos dependendientes de no viable
        $('#fuera_perfil').hide();
        $('#cond_financieras').hide();
        $('#competencia_quien').hide();
        $('#competencia_porque').hide();
        $('#no_product').hide();
        $('#otro_producto').hide();
        $('#no_interesado').hide();

        //FUERA DE PERFIL
        if (KeyRazonNV == "1") {
            $('#fuera_perfil').show();
        }
        //CONDICIONES FINANCIERAS
        if (KeyRazonNV == "2") {
            $('#cond_financieras').show();
        }
        //YA ESTA CON LA COMPETENCIA
        if (KeyRazonNV == "3") {
            $('#competencia_quien').show();
            $('#competencia_porque').show();
        }
        //NO TENEMOS EL PRODUCTO QUE REQUIERE
        if (KeyRazonNV == "4") {
            $('#no_product').show();
        }
        //OPCION "OTRO" EN NO TENEMOS EL PRODUCTO QUE REQUIERE
        $('#noProducto').change(function (evt) {
            $('#otro_producto').hide();
            
            if ($("#noProducto").val() == "4"){
                $('#otro_producto').show();
            }
        });
        //NO SE ENCUENTRA INTERESADO
        if (KeyRazonNV == "7") {
            $('#no_interesado').show();
        }
    },

    aceptarModal: function () {

        self_prodnv = this;
        var idProdM = '';
        var usertipoproducto = App.user.attributes.tipodeproducto_c; //Tipo de producto que tiene el usuario
        
        //Valor de la lista de Razon no viable
        if ($("#RazonNoViable").val() != "" && $("#RazonNoViable").val() != "0" && $("#RazonNoViable").val() != undefined && $("#RazonNoViable").val() != null) {
            var KeyRazonNV = $("#RazonNoViable").val();
        }
        //Se obtiene los valores de los campos seleccionados en el modal
        if ($("#FueradePerfil").val() != "" && $("#FueradePerfil").val() != "0" && $("#FueradePerfil").val() != undefined && $("#FueradePerfil").val() != null) {
            var keyfueradePerfil = $("#FueradePerfil").val();
        }
        if ($("#condFinancieras").val() != "" && $("#condFinancieras").val() != "0" && $("#condFinancieras").val() != undefined && $("#condFinancieras").val() != null) {
             var keycondFinancieras = $("#condFinancieras").val();
        }
        if ($("#comp_quien").val() != "" && $("#comp_quien").val() != undefined && $("#comp_quien").val() != null) {
            var txtcomp_quien = $("#comp_quien").val();
        }
        if ($("#comp_porque").val() != "" && $("#comp_porque").val() != undefined && $("#comp_porque").val() != null) {
            var txtcomp_porque = $("#comp_porque").val();
        }
        if ($("#noProducto").val() != "" && $("#noProducto").val() != "0" && $("#noProducto").val() != undefined && $("#noProducto").val() != null) {
            var keynoProducto = $("#noProducto").val();
        }
        if ($("#otroProducto").val() != "" && $("#otroProducto").val() != undefined && $("#otroProducto").val() != null) {
            var txtotroProducto = $("#otroProducto").val();
        }
        if ($("#noInteresado").val() != "" && $("#noInteresado").val() != "0" && $("#noInteresado").val() != undefined && $("#noInteresado").val() != null) {
            var keynoInteresado = $("#noInteresado").val();
        }


        if (contextIdCuentas != "") {

            app.alert.show('no-viable-modal', {
                level: 'process',
                title: 'Cargando...',
            });

            app.api.call('GET', app.api.buildURL('GetProductosCuentas/' + contextIdCuentas), null, {
                success: function (data) {
                    Productos = data;

                    _.each(Productos, function (value, key) {

                        var tipoProducto = Productos[key].tipo_producto;

                        if (tipoProducto == usertipoproducto) {

                            idProdM = Productos[key].id;
                            // console.log("idProdM " + idProdM);

                            var producto = app.data.createBean('uni_Productos', { id: idProdM });
                            producto.fetch({
                                success: _.bind(function (model) {

                                    app.alert.dismiss('no-viable-modal');

                                    app.alert.show('no-viable-producto', {
                                        level: 'success',
                                        messages: 'Se establecio el producto como No Viable!',
                                        autoClose: true
                                    });

                                    model.set('no_viable', true); //CHECK NO VIABLE
                                    model.set('status_management_c', '3'); //ESTATUS PRODUCTO CANCELADO
                                    model.set('no_viable_razon', KeyRazonNV); //RAZON NO VIABLE
                                    model.set('no_viable_razon_fp', keyfueradePerfil); //FUERA DE PERFIL
                                    model.set('no_viable_razon_cf', keycondFinancieras); //CONDICIONES FINANCIERAS
                                    model.set('no_viable_quien', txtcomp_quien); //YA ESTA CON LA COMPETENCIA - ¿QUIEN? TEXTO
                                    model.set('no_viable_porque', txtcomp_porque); //YA ESTA CON LA COMPETENCIA -¿POR QUE? TEXTO
                                    model.set('no_viable_producto', keynoProducto); //NO TENEMOS EL PRODUCTO - ¿QUE PRODUCTO?
                                    model.set('no_viable_otro_c', txtotroProducto); //NO TENEMOS EL PRODUCTO - ¿QUE PRODUCTO? TEXTO
                                    model.set('no_viable_razon_ni', keynoInteresado); //NO SE ENCUENTRA INTERESADO
                                    model.save();
                                    location.reload(); //refresca la página

                                }, self_prodnv)
                            });
                        }
                    });
                },
                error: function (e) {
                    throw e;
                }
            });

        }
        self_prodnv.closeModal();
    },

    closeModal: function () {
        var modal = $('#ModalNoViableCuentas');
        if (modal) {
            modal.hide();
            modal.remove();
        }
        $('.modal').modal('hide');
        $('.modal').remove();
        $('.modal-backdrop').remove();
    },
})
