$(document).ready(function() {

    // Masonry
    if ( $( ".grid" ).length ) {
        // init Masonry
        var $grid = $('.grid').masonry({
            itemSelector: '.grid-item'
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    }

    // Magnific popup
    $('.image-popup').magnificPopup({type:'image'});
});
