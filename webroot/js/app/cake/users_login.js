// $(window).setBreakpoints({
// // use only largest available vs use all available
//     distinct: true,
// // array of widths in pixels where breakpoints
// // should be triggered
//     breakpoints: [
//         320,
//         480,
//         768,
//         1024
//     ]
// });
(function () {
    // "use strict";
    //
    // $(window).bind('enterBreakpoint480', function () {
    //     $('.chat-window-container .panel:not(:last)').remove();
    //     $('.chat-window-container .panel').attr('id', 'chat-0001');
    // });
    //
    // $(window).bind('enterBreakpoint768', function () {
    //     if ($('.chat-window-container .panel').length == 3) {
    //         $('.chat-window-container .panel:first').remove();
    //         $('.chat-window-container .panel:first').attr('id', 'chat-0001');
    //         $('.chat-window-container .panel:last').attr('id', 'chat-0002');
    //     }
    // });

})();
(function () {
    $('[data-toggle=\'tooltip\']').tooltip();
    var openedtooltip = null;
    $('[data-toggle=\'tooltip\']').on('show.bs.tooltip', function () {
        var $this = $(this);
        if (openedtooltip === $this) {
            return;
        } else if (openedtooltip !== null) {
            openedtooltip.tooltip('hide');
        }
        openedtooltip = $this;
        return;
    });
})();
//define(["jquery", "jquery.validate"], function ($) {
//    //$("form").validate();
//});