/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
/**
 * @class View.Views.Base.DocuSignEnvelopes.TemplatesListView
 * @alias SUGAR.App.view.views.BaseDocuSignEnvelopesTemplatesListView
 * @extends View.Views.Base.SelectionListView
 */
 ({
    extendsFrom: 'SelectionListView',

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this._super('initialize', [options]);

        this._registerEvents();
        this._initProperties();
    },

    /**
     * Register events
     */
    _registerEvents: function() {
        this.listenTo(this.context, 'filter:apply', this.applyQuickSearch);
        this.listenTo(this.context, 'templates:loaded', this.render);
    },

    /**
     * Init properties
     */
    _initProperties: function() {
        this.rightColumns = [];
    },
});
