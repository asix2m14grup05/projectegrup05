<?php
if (!isset($_POST['submit'])) {
    $authoritative = $_POST['authoritative'];
    $ddns_update_style = $_POST['ddns-update-style'];
    $domain_name = $_POST['domain-name'];
    $domain_name_servers = $_POST['domain-name-servers'];
    $option_routers = $_POST['option-routers'];
    $default_lease_time = $_POST['default-lease-time'];
    $max_lease_time = $_POST['max-lease-time'];
    $subnet = $_POST['subnet'];
    $netmask = $_POST['netmask'];
    $range1 = $_POST['range1'];
    $range2 = $_POST['range2'];
    $host = $_POST['host'];
    $hardware_ethernet = $_POST['hardware-ethernet'];
    $fixed_address = $_POST['fixed-address'];

    $knownrange1 = $_POST['knownrange1'];
    $knownrange2 = $_POST['knownrange2'];

    $unknownrange1 = $_POST['unknownrange1'];
    $unknownrange2 = $_POST['unknownrange2'];

    $lease_timeknown = $_POST['lease_timeknown'];
    $lease_timeunknown = $_POST['lease_timeunknown'];

    $host1 = $_POST['host1'];
    $hardware_ethernet1 = $_POST['hardware-ethernet1'];

    $host2 = $_POST['host2'];
    $hardware_ethernet2 = $_POST['hardware-ethernet2'];

    $host3 = $_POST['host3'];
    $hardware_ethernet3 = $_POST['hardware-ethernet3'];

    echo "<h3>#Arxiu dhcpd.conf generat.</h3>";

    echo "
  # dhcpd.conf<br><br>
  # Configuracio del servidor DHCP<br><br>
  ";
    if ($authoritative == "authoritative") {
        echo "
    # Especifica que aquest servidor es l´autoritat per a la xarxa<br>
    authoritative;<br><br>";
    } else {
        echo "";
    }

    echo "
  # Defineix l´estil d'actualitzacio per a registres DDNS<br>
  ddns-update-style " . $ddns_update_style . ";<br><br>

  # Nom de domini<br>
  domain-name '" . $domain_name . "';<br><br>

  # Servidors de noms de domini<br>
  domain-name-servers " . $domain_name_servers . ";<br><br>

  # Porta d´enllaç per defecte<br>
  option routers " . $option_routers . ";<br><br>

  # Temps de prestec per defecte (en segons)<br>
  default-lease-time " . $default_lease_time . ";<br><br>

  # Temps maxim de prestec (en segons)<br>
  max-lease-time " . $max_lease_time . ";<br><br>
  ";

    if (empty($host) && empty($hardware_ethernet) && empty($fixed_address) && empty($host1) && empty($host2) && empty($host3) && empty($hardware_ethernet1) && empty($hardware_ethernet2) && empty($hardware_ethernet3) && empty($knownrange1) && empty($knownrange2) && empty($unknownrange2) && empty($unknownrange2) && empty($lease_timeknown) && empty($lease_timeunknown)){
        echo "
   # Defineix una subxarxa<br>
    subnet " . $subnet . " netmask " . $netmask . " {<br><br>
    &nbsp &nbsp # Rang d´adreces IP assignables<br>
    &nbsp &nbsp range " . $range1 . " " . $range2 . ";<br><br>
   }
   ";

    } elseif (empty($host1) && empty($host2) && empty($host3) && empty($hardware_ethernet1) && empty($hardware_ethernet2) && empty($hardware_ethernet3)) {
        echo "
    # Defineix una subxarxa<br>
      subnet " . $subnet . " netmask " . $netmask . " {<br><br>
      &nbsp &nbsp # Rang d´adreces IP assignables<br>
      &nbsp &nbsp range " . $range1 . " " . $range2 . ";<br><br>

      &nbsp &nbsp #Pool knonw hosts<br>
      &nbsp &nbsp pool{<br>
      &nbsp &nbsp &nbsp &nbsp range $knownrange1 $knownrange2;<br>
      &nbsp &nbsp &nbsp &nbsp allow known-clients;<br>
      &nbsp &nbsp &nbsp &nbsp default-lease-time $lease_timeknown;<br>
      &nbsp &nbsp}<br><br>

      &nbsp &nbsp #Pool unknown hosts<br>
      &nbsp &nbsp pool{<br>
      &nbsp &nbsp &nbsp &nbsp range $unknownrange1 $unknownrange2;<br>
      &nbsp &nbsp &nbsp &nbsp deny unknown-clients;<br>
      &nbsp &nbsp &nbsp &nbsp default-lease-time $lease_timeunknown;<br>
      &nbsp &nbsp}<br><br>

      &nbsp &nbsp # Configuracio d´host específic<br>
      &nbsp &nbsp host " . $host . "{<br>
      &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
      &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet . ";<br><br>

      &nbsp &nbsp &nbsp &nbsp # Adreça IP fixa per a l´host<br>
      &nbsp &nbsp &nbsp &nbsp fixed-address " . $fixed_address . ";<br>
      &nbsp &nbsp }<br>
      }<br>
    ";
    } elseif (empty($host2) && empty($host3) && empty($hardware_ethernet2) && empty($hardware_ethernet3) && empty($knownrange1) && empty($knownrange2) && empty($unknownrange2) && empty($unknownrange2) ) {
        echo "
        # Defineix una subxarxa<br>
          subnet " . $subnet . " netmask " . $netmask . " {<br><br>
          &nbsp &nbsp # Rang d´adreces IP assignables<br>
          &nbsp &nbsp range " . $range1 . " " . $range2 . ";<br><br>
    
          &nbsp &nbsp # Configuracio d´host específic<br>
          &nbsp &nbsp host " . $host . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet . ";<br><br>
    
          &nbsp &nbsp &nbsp &nbsp # Adreça IP fixa per a l´host<br>
          &nbsp &nbsp &nbsp &nbsp fixed-address " . $fixed_address . ";<br>
          &nbsp &nbsp }<br><br>

          &nbsp &nbsp # Configuracio d´host específic<br>
          &nbsp &nbsp host " . $host1 . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet1 . ";<br><br>
          &nbsp &nbsp }<br>
          }<br>
        ";
    } elseif (empty($host3) && empty($hardware_ethernet3) && empty($knownrange1) && empty($knownrange2) && empty($unknownrange2) && empty($unknownrange2)) {
        echo "
        # Defineix una subxarxa<br>
          subnet " . $subnet . " netmask " . $netmask . " {<br><br>
          &nbsp &nbsp # Rang d´adreces IP assignables<br>
          &nbsp &nbsp range " . $range1 . " " . $range2 . ";<br><br>
    
          &nbsp &nbsp # Configuracio d´host específic<br>
          &nbsp &nbsp host " . $host . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet . ";<br><br>
    
          &nbsp &nbsp &nbsp &nbsp # Adreça IP fixa per a l´host<br>
          &nbsp &nbsp &nbsp &nbsp fixed-address " . $fixed_address . ";<br>
          &nbsp &nbsp }<br><br>

          &nbsp &nbsp # Configuracio d´host específic<br>
          &nbsp &nbsp host " . $host1 . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet1 . ";<br>
          &nbsp &nbsp }<br><br>

          &nbsp &nbsp # Configuracio d´host específic<br>
          &nbsp &nbsp host " . $host2 . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet2 . ";<br>
          &nbsp &nbsp }<br>


          }<br>
        ";
    } else {
        echo "
        # Defineix una subxarxa<br>
          subnet " . $subnet . " netmask " . $netmask . " {<br><br>
          &nbsp &nbsp # Rang d´adreces IP assignables<br>
          &nbsp &nbsp range " . $range1 . " " . $range2 . ";<br><br>
    
          &nbsp &nbsp # Configuracio d´host específic<br>
          &nbsp &nbsp host " . $host . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet . ";<br><br>
    
          &nbsp &nbsp &nbsp &nbsp # Adreça IP fixa per a l´host<br>
          &nbsp &nbsp &nbsp &nbsp fixed-address " . $fixed_address . ";<br>
          &nbsp &nbsp }<br><br>

          &nbsp &nbsp # Configuracio de $host1<br>
          &nbsp &nbsp host " . $host1 . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet1 . ";<br>
          &nbsp &nbsp }<br><br>

          &nbsp &nbsp # Configuracio de $host2<br>
          &nbsp &nbsp host " . $host2 . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet2 . ";<br>
          &nbsp &nbsp }<br><br>

          &nbsp &nbsp # Configuracio de $host3<br>
          &nbsp &nbsp host " . $host3 . "{<br>
          &nbsp &nbsp &nbsp &nbsp # Adreça MAC de l´host<br>
          &nbsp &nbsp &nbsp &nbsp hardware ethernet " . $hardware_ethernet3 . ";<br>
          &nbsp &nbsp }<br>

          }<br>
        ";
    }
}
?>
