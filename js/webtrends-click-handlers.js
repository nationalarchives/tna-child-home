window.addEventListener("load", function () {

    if (!$) {
        var jq = document.createElement('script');
        jq.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js';
        document.getElementsByTagName('body')[0].appendChild(jq);
    }

    $('a', '.mega-menu').on('click', function (e) {
        if (typeof dcsMultiTrack == 'function') {
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

/*
dcsMultiTrack = function () {
    console.log.apply(console, arguments);
};
*/