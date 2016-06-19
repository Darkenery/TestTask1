<?php
/**
 * Created by PhpStorm.
 * User: darke_000
 * Date: 09.06.2016
 * Time: 20:15
 */

namespace Darkenery\Task1\Classes;


class Building
{
    public $kfid;
    public $id;
    public $createDate;
    public $buildingType;
    public $title;
    public $target;
    public $special;
    public $district;
    public $subway;
    public $address;
    public $latitude;
    public $longitude;
    public $shopwindow;
    public $square;
    public $purpose;
    public $electricity;
    public $fitOut;
    public $tenant;
    public $entrance;
    public $rentSqm;
    public $rentAll;
    public $description;

    public $images = array();

    /**
     * Building constructor.
     * @param $kfid
     */
    public function __construct($kfid)
    {
        $connection = DBConnection::getInstance();
        if (isset($kfid)) {
            $stmt = $connection->mysqli->prepare('SELECT * FROM buildings WHERE kfid=?');
            if ($stmt !== FALSE) {
                $stmt->bind_param('s', $kfid);
                $stmt->execute();
                $stmt->bind_result($this->kfid,
                    $this->id,
                    $this->createDate,
                    $this->buildingType,
                    $this->title,
                    $this->target,
                    $this->special,
                    $this->district,
                    $this->subway,
                    $this->address,
                    $this->latitude,
                    $this->longitude,
                    $this->shopwindow,
                    $this->square,
                    $this->purpose,
                    $this->electricity,
                    $this->fitOut,
                    $this->tenant,
                    $this->entrance,
                    $this->rentSqm,
                    $this->rentAll,
                    $this->description);
                $stmt->fetch();
            }
            $stmt->close();

            $stmt=$connection->mysqli->prepare('SELECT photo FROM photos WHERE kfid=?');
            $stmt->bind_param('s', $kfid);
            $stmt->execute();
            $stmt->bind_result($image);
            while($stmt->fetch())
                $this->images[]=$image;
        }
    }

    /**
     *
     */
    public function showBuilding()
    {
        echo 'ID: '.$this->id.'<br>';
        echo 'Building Type: '.$this->buildingType.'<br>';
        echo 'Title: '.$this->title.'<br>';
        echo 'Target: '.$this->target.'<br>';
        echo 'District: '.$this->district.'<br>';
        echo 'Subway: '.$this->subway.'<br>';
        echo 'Address: '.$this->address.'<br>';
        echo 'Latitude: '.$this->latitude.'<br>';
        echo 'Longitude: '.$this->longitude.'<br>';
        echo 'Shopwindow: '.$this->shopwindow.'<br>';
        echo 'Square: '.$this->square.'<br>';
        echo 'Purpose: '.$this->purpose.'<br>';
        echo 'Electricity: '.$this->electricity.'<br>';
        echo 'Fitout: '.$this->fitOut.'<br>';
        echo 'Tenant: '.$this->tenant.'<br>';
        echo 'Entrance: '.$this->entrance.'<br>';
        echo 'RentSqm: '.$this->rentSqm.'<br>';
        echo 'RentAll: '.$this->rentAll.'<br>';
        echo 'Description: '.$this->description.'<br>';
        foreach($this->images as $image)
            echo "<img src=$image>";
    }
}