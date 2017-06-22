/* global $, google */

var displayMap = function (lat, lng) {
  var latLng = { lat: lat, lng: lng }
  var map = new google.maps.Map(document.getElementById('map-container'), {
    center: latLng,
    zoom: 8
  })
  var marker = new google.maps.Marker({
    position: latLng
  })
  marker.setMap(map)
}

$(document).ready(function () {
  if ($('#site').length) {
    // display google map
    var lat = $('#map-container').data('lat')
    var lng = $('#map-container').data('lng')
    displayMap(lat, lng)

    // add bootstrap to markdown tables
    $('.panel-content table').addClass('table')
  }
})
