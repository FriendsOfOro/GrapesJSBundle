define(function (require) {
    'use strict';

    var GrapesJSEditorComponent;

    var BaseComponent = require('oroui/js/app/components/base/component');
    var grapesjs = require("grapesjs");
    require("hackorograpesjs/js/app/components/grapesjs-preset-webpage.min");
    var $ = require("jquery");

    GrapesJSEditorComponent = BaseComponent.extend({
        editor: null,
        options: {},

        initialize: function (options) {
            this.editor = grapesjs.init({
                height: "800px",
                width: "100%",
                showOffsets: 1,
                noticeOnUnload: 0,
                stylePrefix: "gjs-",
                components: "",
                avoidInlineStyle: 1,
                storageManager: {autoload: 0, autosave: true, stepsBeforeSave: 1},
                container: "#gjsContainer",
                fromElement: false,
                plugins: ["gjs-preset-webpage"],
                pluginsOpts: {
                    "grapesjs-blocks-basic": {
                        stylePrefix: "gjs-"
                    },
                    "gjs-preset-webpage": {}
                },
                canvas: {
                    styles: [
                        // TODO: This should be dynamic
                        "/css/layout/basetheme/styles.css"
                    ]
                }
            });

            // Reset styles - https://github.com/artf/grapesjs/issues/488
            this.editor.CssComposer.getAll().reset();

            // Pass the contents of the two hidden form fields (HTML Body + CSS) back to the Editor instance
            this.editor.setComponents($('input[name="grapes_js_page[content]"]').val());
            this.editor.setStyle($('input[name="grapes_js_page[css]"]').val());

            // On change, copy the CSS and Content back into the hidden form fields so we can save
            this.editor.on("storage:start", function() {
                // Copy the CSS, excluding "protected" classes (eg 'body')
                $('input[name="grapes_js_page[css]"]').val(this.editor.getCss({avoidProtected:1}));
                // Copy the HTML
                $('input[name="grapes_js_page[content]"]').val(this.editor.getHtml());
            }.bind(this));
        }
    });

    return GrapesJSEditorComponent;
});
