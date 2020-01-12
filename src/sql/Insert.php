<?php

namespace Manipulator\SQL;

use \Manipulator\SQL\Traits\Expressions;

class Insert extends Query
{
    use Expressions;

    /**
     * Contains the table name
     * which we set into our model
     * class
     * 
     * @var string
     */ 
    private $table;

    /**
     * Contains all SQL statements
     * like array elements
     * 
     * @var array
     */ 
    protected $sql = [];

    /**
     * Columns names which we was
     * passed into our "into" method
     * 
     * @var string
     */ 
    private $columns;

    /**
     * Values which will be
     * bind with question marks
     * in prepared SQL statement
     * 
     * @var array
     */ 
    protected $values;

    /**
     * @param string $table
     */ 
    public function __construct(string $table)
    {
        $this->table = $table;

        parent::__construct();
    }

    /**
     * Prepare columns for question marks 
     * generator
     * 
     * @param string $columns 
     * 
     * @return \Manipulator\SQL\Insert
     */ 
    public function into(string $columns)
    {
        $this->columns = $columns;

        $this->sql[] = "INSERT INTO {$this->table} ({$this->columns})";
        return $this;
    }

    /**
     * Prepare passed values for
     * binding with question marks
     * 
     * @param array $values 
     * 
     * @return \Manipulator\SQL\Insert
     * */ 
    public function values(array $values)
    {
        $this->values = $values;

        $columns = $this->convertColumnsToArray($this->columns);
        $this->sql[] = " VALUES ({$this->questionMarksGenerator($columns)})";
        return $this;
    }
    
}