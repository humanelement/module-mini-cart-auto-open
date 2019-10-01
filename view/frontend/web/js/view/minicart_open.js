define([
    "jquery",
    "jquery/ui",
    "domReady!"
], function ($) {

    var dropDownTimeout = null;

    return function (config, element) {
        let minicart = $(element);
        let canAutoOpen = config.canAutoOpen;
        let canScrollTop = config.canScrollTop;
        let autoOpenTimeout = config.autoOpenTimeout * 1000;
        let scrollTopDuration = 1000;
        let dropDownDialog = minicart.find('[data-role="dropdownDialog"]');

        // Reusable function to cancel the closing of the minicart
        let cancelCloseMinicart = () => {
            if (dropDownTimeout) {
                clearTimeout(dropDownTimeout);
                dropDownTimeout = null;
            }
        };

        // Reusable function to open minicart and start timeout for eventually closing minicart
        let openMinicart = () => {
            // Cancel pre-existing timeout
            cancelCloseMinicart();

            // Scroll Page to top
            if (canScrollTop) {
                $("html, body").animate({scrollTop: 0}, scrollTopDuration, () => {
                    dropDownDialog.dropdownDialog("open");
                });
            } else {
                dropDownDialog.dropdownDialog("open");
            }

            // Create new timeout
            dropDownTimeout = setTimeout(function () {
                dropDownDialog.dropdownDialog("close");
            }, autoOpenTimeout);
        };

        // Trigger to determine whether minicart is allowed to auto open and if so,
        // whether the is page done being busy to so it can happen
        let openMiniCartTrigger = () => {
            if (canAutoOpen) {
                if ($('body').attr('aria-busy') === 'true') {
                    setTimeout(openMiniCartTrigger, 500);
                } else {
                    openMinicart();
                }
            }
        };

        // Cancel the closing of minicart if user mouses over it while it's open
        dropDownDialog.on('mouseenter', function (event) {
            event.stopPropagation();
            cancelCloseMinicart();
        });

        // Kick off "open minicart" trigger to eventually open minicart
        minicart.on('ajaxContentUpdated', openMiniCartTrigger);
    }
});