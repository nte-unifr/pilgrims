/* global $ */

$(document).ready(function () {
  if ($('.image-popup').length) {
    $('.image-popup').magnificPopup({
      type: 'image',
      image: {
        titleSrc: 'title'
      }
    })
  }
})
