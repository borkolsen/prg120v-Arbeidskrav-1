<?php

include ("db-tilkobling.php");

if (isset($_POST["klassekode"]))
{
    $klassekode = $_POST["klassekode"];

    $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode'";
    
   if (!mysqli_query($db,$sqlSetning))
   {
       $melding = "Klassen ble slettet";
   }
   else
   {
       $melding = "Klassen kan ikke slettes fordi den har studenter";
   }
}

$sqlSetning="SELECT * FROM klasse";

$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slett klasse</title>
</head>
<body>

<h1>Slett klasse</h1>

<?php

if (isset($melding))
{
    print($melding);
}

?>

<form method="post">

<select name="klassekode">

<?php

while ($rad=mysqli_fetch_array($sqlResultat)) 
{
    print("<option value='".$rad["klassekode"]."'>");

    print($rad["klassekode"]);
    print(" ");
    
    print($rad["klassenavn"]);
    print("</option>");
}

?>

</select>

<br><br>

<input type="submit" value="Slett" onclick="return confirm('Er du sikker på at du vil slette denne klassen?')">

</form>

<a href="index.php">Tilbake til hovedmeny</a>

</body>
</html>