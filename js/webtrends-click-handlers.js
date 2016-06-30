if (!window.jQuery) {
    var jq = document.createElement('script'); jq.type = 'text/javascript';
    jq.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js';
    document.getElementsByTagName('body')[0].appendChild(jq);

    window.addEventListener("load", function () {
        $('a', '.mega-menu').on('click', function (e) {
            if (typeof dcsMultiTrack == 'function' && !!dcsMultiTrack && window.jQuery) {
                var text = $(e.target).text();
                dcsMultiTrack(
                    'DCS.dcsuri',
                    '/menu/' + text,
                    'WT.ti',
                    'Menu - ' + text
                )
            }
        })
    });
}
else {
    window.addEventListener("load", function () {
        $('a', '.mega-menu').on('click', function (e) {
            if (typeof dcsMultiTrack == 'function' && !!dcsMultiTrack && window.jQuery) {
                var text = $(e.target).text();
                dcsMultiTrack(
                    'DCS.dcsuri',
                    '/menu/' + text,
                    'WT.ti',
                    'Menu - ' + text
                )
            }
        })
    });
}

/*
dcsMultiTrack = function () {
    console.log.apply(console, arguments);
};
*/

