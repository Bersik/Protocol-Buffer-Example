<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('Com/Test/Client/DeveloperClient.php');
require_once('Com/Test/Client/SoftwareClient.php');
require_once('Com/Test/Proto/Developer.php');
require_once('Com/Test/Proto/Software.php');

const HOST = "http://192.168.111.1:8080/";

function printDevelopers($developers)
{
    foreach ($developers->getDevelopers() as $dev) {
        echo 'Dev #' . $dev->getId() . ') ' . $dev->getName() . "\r\n";
    }
}

function printSoftware($softwareList)
{
    foreach ($softwareList->getSoftwares() as $soft) {
        echo 'Soft #' . $soft->getId() . ') ' . $soft->getName() . "\r\n";
    }
}

echo "------ DEV test ------\r\n";
$devClient = new \Com\Test\Client\DeveloperClient(HOST);

// Get all
echo "1. Get all  \r\n";
printDevelopers($devClient->getAllDevelopers());

// Get by id
echo "2. Get by id(1)\r\n";
$dev = $devClient->getDeveloperById(1);
echo 'Dev #' . $dev->getId() . ') ' . $dev->getName() . "\r\n";

echo "3. Put developer\r\n";
$dev = new Com\Test\Proto\Developer();
$dev->setId(3);
$dev->setName('Dev3');
$devClient->putDeveloper($dev);
printDevelopers($devClient->getAllDevelopers());

echo "4. Update developer 3\r\n";
$dev->setName('Dev3_new');
$devClient->updateDeveloper($dev);
printDevelopers($devClient->getAllDevelopers());

echo "5. Delete developer 3\r\n";
$devClient->deleteDeveloper(3);
printDevelopers($devClient->getAllDevelopers());

echo "6. Get by name\r\n";
printDevelopers($devClient->getDevelopersByName('Dev1'));


echo "\r\n\r\n------ Soft test ------\r\n";
$softClient = new \Com\Test\Client\SoftwareClient(HOST);

// Get all
echo "1. Get all  \r\n";
printSoftware($softClient->getAllSoftware());

// Get by id
echo "2. Get by id(1)\r\n";
$soft = $softClient->getSoftwareById(1);
echo 'Soft #' . $soft->getId() . ') ' . $soft->getName() . "\r\n";

echo "3. Put developer\r\n";
$soft = new Com\Test\Proto\Developer();
$soft->setId(3);
$soft->setName('Dev3');
$softClient->putSoftware($soft);
printSoftware($softClient->getAllSoftware());

echo "4. Update software 3\r\n";
$soft->setName('Dev3_new');
$softClient->updateSoftware($soft);
printSoftware($softClient->getAllSoftware());

echo "5. Delete software 3\r\n";
$softClient->deleteSoftware(3);
printSoftware($softClient->getAllSoftware());

echo "6. Get by name\r\n";
printSoftware($softClient->getSoftwareByName('Software1'));

echo "7. Get Software By Developer\r\n";
$dev = $devClient->getDeveloperById(1);
printSoftware($softClient->getSoftwareByDeveloper($dev));
?>