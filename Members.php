<?php $pagetitle = 'Deelnemers'; ?>
<?php include 'inc/header.tpl'; ?>

<?php
    // connect to database or show error
    include 'inc/cnx.php';

    // voer de query uit of toon een foutbericht
    $query = "SELECT * FROM members ";
    $result = mysqli_query($query, $link);
    if (!$result) {
        die('<br>Invalid query: ' . mysqli_error($link));
    }
?>

<table>
    <tr>
        <td width="1%" align="center" bgcolor="#CCCCCC"><strong>#</strong></td>
        <td width="2%" align="center" bgcolor="#CCCCCC"><strong>Voornaam:</strong></td>
        <td width="1%" align="center" bgcolor="#CCCCCC"><strong>Prefix:</strong></td>
        <td width="2%" align="center" bgcolor="#CCCCCC"><strong>Achternaam:</strong></td>
        <td width="10%" align="center" bgcolor="#CCCCCC"><strong>Opmerking:</strong></td>
    </tr>

    <?php
    // Start looping table row
    while ($rows = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td align="center"><?php echo $rows['id']; ?></td>
            <td align="center"><?php echo $rows['voornaam']; ?></td>
            <td align="center"><?php echo $rows['prefix']; ?></td>
            <td align="center"><?php echo $rows['achternaam']; ?></td>
            <td align="center"><?php echo $rows['opmerking']; ?></td>
        </tr>

        <?php
// Exit looping and close connection 
    }
    mysqli_close($link);
    ?>
