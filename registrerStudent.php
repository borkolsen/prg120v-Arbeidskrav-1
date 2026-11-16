<?php

include ("db-tilkobling.php");

$sqlSetning="SELECT * FROM klasse";

$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");

if (isset($_POST["brukernavn"]))
{
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    $sqlSetning="INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode')";
    
    mysqli_query($db,$sqlSetning);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer student</title>
</head>
<body>

<h1>Registrer student</h1>

<form method="post">

Brukernavn: <input type="text" name="brukernavn">

<br><br>

Fornavn: <input type="text" name="fornavn">

<br><br>

Etternavn: <input type="text" name="etternavn">

<br><br>

Klassekode:

<select name="klassekode">

<?php

while ($rad=mysqli_fetch_array($sqlResultat))
{
    print("<option value='$rad[klassekode]'>");
    print($rad["klassekode"]);
    print("</option>");
}

?>

</select>

<br><br>

<input type="submit" value="Registrer">

</form>

<br>

<a href="index.php">Tilbake til hovedmeny</a>

</body>
</html>