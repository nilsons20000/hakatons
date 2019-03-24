function updateTable() {
    jQuery(function ($) {
        var items = $("#table tbody tr");

        var numItems = items.length;
        var perPage = 12*2;
            //parseInt($(this).val());

        // Only show the first 2 (or first `per_page`) items initially.
        items.slice(perPage).hide();

        // Now setup the pagination using the `#pagination` div.
        $("#pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",

            // This is the actual page changing functionality.
            onPageClick: function (pageNumber) {
                // We need to show and hide `tr`s appropriately.
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                // We'll first hide everything...
                items.hide()
                // ... and then only show the appropriate rows.
                    .slice(showFrom, showTo).show();
            }
        });
    });
}