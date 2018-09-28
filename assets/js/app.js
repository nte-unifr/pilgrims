// css dependencies
require('../css/app.scss')

// js
var $ = require('jquery')
import mixitup from 'mixitup'
require('bootstrap')

$(document).ready(function () {
  initBsElements()
  if ($( "#sites" ).length) {
    initMixitup()
  }
})

function initBsElements() {
  //$('.collapse').collapse()
  $('.popover-toggler').popover()
  $('[data-toggle="tooltip"]').tooltip()
}

function initMixitup() {
  var mixer = mixitup('#sites', {
    load: {
      sort: 'lon:asc lat:asc title:asc',
      filter: 'all'
    },
    selectors: {
      control: '[data-mixitup-control]'
    },
    callbacks: {
      onMixEnd: function(state) {
        let count = $('.site:visible').length
        $('#sites-counter').text(count)
      }
    }
  })
}