<?php

namespace Manipulator\SQL;

use Manipulator\Connector;
use Manipulator\Parser\SQLParser;

class Query extends Connector
{
    /**
     * @var \Manipulator\Parser\SQLParser
     */ 
    protected $parser;
    
    /**
     * @var \PDOStatement
     */ 
    protected $statement;

    public function __construct()
    {
        parent::__construct();

        $this->parser = new SQLParser();
    }

    /**
     * SQL statement implemetation
     * Get SQL statement like array then convert
     * to string and pass into query method where we
     * get \PDOStatement class, and pass it into 
     * fetchAll method where we get data
     * 
     * @return array
     */ 
    public function get()
    {
        return $this->query(
                $this->convertSQLToString($this->sql)
                    )->fetchAll($this->statement);   
    }

    /**
     * This is abstaraction of fetchAll PDO method
     * 
     * @param \PDOStatement $statement
     * 
     * @return array
     */ 
    public function fetchAll(\PDOStatement $statement)
    {
        return $statement->fetchAll();
    }

    /**
     * This is abstraction of fetchColumn PDO method
     * 
     * @param \PDOStatement $statement
     * 
     * @return string
     * */ 
    public function fetchColumn(\PDOStatement $statement)
    {
        return $statement->fetchColumn();
    }

    /**
     * Pass needed query into query PDO method
     * 
     * @param string $query 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function query(string $query)
    {
        $this->statement = $this->connection()->query($query);
        return $this;
    }

    /**
     * Convert passed SQL statement like array 
     * in to string 
     * 
     * @param array $sql 
     * 
     * @return string
     */ 
    public function convertSQLToString(array $sql)
    {
        return $this->parser->convertToString($sql, ' ');
    }

}