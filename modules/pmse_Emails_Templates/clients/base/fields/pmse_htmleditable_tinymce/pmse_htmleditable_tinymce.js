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

({
    extendsFrom: 'Htmleditable_tinymceField',

    /**
     * @inheritdoc
     */
    addCustomButtons: function (editor) {
        this._registerIcons(editor);

        editor.ui.registry.addButton('sugarfieldbutton', {
            title: app.lang.get('LBL_SUGAR_FIELD_SELECTOR', 'pmse_Emails_Templates'),
            class: 'mce_selectfield',
            icon: 'preferences',
            onAction: _.bind(this._showVariablesBook, this),
        });
        editor.ui.registry.addButton('sugarlinkbutton', {
            title: app.lang.get('LBL_SUGAR_LINK_SELECTOR', 'pmse_Emails_Templates'),
            class: 'mce_selectfield',
            icon: 'sugar-record-link',
            onAction: _.bind(this._showLinksDrawer, this),
        });
    },

    /**
     * Add custom icons to TinyMCE
     * @private
     */
    _registerIcons: function(editor) {
        const icons = [
            {
                name: 'sugar-record-link',
                svg: `<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.3529 4.17647C11.5061 4.17647 11.6532 4.23775 11.7635 4.34804L12.6581 5.24877C12.7623
                5.35907 12.8174 5.51226 12.8174 5.66544C12.8174 5.81863 12.7623 5.97181 12.652 6.08211L11.3836
                7.34436C11.2733 7.45466 11.1201 7.51593 10.9669 7.51593C10.7831 7.51593 10.6422 7.4424 10.5196
                7.31373C10.7218 7.11152 10.9608 6.93995 10.9608 6.62745C10.9608 6.3027 10.6973 6.03922 10.3725
                6.03922C10.06 6.03922 9.88848 6.27819 9.68628 6.48039C9.5576 6.35784 9.4902 6.21691 9.4902
                6.03922C9.4902 5.88603 9.55147 5.73284 9.66177 5.62255L10.9363 4.34804C11.0466 4.23775 11.1936
                4.17647 11.3529 4.17647ZM7.03309 8.48407C7.21691 8.48407 7.35784 8.5576 7.48039 8.68627C7.27819
                8.88848 7.03922 9.06005 7.03922 9.37255C7.03922 9.6973 7.3027 9.96078 7.62745 9.96078C7.93995
                9.96078 8.11152 9.72181 8.31373 9.51961C8.4424 9.64216 8.50368 9.78309 8.50368 9.96078C8.50368
                10.114 8.44853 10.2672 8.33824 10.3775L7.06373 11.652C6.95343 11.7623 6.80637 11.8235 6.64706
                11.8235C6.49387 11.8235 6.34681 11.7623 6.23652 11.652L5.34191 10.7512C5.23775 10.6409 5.17647
                10.4877 5.17647 10.3346C5.17647 10.1814 5.23775 10.0282 5.34804 9.91789L6.61642 8.65564C6.72672
                8.54534 6.8799 8.48407 7.03309 8.48407ZM11.3529 3C10.8811 3 10.44 3.1777 10.1029 3.51471L8.82843
                4.78922C8.49755 5.1201 8.31373 5.57353 8.31373 6.03922C8.31373 6.52328 8.5098 6.97672 8.85294
                7.31373L8.31373 7.85294C7.97672 7.5098 7.51716 7.31373 7.03309 7.31373C6.5674 7.31373 6.1201
                7.49142 5.78922 7.8223L4.52083 9.08456C4.18382 9.41544 4 9.86275 4 10.3346C4 10.8002 4.1777 11.2475
                4.50858 11.5784L5.40319 12.4792C5.72794 12.81 6.18137 13 6.64706 13C7.11887 13 7.56005 12.8223
                7.89706 12.4853L9.17157 11.2108C9.50245 10.8799 9.68628 10.4265 9.68628 9.96078C9.68628 9.47672
                9.4902 9.02328 9.14706 8.68627L9.68628 8.14706C10.0233 8.4902 10.4828 8.68627 10.9669 8.68627C11.4326
                8.68627 11.8799 8.50858 12.2108 8.1777L13.4792 6.91544C13.8162 6.58456 14 6.13726 14 5.66544C14
                5.19975 13.8223 4.75245 13.4914 4.42157L12.5968 3.52083C12.2721 3.18995 11.8186 3 11.3529 3Z"
                fill="#595959"/>
                <path d="M0.429443 7.38951C0.816162 7.37946 1.13006 7.27651 1.37113 7.08064C1.61722 6.87974
                1.78045 6.60603 1.86081 6.25949C1.94116 5.91295 1.98385 5.32031 1.98887 4.48159C1.9939 3.64286
                2.00896 3.0904 2.03408 2.82422C2.07928 2.40234 2.16214 2.06334 2.28268 1.8072C2.40824 1.55106
                2.56142 1.34766 2.74222 1.19699C2.92303 1.04129 3.15405 0.92327 3.4353 0.842913C3.62615 0.79269
                3.93754 0.767578 4.36945 0.767578H4.79133V1.95034H4.55779C4.03547 1.95034 3.68893 2.04576
                3.51817 2.23661C3.34741 2.42243 3.26203 2.8418 3.26203 3.4947C3.26203 4.81055 3.23441 5.64174
                3.17916 5.98828C3.08876 6.52567 2.93307 6.94001 2.71209 7.23131C2.49613 7.5226 2.15461 7.78125
                1.68753 8.00726C2.23999 8.23828 2.63927 8.59236 2.88536 9.06948C3.13647 9.54157 3.26203 10.3175
                3.26203 11.3973C3.26203 12.3767 3.27208 12.9593 3.29217 13.1451C3.33235 13.4866 3.43279 13.7252
                3.59351 13.8608C3.75924 13.9964 4.08067 14.0642 4.55779 14.0642H4.79133V15.2469H4.36945C3.87727
                15.2469 3.52068 15.2068 3.2997 15.1264C2.97827 15.0109 2.71209 14.8225 2.50115 14.5614C2.29021
                14.3052 2.1521 13.9788 2.08681 13.582C2.02654 13.1853 1.9939 12.5349 1.98887 11.6309C1.98385
                10.7268 1.94116 10.1016 1.86081 9.75502C1.78045 9.40848 1.61722 9.13477 1.37113 8.93387C1.13006
                8.73298 0.816162 8.62751 0.429443 8.61747V7.38951Z" fill="#595959"/>
                <path d="M17.3618 8.61049C16.9751 8.62054 16.6612 8.72349 16.4201 8.91936C16.174 9.12026
                16.0108 9.39397 15.9305 9.74051C15.8501 10.0871 15.8074 10.6797 15.8024 11.5184C15.7974 12.3571
                15.7823 12.9096 15.7572 13.1758C15.712 13.5977 15.6291 13.9367 15.5086 14.1928C15.383 14.4489
                15.2298 14.6523 15.049 14.803C14.8682 14.9587 14.6372 15.0767 14.356 15.1571C14.1651 15.2073
                13.8537 15.2324 13.4218 15.2324L12.9999 15.2324L12.9999 14.0497L13.2335 14.0497C13.7558 14.0497
                14.1023 13.9542 14.2731 13.7634C14.4438 13.5776 14.5292 13.1582 14.5292 12.5053C14.5292 11.1895
                14.5569 10.3583 14.6121 10.0117C14.7025 9.47433 14.8582 9.05999 15.0792 8.76869C15.2951 8.4774
                15.6366 8.21875 16.1037 7.99274C15.5513 7.76172 15.152 7.40764 14.9059 6.93052C14.6548 6.45843
                14.5292 5.68248 14.5292 4.60268C14.5292 3.62332 14.5192 3.04074 14.4991 2.85491C14.4589 2.51339
                14.3585 2.27483 14.1978 2.13923C14.032 2.00363 13.7106 1.93582 13.2335 1.93582L12.9999 1.93582L12.9999
                0.753068L13.4218 0.753068C13.914 0.753068 14.2706 0.793245 14.4916 0.873603C14.813 0.989116 15.0792
                1.17745 15.2901 1.43861C15.501 1.69475 15.6392 2.0212 15.7045 2.41797C15.7647 2.81473 15.7974
                3.46512 15.8024 4.36914C15.8074 5.27316 15.8501 5.89844 15.9305 6.24498C16.0108 6.59152 16.174
                6.86523 16.4201 7.06613C16.6612 7.26702 16.9751 7.37249 17.3618 7.38253L17.3618 8.61049Z"
                fill="#595959"/>
                </svg>`,
            },
        ];

        icons.map((icon) =>
            editor.ui.registry.addIcon(icon.name,
                `<span class="tox-custom-icon-wrapp">
                    ${icon.svg}
                </span>`)
        );
    },

    /**
     * Save the TinyMCE editor's contents to the model
     * @private
     */
    _saveEditor: function(force){
        var save = force | this._isDirty;
        if(save){
            this.model.set(this.name, this.getEditorContent(), {silent: true});
            this._isDirty = false;
        }
    },

    /**
     * Finds textarea or iframe element in the field template
     *
     * @return {HTMLElement} element from field template
     * @private
     */
    _getHtmlEditableField: function() {
        return this.$el.find(this.fieldSelector);
    },

    /**
     * Sets TinyMCE editor content
     *
     * @param {String} value HTML content to place into HTML editor body
     */
    setEditorContent: function(value) {
        if(_.isEmpty(value)){
            value = "";
        }
        if (this._isEditView() && this._htmleditor && this._htmleditor.dom) {
            this._htmleditor.setContent(value);
        }
    },

    /**
     * Retrieves the  TinyMCE editor content
     *
     * @return {String} content from the editor
     */
    getEditorContent: function() {
        return this._htmleditor.getContent({format: 'raw'});
    },

    /**
     * Destroy TinyMCE Editor on dispose
     *
     * @private
     */
    _dispose: function() {
        this.destroyTinyMCEEditor();
        app.view.Field.prototype._dispose.call(this);
    },
    /**
     * When in edit mode, the field includes an icon button for opening an address book. Clicking the button will
     * trigger an event to open the address book, which calls this method to do the dirty work. The selected recipients
     * are added to this field upon closing the address book.
     *
     * @private
     */
    _showVariablesBook: function() {
        /**
         * Callback to add recipients, from a closing drawer, to the target Recipients field.
         * @param {undefined|Backbone.Collection} recipients
         */
        var addVariables = _.bind(function(variables) {
            if (variables && variables.length > 0) {
                this.model.set(this.name, this.buildVariablesString(variables));
            }

        }, this);
        app.drawer.open(
            {
                layout:  "compose-varbook",
                context: {
                    module: "pmse_Emails_Templates",
                    mixed:  true
                }
            },
            function(variables) {
                addVariables(variables);
            }
        );
    },
    /**
     * Adds placeholders fields the textbox content.
     *
     * @param {Object} recipients List of fields to create the placeholders.
     * @return {string} textbox content with the placeholders.
     */
    buildVariablesString: function(recipients) {
        var newExpression = this.buildPlaceholders(recipients);
        var bm = this._htmleditor.selection.getBookmark();
        this._htmleditor.selection.moveToBookmark(bm);
        this._htmleditor.selection.setContent(newExpression);

        return this._htmleditor.getContent();
    },

    /**
     * Creates the placeholders for Email Template Modules.
     *
     * @param {Object} recipients List of fields to create the placeholders.
     * @return {string} newExpression.
     */
    buildPlaceholders: function(recipients) {
        var newExpression = '';
        _.each(recipients, function(model) {
            newExpression += '{::' + model.get('rhs_module') + '::' + model.get('id');
            if (model.get('process_et_field_type') == 'old') {
                newExpression += '::' + model.get('process_et_field_type');
            }
            newExpression += '::}';
        });
        return newExpression;
    },

    /**
     * Open a drawer with a list of related fields that we want to link to in an email
     * Create a variable like {::href_link::Accounts::contacts::name::} which is understood
     * by the backend to replace the variable with the correct Sugar link
     *
     * @private
     */
    _showLinksDrawer: function() {
        var self = this;
        var baseModule = this.model.get('base_module');
        app.drawer.open({
                layout:  "compose-sugarlinks",
                context: {
                    module: "pmse_Emails_Templates",
                    mixed:  true,
                    skipFetch: true,
                    baseModule: baseModule
                }
            },
            function(field) {
                if (_.isUndefined(field)) {
                    return;
                }
                var link = '{::href_link::' + baseModule;

                //Target module doesn't need second part of variable
                //The second part is for related modules
                //Example {::href_link::Accounts::name::}} is for the target module Account's record
                //{{::href_link::Accounts::contacts::name::}} is for the related contacts's record
                if (baseModule !== field.get('value')) {
                    link += '::' + field.get('value');
                }
                link += '::name::}';
                self._htmleditor.selection.setContent(link);
                self.model.set(self.name, self._htmleditor.getContent())
            }
        );
    }

})
