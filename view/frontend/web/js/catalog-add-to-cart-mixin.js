define([
    'jquery',
], function($) {
    "use strict";

    return function (originalCatalogAddToCart) {
        $.widget('mage.catalogAddToCart', originalCatalogAddToCart, {
            enableAddToCartButton: function (form) {
                var self = this;

                this._superApply(arguments);

                // HE Custom Ajax Content Updated Event
                $(self.options.minicartSelector).trigger('ajaxContentUpdated');
            }
        });

        return $.mage.catalogAddToCart;
    }
});
