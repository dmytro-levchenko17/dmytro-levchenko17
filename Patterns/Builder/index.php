<?php 

declare(strict_types=1);

require __DIR__ . '/MailManager.php';
require __DIR__ . '/MailBuilder.php';


$builder = new MailBuilder();
$builder->setTitle('Title of mail')
        ->setText('some text')
        ->setSubject('One subject')
        ->setDestination('somemail@mail.com');

$manager = new MailManager;
$manager->setBuilder($builder);

$mail = $manager->createMail();

echo '<pre>';
print_r($mail);
echo '</pre>';