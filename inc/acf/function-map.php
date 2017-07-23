<?php

// Parse Google Map field from array to strings
function sc_parse_map_data($values){

  $address = $values[ 'address' ];
  $address = explode(',', $address);
  $addressStreet = $address[0];
  $addressCity = $address[1];
  $addressCountry = $address[3];
  $provCode = explode(' ', trim($address[2]));
  $addressProv = $provCode[0];
  $addressCode = array_shift($provCode);
  $addressCode = implode(" ", $provCode);
  $lat = $values[ 'lat' ];
  $long = $values[ 'lng' ];
  ?>
  <div class="sc-map-address">
    <p>
      <span><?php echo $addressStreet; ?>, </span>
      <span><?php echo $addressCity; ?>, </span>
      <span><?php echo $addressProv; ?>, </span>
      <span><?php echo $addressCode; ?> </span>
      <span><?php echo $addressCountry; ?>, </span>
    </p>
    <p><span><?php echo $lat .", " . $long; ?> </span>
</p>
  </div>
  <?php
}
