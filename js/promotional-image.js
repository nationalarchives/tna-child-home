window.addEventListener("load", function () {
    if (typeof $ === 'function') {
        $("ul.sub-menu:last").append('' +
            '<li class="imgContent">' +
            '<a href="http://nationalarchives.gov.uk/first-world-war/" title="First World War 100 - read about our centenary programme">' +
            '<img src="http://www.nationalarchives.gov.uk/images/home/menu-first-world-war-b.jpg" alt="Explore First World War 100"></a>' +
            '</li>'
        );
    }
});