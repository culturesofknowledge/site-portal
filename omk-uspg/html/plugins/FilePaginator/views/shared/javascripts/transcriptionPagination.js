
jQuery(function($) {
    var pagination = $('#trans-pagination')
    if (!pagination.length) return;
    var items = $(".transcription-page");

    var numItems = items.length;
    var perPage = 1;
    var theme = pagination.data("theme");

    if (numItems == 1) {
        // Hide pagination interface if only one item
        pagination.hide();
    }
    items.slice(perPage).hide();

    pagination.pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: theme,

        onPageClick: function(pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;

            items.hide()
            .slice(showFrom, showTo).show();
            // Hack to get openLayerZoom showing properly after Full Screen
            if (window.transPages[pageNumber]) {
                window.transPages[pageNumber].map.handleResize_();
            }
        }
    });
    function checkFragment() {
        var hash = window.location.hash || "#page-1";
        hash = hash.match(/^#page-(\d+)$/);
        if(hash) {
            pagination.pagination("selectPage", parseInt(hash[1]));
        }
    };
    $(window).bind("popstate", checkFragment);
    checkFragment();
});
