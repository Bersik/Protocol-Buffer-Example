<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bersik
 * Date: 11/02/16
 * Time: 21:13
 */

namespace Com\Test\Client;

require_once('Com/Test/Proto/Developer.php');
require_once('Com/Test/Proto/DeveloperList.php');
require_once('Com/Test/Proto/Software.php');
require_once('Com/Test/Proto/SoftwareList.php');
require_once('Com/Test/Proto/Search.php');

use Com\Test\Proto\DeveloperList;
use Com\Test\Proto\Developer;
use Com\Test\Proto\Software;
use Com\Test\Proto\SoftwareList;
use Com\Test\Proto\Search;

class SoftwareClient
{
    const LINK = "software/";
    private $host;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function getAllSoftware()
    {
        $response = \Httpful\Request::get($this->host . self::LINK)->send();
        $softwareList = new SoftwareList();
        $softwareList->parseFromString($response);
        return $softwareList;
    }

    public function getSoftwareById($softId)
    {
        $response = \Httpful\Request::get($this->host . self::LINK . $softId)->send();
        $software = new Software();
        $software->parseFromString($response);
        return $software;
    }

    public function putSoftware($software)
    {
        \Httpful\Request::put($this->host . self::LINK)->body($software->serializeToString())->addHeader('Content-Type', 'application/x-protobuf')->send();
    }

    public function updateSoftware($software)
    {
        \Httpful\Request::post($this->host . self::LINK . $software->getId())->body($software->serializeToString())->addHeader('Content-Type', 'application/x-protobuf')->send();
    }

    public function deleteSoftware($softId)
    {
        \Httpful\Request::delete($this->host . self::LINK . $softId)->send();
    }

    public function getSoftwareByName($softName)
    {
        $search = new Search();
        $search->setName($softName);
        $response = \Httpful\Request::post($this->host . self::LINK . 'getByName')->body($search->serializeToString())->addHeader('Content-Type', 'application/x-protobuf')->send();
        $softwareList = new SoftwareList();
        $softwareList->parseFromString($response);
        return $softwareList;
    }

    public function getSoftwareByDeveloper($dev)
    {
        $response = \Httpful\Request::post($this->host . self::LINK . 'getSoftwareByDeveloper')->body($dev->serializeToString())->addHeader('Content-Type', 'application/x-protobuf')->send();
        $softwareList = new SoftwareList();
        $softwareList->parseFromString($response);
        return $softwareList;
    }


}