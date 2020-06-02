<?php 
    require 'header.php';     

?>

<div id="content">
        <div id="map"></div>
        <div id="contact" class="container">
          <div class="row">
            <div class="col-lg-8">
              <section class="bar">
                <div class="heading">
                  <h2>Contactez Nous</h2>
                </div>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Nom</label>
                        <input id="firstname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Prénom</label>
                        <input id="lastname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="subject">Objet</label>
                        <input id="subject" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Envoyer</button>
                    </div>
                  </div>
                </form>
              </section>
            </div>
            <div class="col-lg-4">
              <section class="bar mb-0">
                <h3 class="text-uppercase">Address</h3>
                <p class="text-sm">
                  Lot Massira FB 29 <br>3éme Etage Apt 19
                  <br>Mohammedia
                  <br><strong>GSM : +212661687967 / +212661627548</strong>
                  <br><strong>Email : Info@serviap.ma</strong>
                </p>
              </section>
            </div>
          </div>
        </div>
      </div>

<?php require 'footer.php'; ?>
<script src='https://raw.githubusercontent.com/HPNeo/gmaps/master/gmaps.js'> </script>
<script type="text/javascript">
    $(function () {

      map();

  });

  /* map */

  function map() {

      var styles = [{"featureType": "landscape", "stylers": [{"saturation": -100}, {"lightness": 65}, {"visibility": "on"}]}, {"featureType": "poi", "stylers": [{"saturation": -100}, {"lightness": 51}, {"visibility": "simplified"}]}, {"featureType": "road.highway", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "road.arterial", "stylers": [{"saturation": -100}, {"lightness": 30}, {"visibility": "on"}]}, {"featureType": "road.local", "stylers": [{"saturation": -100}, {"lightness": 40}, {"visibility": "on"}]}, {"featureType": "transit", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "administrative.province", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "on"}, {"lightness": -25}, {"saturation": -100}]}, {"featureType": "water", "elementType": "geometry", "stylers": [{"hue": "#ffff00"}, {"lightness": -25}, {"saturation": -97}]}];
      map = new GMaps({
    el: '#map',
    lat: -12.043333,
    lng: -77.028333,
    zoomControl: true,
    zoomControlOpt: {
        style: 'SMALL',
        position: 'TOP_LEFT'
    },
    panControl: false,
    streetViewControl: false,
    mapTypeControl: false,
    overviewMapControl: false,
    scrollwheel: false,
    draggable: false,
    styles: styles
      });

      var image = 'img/marker.png';

      map.addMarker({
    lat: -12.043333,
    lng: -77.028333,
    icon: image/* ,
     title: '',
     infoWindow: {
     content: '<p>HTML Content</p>'
     }*/
      });
  }

</script>