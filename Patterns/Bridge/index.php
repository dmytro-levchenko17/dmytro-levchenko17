<?php 

declare(strict_types=1);

require __DIR__ . '/BridgeInterface.php';
require __DIR__ . '/UpperText.php';
require __DIR__ . '/LowerText.php';
require __DIR__ . '/Text.php';


$UpperPrinter = new Text(new UpperText());
echo $UpperPrinter->output('tTt');

echo '<br/>';

$LowerPrinter = new Text(new LowerText());
echo $LowerPrinter->output('TtT');