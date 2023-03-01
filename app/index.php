<!DOCTYPE html>
<html>

<head>
    <title>Configuració DHCP</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"
</head>
<style>
    body{
     font-family: 'Source Sans Pro', sans-serif;o

    }
    form {
        width: 500px;
        margin: 0 auto;
        text-align: left;
        border: 1px solid black;
        padding: 50px 80px 50px 80px;
        border-radius: 5px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"], select {
        width: 100%;
        padding: 5px;
        margin-bottom: 20px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: black;
        color: white;
        font-weight: 700;
        border: none;
        cursor: pointer;
    }
.cajaHost{
        border: 1px solid black;
        padding: 0px 40px 0px 40px;
}
</style>
<body>
    <form action="app.php" method="POST">
    <h1>Configuració DHCP avançada</h1>
        <p>
            <label for="authoritative">Authoritative:</label>
            <select name="authoritative" id="authoritative" required>
                <option value="none" selected disabled hidden>Selecciona</option>
                <option value="authoritative">Si</option>
                <option value="no-authoritative">No</option>
            </select>
        </p>
        <p>
            <label for="ddns-update-style">ddns-update-style:</label>
            <select name="ddns-update-style" id="ddns-update-style" required>
                <option value="none" selected disabled hidden>Selecciona</option>
                <option value="interim">Interim</option>
                <option value="none">None</option>
            </select>
        </p>
        <p>
            <label for="domain-name">domain-name:</label>
            <input type="text" name="domain-name" id="domain-name" required>
        </p>
        <p>
            <label for="domain-name-servers">domain-name-servers:</label>
            <input type="text" name="domain-name-servers" id="domain-name-servers" required>
        </p>
        <p>
            <label for="option-routers">option-routers:</label>
            <input type="text" name="option-routers" id="option-routers" required>
        </p>
        <p>
            <label for="default-lease-time">default-lease-time:</label>
            <input type="text" name="default-lease-time" id="default-lease-time" required>
        </p>
        <p>
            <label for="max-lease-time">max-lease-time:</label>
            <input type="text" name="max-lease-time" id="max-lease-time" required>
        </p>
        <p>
            <label for="subnet">subnet:</label>
            <input type="text" name="subnet" id="subnet" required>
        </p>
        <p>
            <label for="netmask">netmask:</label>
            <input type="text" name="netmask" id="netmask" required>
        </p>
        <p>
            <label for="range1">range (inicial):</label>
            <input type="text" name="range1" id="range1" required>
        </p>
        <p>
            <label for="range2">range (final):</label>
            <input type="text" name="range2" id="range2" required>
        </p>
        <p>
            <h3>Pool known hosts</h3>
            <label for="lease_timeknown">lease-time:</label>
            <input type="text" name="lease_timeknown" id="lease_timeknown"><br>
            <label for="knownrange1">range (inicial):</label>
            <input type="text" name="knownrange1" id="knownrange1"><br>
            <label for="knownrange2">range (final):</label>
            <input type="text" name="knownrange2" id="knownrange2">
        </p>
        <p>
            <h3>Pool unknown hosts</h3>
            <label for="lease_timeunknown">lease-time:</label>
            <input type="text" name="lease_timeunknown" id="lease_timeunknown"><br>
            <label for="unknownrange1">range (inicial):</label>
            <input type="text" name="unknownrange1" id="unknownrange1"><br>
            <label for="unknownrange2">range (final):</label>
            <input type="text" name="unknownrange2" id="unknownrange2">
        </p>
        <p>
            <input type="checkbox" name="avanzado" id="avanzado" onchange="configuracionAvanzada()">
            <label for="avanzado">Vull configuració avançada</label>
        </p>
        <div id="mostrarDiv" style="display:none;">
             <div class="cajaHost">
             <p>
                <label for="host">host:</label>
                <input type="text" name="host" id="host">
            </p>
            <p>
                <label for="hardware-ethernet">hardware ethernet:</label>
                <input type="text" name="hardware-ethernet" id="hardware-ethernet">
            </p>
            <p>
                <label for="fixed-address">fixed-address:</label>
                <input type="text" name="fixed-address" id="fixed-address">
            </p>
        </div><br>
        <?php for ($i = 1; $i <= 3; $i++):?>
              <div class="cajaHost">
              <p>
                 <label for="host">host</label>
                 <input type="text" name="host<?php echo $i; ?>" id="host">
               </p>
               <p>
                 <label for="hardware-ethernet">hardware ethernet:</label>
                 <input type="text" name="hardware-ethernet<?php echo $i;?>" id="hardware-ethernet">
              </p>
              </div><br>
            <?php endfor; ?>
        <br>
        </div>
        <p>
            <input type="submit" value="Generar arxiu de configuració">
        </p>
    </form>
</body>
<script>
    function configuracionAvanzada() {
        var checkbox = document.getElementById("avanzado");
        var mostrarDiv = document.getElementById("mostrarDiv");
        if (checkbox.checked) {
            mostrarDiv.style.display = "block";
        } else {
            mostrarDiv.style.display = "none";
        }
    }
</script>

</html>
