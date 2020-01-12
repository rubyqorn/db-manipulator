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

    /**
     * Array with questions marks for
     * prepared statement SQL
     * 
     * @var array
     */ 
    protected $questionMarks = [];

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
     * Prepared SQL statement
     * 
     * Prepare SQL statement and bind 
     * values with question marks.
     * Can be used with Insert and 
     * Delete classes.
     * 
     * @return bool
     */ 
    public function push()
    {
        $processing = $this->prepare(
            $this->convertSQLToString($this->sql)    
        )->bind($this->statement, $this->values);

        return $processing;

    }

    /**
     * This is abstaraction of fetchAll PDO method
     * 
     * @param \PDOStatement $statement
     * 
     * @return array
     */ 
    protected function fetchAll(\PDOStatement $statement)
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
    protected function fetchColumn(\PDOStatement $statement)
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
    protected function query(string $query)
    {
        $this->statement = $this->connection()->query($query);
        return $this;
    }

    /**
     * Prepare SQL statement
     * 
     * Assign statement property \PDOStatement object
     * and return reference on this class
     * 
     * @param string $query 
     * 
     * @return \Manipulator\SQL\Query 
     */ 
    protected function prepare(string $query)
    {
        $this->statement = $this->connection->prepare($query);
        return $this;
    }

    /**
     * Bind values with question marks into SQL statement
     * 
     * @param \PDOStatement $statement 
     * @param array $values 
     * 
     * @return bool
     */ 
    protected function bind(\PDOStatement $statement, array $values)
    {
        return $statement->execute($values);
    }

    /**
     * Convert passed SQL statement like array 
     * in to string 
     * 
     * @param array $sql 
     * 
     * @return string
     */ 
    protected function convertSQLToString(array $sql)
    {
        return $this->parser->convertToString($sql, ' ');
    }

    /**
     * Convert columns from sql to 
     * array
     * 
     * @param string $columns
     * 
     * @return array
     */ 
    protected function convertColumnsToArray(string $values)
    {
        return $this->parser->convertToArray($values, ',');
    }

    /**
     * Generat question marks for prepared statement SQL
     * 
     * @param array $columns 
     * 
     * @return array;
     */ 
    public function questionMarksGenerator(array $columns)
    {
        foreach($columns as $column)
        {
            $this->questionMarks[] = $column = '?';
        }

        return $this->parser->convertToString($this->questionMarks, ',');
    }

}