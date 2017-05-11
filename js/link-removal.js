window.addEventListener("load", function () {
    if (typeof $ === 'function') {
        $("a[href='http://#']", ".mega-menu").each(function () {
            var $this = $(this),
                text = $this.text();
            $this.replaceWith($('<span>', {
                'text': text
            }))
        });
    }
});

