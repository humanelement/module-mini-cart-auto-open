define([
    "jquery",
    "jquery/ui"
], function ($) {

    var dropDownTimeout = null;

    return function (config, element) {
        var minicart = $(element);
        var canAutoOpen = config.canAutoOpen;
        var autoOpenTimeout = config.autoOpenTimeout * 1000;
        var dropDownDialog = minicart.find('[data-role="dropdownDialog"]');
        var clearDropDownTimeout = function () {
            if (dropDownTimeout) {
                clearTimeout(dropDownTimeout);
                dropDownTimeout = null;
            }
        };

        dropDownDialog.on('mouseenter', function (event) {
            event.stopPropagation();
            clearDropDownTimeout();
        });

        minicart.on('contentLoading', function () {
            minicart.on('ajaxContentUpdated', function () {
                var showCart = function () {
                    if (canAutoOpen && $('body').attr('aria-busy') == 'true') {
                        setTimeout(function(){
                            showCart();
                        },1000);
                    } else {
                        dropDownDialog.dropdownDialog("open");

                        // Cancel pre-existing timeout
                        clearDropDownTimeout();

                        // Create new timeout
                        dropDownTimeout = setTimeout(function () {
                            dropDownDialog.dropdownDialog("close");
                        }, autoOpenTimeout);
                    }
                };

                showCart();
            });
        });
    }
});