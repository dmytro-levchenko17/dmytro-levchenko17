<?php
require __DIR__ . '/bootstrap.php';

$shipLoader = new ShipLoader($container->getShipStorage());
$ships = $shipLoader->getShips();

$ship1Id = $_POST['ship1_id'] ?? null;
$ship1Quantity = $_POST['ship1_quantity'] ?? 1;
$ship2Id = $_POST['ship2_id'] ?? null;
$ship2Quantity = $_POST['ship2_quantity'] ?? 1;

if (!$ship1Id || !$ship2Id) {
    header('Location: /index.php?error=missing_data');
    die;
}

if (!isset($ships[$ship1Id], $ships[$ship2Id])) {
    header('Location: /index.php?error=bad_ships');
    die;
}

if ($ship1Quantity <= 0 || $ship2Quantity <= 0) {
    header('Location: /index.php?error=bad_quantities');
    die;
}

$ship1 = $container->getShipStorage()->findOneById((int) $ship1Id);
$ship2 = $container->getShipStorage()->findOneById((int) $ship2Id);

$battleManager = new BattleManager();
$outcome = $battleManager->battle($ship1, $ship1Quantity, $ship2, $ship2Quantity);

$battleLoader = new BattleLoader($container->getPDO());
$battleLoader->save($outcome);
?>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Космическая битва</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="page-header" style="display:flex;align-items: center; justify-content: flex-start;">
        <h1>Космическая битва</h1>
        <li style="margin: 10px 0 0 40px; list-style: none;">
            <a href="history.php">История битв</a>
        </li>
    </div>
    <div>
        <h2 class="text-center">Столкновение:</h2>
        <p class="text-center">
            <br>
            <?php
            echo $ship1Quantity; ?> <?php
            echo $ship1->getName(); ?><?php
            echo $ship1Quantity > 1 ? 's' : ''; ?>
            VS.
            <?php
            echo $ship2Quantity; ?> <?php
            echo $ship2->getName(); ?><?php
            echo $ship2Quantity > 1 ? 's' : ''; ?>
        </p>
    </div>
    <div class="result-box center-block">
        <h3 class="text-center audiowide">
            Winner:
            <?php
            if ($outcome->getWinningShip()): ?>
                <?php
                echo $outcome->getWinningShip()->getName(); ?>
            <?php
            else: ?>
                Ничья
            <?php
            endif; ?>
        </h3>
        <p class="text-center">
            <?php
            if ($outcome->getWinningShip() == null): ?>
                Корабли уничтожили друг друга в эпической битве.
            <?php
            else: ?>
                The <?php
                echo $outcome->getWinningShip()->getName(); ?>
                <?php
                if ($outcome->isJediPowerUsed()): ?>
                    использовал свои Силу Джедая для ошеломляющей победы!
                <?php
                else: ?>
                    одолели и уничтожили  <?php 
                    if ($outcome->getWinningShip()->getName() == $outcome->getShip1()->getName()) {
                        echo $outcome->getShip2()->getName();
                    } else {
                        echo $outcome->getShip1()->getName(); 
                    }?>s
                <?php
                endif; ?>
            <?php
            endif; ?>
        </p>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Осталось HP после битвы:</p>
            </div>
            <?php if ($outcome->getWinningShip() == null): ?>
                <div class="col-md-12 text-center">
                    <p>У обоих кораблей не осталось HP</p>
                </div>
             <?php else: ?>
                <div class="col-md-6 text-center">
                    <p><?php echo $outcome->getShip1()->getName(); ?> : <?php echo $outcome->getShip1HP(); ?></p>
                </div>
                <div class="col-md-6 text-center">
                    <p><?php echo $outcome->getShip2()->getName(); ?> : <?php echo $outcome->getShip2HP(); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <a href="index.php"><p class="text-center"><i class="fa fa-undo"></i> Снова в бой</p></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</div>
</body>
</html>
