window.addEventListener("load", function () {
    $('a', '.mega-menu').on('click', function (e) {
        if (window.jQuery) {
            if (typeof dcsMultiTrack == 'function' && !!dcsMultiTrack) {
                var text = $(e.target).text();
                dcsMultiTrack(
                    'DCS.dcsuri',
                    '/menu/' + text,
                    'WT.ti',
                    'Menu - ' + text
                )
            }
        }
    })
});

/*
dcsMultiTrack = function () {
    console.log.apply(console, arguments);
};
*/
