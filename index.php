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
    <h2>PHP calculator</h2>
    <form method="get">
        <label for="cost">Cost per Km</label>
        <input name="cost" value="<?= $cost ?>" />
        <label for="distance">Distance</label>
        <input name="distance" value="<?= $distance ?>" />
        <button type="submit">Get ticket cost</button>
    </form>
    <?php
    require 'Cost.php';

    $ticketCost = new Cost();
    $ticketCost->setCost($cost)
        ->setDistance($distance);

    echo <<<HTML
        <h1>Ticket cost is {$ticketCost->get()} TJS</h1>
        HTML;
    ?>
    <hr>
    <h2>JS calculator</h2>
    <form id="calculator">
        <label for="cost">Cost per Km</label>
        <input name="cost" value="0.5" />
        <label for="distance">Distance</label>
        <input name="distance" value="0" />
        <button type="button" onclick="getTicketCost()">Get ticket cost</button>
    </form>
    <h1 id="result">Ticket cost is 0 TJS</h1>
</body>

</html>
