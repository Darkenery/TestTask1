<?php
/**
 * Created by PhpStorm.
 * User: Darke
 * Date: 10.06.2016
 * Time: 12:26
 */
use \Darkenery\Task1\Classes\DBConnection;

include '../Classes/DBConnection.php';
$url='someurl_to_xml';
$connection = DBConnection::getInstance();
$connection->mysqli->query('DELETE FROM buildings');
$connection->mysqli->query('DELETE FROM photos');

$parser = xml_parser_create();
xml_parse_into_struct($parser, file_get_contents($url), $vals, $index );

foreach ($index['KFID'] as $kfid) {
    $key = key($index['KFID']);
    next($index['KFID']);
    $kfid = $vals[$index['KFID'][$key]]['value'];
    $id = $vals[$index['ID'][$key]]['value'];
    $createDate = $vals[$index['CREATEDATE'][$key]]['value'];
    $buildingType = $vals[$index['BUILDINGTYPE'][$key]]['value'];
    $title = $vals[$index['TITLE'][$key]]['value'];
    $target = $vals[$index['TARGET'][$key]]['value'];
    $special = $vals[$index['SPECIAL'][$key]]['value'];
    $disctrict = $vals[$index['DISTRICT'][$key]]['value'];
    $subway = $vals[$index['SUBWAY'][$key]]['value'];
    $address = $vals[$index['ADDRESS'][$key]]['value'];
    $latitude = $vals[$index['LATITUDE'][$key]]['value'];
    $longitude = $vals[$index['LONGITUDE'][$key]]['value'];
    $shopwindow = $vals[$index['SHOPWINDOW'][$key]]['value'];
    $square = $vals[$index['SQUARE'][$key]]['value'];
    $purpose = $vals[$index['PURPOSE'][$key]]['value'];
    $electricity = $vals[$index['ELECTRICITY'][$key]]['value'];
    $fitout = $vals[$index['FITOUT'][$key]]['value'];
    $tenant = $vals[$index['TENANT'][$key]]['value'];
    $entrance = $vals[$index['ENTRANCE'][$key]]['value'];
    $rentSqm = $vals[$index['RENTSQM'][$key]]['value'];
    $rentAll = $vals[$index['RENTALL'][$key]]['value'];
    $description = $vals[$index['DESCRIPTION'][$key]]['value'];
    $stmt=$connection->mysqli->prepare('INSERT INTO buildings VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sissssssssddsisisssiss',
        $kfid,
        $id,
        $createDate,
        $buildingType,
        $title,
        $target,
        $special,
        $disctrict,
        $subway,
        $address,
        $latitude,
        $longitude,
        $shopwindow,
        $square,
        $purpose,
        $electricity,
        $fitout,
        $tenant,
        $entrance,
        $rentSqm,
        $rentAll,
        $description);
    if (!$stmt->execute())
        print_r($stmt->error);
}


$xml = simplexml_load_string(file_get_contents($url));
$json = json_encode($xml);
$array = json_decode($json,TRUE);
foreach ($array['Object'] as $obj)
    foreach ($obj['Images'] as $image) {
        $stmt = $connection->mysqli->prepare('INSERT INTO photos VALUES (?, ?)');
        if (is_array($image))
            foreach ($image as $img){
                $stmt->bind_param('ss', $obj['KfId'], $img);
                $stmt->execute();
            } else {
                $stmt->bind_param('ss', $obj['KfId'], $image);
                $stmt->execute();
        }
    }





