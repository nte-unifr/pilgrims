/* global $ */

$(document).ready(function () {
  if ($('.grid').length) {
    // init Masonry
    var $grid = $('.grid').masonry({
      itemSelector: '.grid-item'
    })

    // do some stuff when images are loaded
    $grid.imagesLoaded().progress(function () {
      $grid.masonry('layout')
    })
  }
})
