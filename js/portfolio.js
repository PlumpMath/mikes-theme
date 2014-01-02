if($('#Grid').length) {
    $('#Grid').mixitup();
}

// Init data-lightbox on <a> elements.
$('li.mix_all').each(function() {
    $(this).find('> a').attr("data-lightbox", "visible");
});

// Handle filters.
$('li.filter').bind('click', function() {
    var filter = $(this).data("filter");
    $('li.mix_all').each(function() {
        if ($(this).hasClass(filter)) {
            $(this).find('> a').attr("data-lightbox", "visible");
        } else {
            $(this).find('> a').attr("data-lightbox", "hidden");
        }
    });
    $('li.filter').each(function() {
        if ($(this).hasClass('active')) {
            $(this).css('background', '#aaa');
        } else {
            $(this).css('background', '#ddd');
        }
    });
});
