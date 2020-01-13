<?php

namespace Manipulator\SQL;

use Manipulator\SQL\Traits\Expressions;

class Update extends Query
{
    use Expressions;

    /**
     * Table name where we will be
     * maniulate data
     * 
     * @var string
     */ 
    protected $table;

    /**
     * Values which will be bind 
     * in prepared statement with
     * question marks
     * 
     * @var array
     */ 
    protected $values;

    /**
     * SQL statement
     * 
     * @var array
     */ 
    protected $sql = [];

    public function __construct(string $table)
    {
        $this->table = $table;

        parent::__construct();
    }

    /**
     * Set SQL statement which update record into
     * database
     * 
     * @param string $columns
     * @param array $values 
     * 
     * @return \Manipulator\SQL\Update
     */ 
    public function set(string $columns, array $values)
    {
        $this->values = $values;

        $this->sql[] = "UPDATE {$this->table} SET {$columns} ";
        return $this;
    }
}