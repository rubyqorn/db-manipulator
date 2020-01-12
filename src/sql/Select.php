<?php

namespace Manipulator\SQL;

use Manipulator\SQL\Traits\Expressions;

class Select extends Query
{
    use Expressions;

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
     * This is equivalent of DISTINCT sorter in SQL
     * 
     * Pass SQL statement into sql array and return 
     * reference on this object
     * 
     * @param string $columns
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function distinct(string $columns)
    {
        $this->sql[] = "SELECT DISTINCT {$columns} FROM {$this->table}";
        return $this;
    }
    
    /**
     * Equivalent of INNER JOIN SQL statement
     * 
     * @param string $columns 
     * @param string $joinedTable 
     * @param string $condition 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function join(string $columns, string $joinedTable, string $condition)
    {
        $this->sql[] = "SELECT {$columns} FROM {$this->table} INNER JOIN {$joinedTable} ON {$condition}";
        return $this;
    }

    /**
     * Equivalent of LEFT JOIN SQL statement
     * 
     * @param string $columns 
     * @param string $joinedTable 
     * @param string $condition 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function leftJoin(string $columns, string $joinedTable, string $condition)
    {
        $this->sql[] = "SELECT {$columns} FROM {$this->table} LEFT JOIN {$joinedTable} ON {$condition}";
        return $this;
    }

    /**
     * Equivalent of RIGHT JOIN SQL statement
     * 
     * @param string $columns 
     * @param string $joinedTable 
     * @param string $condition 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function rightJoin(string $columns, string $joinedTable, string $condition)
    {
        $this->sql[] = "SELECT {$columns} FROM {$this->table} RIGHT JOIN {$joinedTable} ON {$condition}";
        return $this;
    }
}