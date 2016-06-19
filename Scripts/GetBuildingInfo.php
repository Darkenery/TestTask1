<?php
/**
 * Created by PhpStorm.
 * User: Darke
 * Date: 10.06.2016
 * Time: 15:31
 */
include '../Classes/DBConnection.php';
include '../Classes/Building.php';
use Darkenery\Task1\Classes\DBConnection;
use Darkenery\Task1\Classes\Building;

session_start();
$position = $_SESSION['position'] + $_GET['pos_change'];

$connection = DBConnection::getInstance();
$result = $connection->mysqli->query('SELECT kfid FROM buildings');
$arrayOfKfid = mysqli_fetch_all($result);

$num = mysqli_num_rows($result);

$arrayOfBuildings = array();
for ($i=0; $i<$num; $i++) {
    if (!is_null($arrayOfKfid[$i][0])) {
        $arrayOfBuildings[] = new Building($arrayOfKfid[$i][0]);
    }
}

$numOfBuildings = count($arrayOfBuildings);
if ($position <0 )
    $position = $numOfBuildings-1;
if ($position > $numOfBuildings-1)
    $position = 0;
$_SESSION['position'] = $position;

$BuildingToShow = $arrayOfBuildings[$position];

$BuildingToShow->showBuilding();

















    



