/* global $, google */

var resizeMap = function () {
  // calc the height according to the image next to the map
  var height = $('#image .thumbnail').height() + 8 // 8 is the padding
  $('#gmap').height(height)
}

var initMap = function (mapContainer) {
  resizeMap()

  // get the coordinates from html element
  var lat = mapContainer.data('lat')
  var lng = mapContainer.data('lng')

  // init map
  var latLng = {lat: lat, lng: lng}
  var map = new google.maps.Map(mapContainer[0], {
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
    // do some stuff when images are loaded
    var photo = $('#image')
    photo.imagesLoaded().progress(function () {
      initMap($('#gmap'))
    })
  }
})

window.onresize = function (event) {
  resizeMap()
}
