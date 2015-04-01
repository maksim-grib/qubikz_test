<?php

spl_autoload_register(function($className) {
    include 'classes' . DIRECTORY_SEPARATOR . $className . '.php';
});

$cards = array(
    new TrainCard('Kiev', 'Lviv', 'X12', '18C'),
    new BusCard('Lviv', 'Lviv Danylo Halytskiy International Airport', 'airport'),
    new AirportCard('Lviv Danylo Halytskiy International Airport', 'Stockholm', 'BF134', '45B', '3A', 'Baggage drop at ticket counter 344'),
    new AirportCard('Stockholm', 'Amsterdam Schiphol', 'SK22', '18', '7B', 'Baggage will be automatically transferred from your last leg'),
    new TrainCard('Amsterdam Schiphol', 'Rotterdam', 'T13', '12B'),
);

shuffle($cards);

$sorter = new TravelSorter();
$sorter->addCards($cards);

foreach ($sorter as $key => $card) {
    echo sprintf('- %s<br />%s', $card, PHP_EOL);
}
echo '- You have arrived at your final destination.';