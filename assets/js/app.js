// css dependencies
require('../css/app.scss')

// js
var $ = require('jquery')
import mixitup from 'mixitup'
require('bootstrap')
var mapboxgl = require('mapbox-gl/dist/mapbox-gl.js')
mapboxgl.accessToken = 'pk.eyJ1IjoibnRlIiwiYSI6IjNuaWc4XzQifQ.FV_ZIkwWG_gJKP7PIdLuJw'

$(document).ready(function () {
  initBsElements()
  if ($('#sites').length) {
    initMixitup()
  }
  if ($('#site').length) {
    drawMap()
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

function drawMap() {
  var container = $('#map')
  var lat = container.data('lat')
  var lng = container.data('lng')
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/basic-v9',
    zoom: 9,
    center: [lng, lat]
  })

  var ll = new mapboxgl.LngLat(lng, lat)
  new mapboxgl.Marker().setLngLat(ll).addTo(map)

  // we need to resize the map when the tab is shown because it doesn't have any height before
  $('#map-tab').on('shown.bs.tab', function (e) { map.resize() })
}