<?php
$cost = 0.5;
$distance = 0;

if (isset($_GET['cost'])) {
    $cost = (float) $_GET['cost'];
}

if (isset($_GET['distance'])) {
    $distance = (float) $_GET['distance'];
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <title>Ticket cost calculator</title>
</head>

<body>
    <form method="get">
        <label for="cost">Cost per Km</label>
        <input name="cost" value="<?= $cost ?>" />
        <label for="distance">Distance</label>
        <input name="distance" value="<?= $distance ?>" />
        <button type="submit">Get ticket cost</button>
    </form>
    <hr>
    <?php
    require 'Cost.php';

    $ticketCost = new Cost();
    $ticketCost->setCost($cost)
        ->setDistance($distance);

    echo <<<HTML
        <h1>Ticket cost is {$ticketCost->get()} TJS</h1>
        HTML;
    ?>

</body>

</html>
