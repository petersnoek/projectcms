<?php

// if user submitted a form, then process the input. if nothing was submitted than show empty form
if ( ! isset ($_POST['submit'])) {
    // nothing submitted
    include("inc/class.TemplatePower.inc.php");
    $tpl = new TemplatePower("tpl/member_new.tpl");
    $tpl->assignInclude("header", "tpl/header.tpl");
    $tpl->prepare();
    $tpl->assign('pagetitle', 'Nieuwe deelnemer');
    $tpl->printToScreen();
}
else
{
    // received a post

    // connect to database or show error
    include 'inc/cnx.php';

    $voornaam = mysqli_real_escape_string($link, $_POST['voornaam']);
    $prefix = mysqli_real_escape_string($link, $_POST['prefix']);
    $achternaam = mysqli_real_escape_string($link, $_POST['achternaam']);
    $telefoon = mysqli_real_escape_string($link, $_POST['telefoon']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $adres = mysqli_real_escape_string($link, $_POST['adres']);
    $postcode = mysqli_real_escape_string($link, $_POST['postcode']);
    $plaats = mysqli_real_escape_string($link, $_POST['plaats']);
    $opmerking = mysqli_real_escape_string($link, $_POST['opmerking']);
    $error = false;

    if ( empty($voornaam) )
    {
        echo "<span style='color:red;'>Error: Voeg een voornaam toe!!</span><br>";
        $error = true;
    }


    $query = "INSERT INTO members (voornaam, prefix, achternaam, telefoon, email, adres, postcode, plaats, opmerking) VALUES ('$voornaam', '$prefix', '$achternaam', '$telefoon', '$email', '$adres', '$postcode', '$plaats', '$opmerking')";
    $result = mysqli_query($link, $query);
    if (!$result) {
        die('<br>Invalid query: [' . $query . '] error: ' . mysqli_error($link));
    }

    // close link
    mysqli_close($link);

    // decide what to do
    if ( $result == true )
    {
        echo "<span style='color:green;'>Gebruiker aangemaakt.</span><br>";
    }
    else
    {
        echo "<span style='color:red;'>Whoops! Er is iets mis gegaan.</span><br>";
    }



}
?>