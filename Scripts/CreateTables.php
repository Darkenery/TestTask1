<?php
/**
 * Created by PhpStorm.
 * User: darke_000
 * Date: 11.06.2016
 * Time: 2:41
 */

include '/Classes/DBConnection.php';
$connection = \Darkenery\Task1\Classes\DBConnection::getInstance();

if (!$connection->mysqli->query('SELECT id FROM buildings'))
    $connection->mysqli->query('CREATE TABLE `buildings` (
                          `kfid` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
                          `id` int(6) DEFAULT NULL,
                          `createdate` varchar(16) DEFAULT NULL,
                          `buildingtype` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
                          `title` text CHARACTER SET utf8 COLLATE utf8_bin,
                          `target` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
                          `special` varchar(16) CHARACTER SET koi8u COLLATE koi8u_bin DEFAULT NULL,
                          `disctrict` text CHARACTER SET koi8u COLLATE koi8u_bin,
                          `subway` text CHARACTER SET utf8 COLLATE utf8_bin,
                          `address` text CHARACTER SET utf8 COLLATE utf8_bin,
                          `latitude` double DEFAULT NULL,
                          `longitude` double DEFAULT NULL,
                          `shopwindow` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
                          `square` int(16) DEFAULT NULL,
                          `purpose` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
                          `electricity` int(16) DEFAULT NULL,
                          `fitout` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
                          `tenant` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
                          `entrance` text CHARACTER SET utf8 COLLATE utf8_bin,
                          `rentsqm` int(16) DEFAULT NULL,
                          `rentall` text CHARACTER SET utf8 COLLATE utf8_bin,
                          `description` text CHARACTER SET utf8 COLLATE utf8_bin
)');

if (!$connection->mysqli->query('SELECT photo FROM photos'))
    $connection->mysqli->query('CREATE TABLE `photos` (
                          `kfid` varchar(12) NOT NULL,
                          `photo` text NOT NULL
)');
