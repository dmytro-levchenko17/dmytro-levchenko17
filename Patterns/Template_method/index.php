<?php 

declare(strict_types=1);

require __DIR__ . '/UserInfo.php';
require __DIR__ . '/FirstUser.php';
require __DIR__ . '/SecondUser.php';
require __DIR__ . '/ThirdUser.php';

$firstUser = new FirstUser();
$firstUser->AddUserData();
echo '<br>';

$secondUser = new SecondUser();
$secondUser->AddUserData();
echo '<br>';

$thirdUser = new ThirdUser();
$thirdUser->AddUserData();