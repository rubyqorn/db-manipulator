<?php

namespace Manipulator\SQL;

class Select extends Query
{
    /**
     * The table name which 
     * we set into using model
     * 
     * @var string
     */ 
    private $table;
    /**
     * Contains an SQL string
     * 
     * @var string
     */ 
    protected $sql;

    /**
     * @param string $table
     *  
     * Set table name into your model class
     */ 
    public function __construct(string $table)
    {
        $this->table = $table;

        parent::__construct();

    }

    /**
     * Select all records from table.
     * The first what we do it's create an SQL statement,
     * then pass it into query method where we get connection
     * with database and pass SQL, and finally pass the SQL 
     * statement which we set into query method into fetchAll
     * method 
     * 
     * @return array
     */ 
    public function all()
    {
        $this->sql = "SELECT * FROM {$this->table}";
        return $this->query($this->sql)->fetchAll($this->statement);
    }

    /**
     * Select needed rows
     * The first what we do it's create an SQL statement,
     * then pass it into query method where we get connection
     * with database and pass SQL, and finally pass the SQL 
     * statement which we set into query method into fetchColumn
     * method 
     * 
     * @param string $rows 
     * 
     * @return string
     */ 
    public function rows(string $rows)
    {
        $this->sql = "SELECT {$rows} FROM {$this->table}";
        return $this->query($this->sql)->fetchColumn($this->statement);
    }

    /**
     * Select passed columns from database
     * Pass SQL statement into sql array and 
     * return object of Select class
     *  
     * @param string $columns 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function columns(string $columns)
    {
        $this->sql[] = "SELECT {$columns} FROM {$this->table}";
        return $this;
    }

    /**
     * The equivalent of WHERE SQL condition
     * 
     * If you want to select record with the 
     * condition you can combine it with another
     * sql's
     * 
     * @param string $condition 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function where(string $condition)
    {
        $this->sql[] = " WHERE {$condition}";
        return $this;
    }

}