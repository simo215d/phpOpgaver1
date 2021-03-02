<h1>Hello World</h1>
<?php
    //_GET super global variable kan hente parametre fra url
    $fornavn = $_GET['fornavn'];
    $efternavn = $_GET['efternavn'];
    echo "Goddag $fornavn $efternavn, velkommen til hjemmesiden!<br>";
    $cookie_name = "user";
    $cookie_value = $fornavn;
    //set a cookie
    setcookie($cookie_name, $cookie_value, time() + (60 * 30), "/");
    //spørg super global variable cookie om den er sat og print dens værdi
    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
      } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
      }
?>