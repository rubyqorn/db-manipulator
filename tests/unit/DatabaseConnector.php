<?php

namespace Tests\Unit;

use PHPUnit\Framework\Testcase;
use PHPUnit\DbUnit\TestCaseTrait;

abstract class DatabaseConnector extends TestCase 
{
    use TestCaseTrait;

    protected $connection;

    public function getConnection()
    {
        $this->connection = new \PDO('mysql:host=localhost;dbname=test', 'root', 'ANDI121318275609');
        return $this->createDefaultDBConnection($this->connection, 'test');
    }

    public function getDataSet()
    {
       return $this->createFlatXMLDataSet(dirname(__FILE__) . '/datasets/data.xml');
    }
}