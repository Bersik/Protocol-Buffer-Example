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
require_once('Com/Test/Proto/Search.php');

use Com\Test\Proto\DeveloperList;
use Com\Test\Proto\Developer;
use Com\Test\Proto\Search;

class DeveloperClient
{
    const LINK = "developer/";
    private $host;
    
    public function __construct($host)
    {
        $this->host = $host;
    }

    public function getAllDevelopers()
    {
        $response = \Httpful\Request::get($this->host . self::LINK)->send();
        $developers = new DeveloperList();
        $developers->parseFromString($response);
        return $developers;
    }

    public function getDeveloperById($devId)
    {
        $response = \Httpful\Request::get($this->host . self::LINK . $devId)->send();
        $developer = new Developer();
        $developer->parseFromString($response);
        return $developer;
    }

    public function putDeveloper($developer)
    {
        \Httpful\Request::put($this->host . self::LINK)->body($developer->serializeToString())->addHeader('Content-Type', 'application/x-protobuf')->send();
    }

    public function updateDeveloper($developer)
    {
        \Httpful\Request::post($this->host . self::LINK . $developer->getId())->body($developer->serializeToString())->addHeader('Content-Type', 'application/x-protobuf')->send();
    }

    public function deleteDeveloper($devId)
    {
        \Httpful\Request::delete($this->host . self::LINK . $devId)->send();
    }

    public function getDevelopersByName($devName)
    {
        $search = new Search();
        $search->setName($devName);
        $response = \Httpful\Request::post($this->host . self::LINK . 'getByName')->body($search->serializeToString())->addHeader('Content-Type', 'application/x-protobuf')->send();
        $developers = new DeveloperList();
        $developers->parseFromString($response);
        return $developers;
    }

}