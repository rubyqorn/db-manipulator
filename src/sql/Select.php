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

    /**
     * This is equivalent of ORDER BY statement in SQL
     * 
     * Pass our SQL statement into sql array and
     * return references on this object
     * 
     * @param string $column 
     * @param string $sortOrder
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function orderBy(string $column, string $sortOrder)
    {
        $this->sql[] = " ORDER BY {$column} {$sortOrder}";
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
     * This is equivalent of LIMIT SQL statement
     * 
     * Insert into sql array your SQL statement 
     * and return reference on this object
     * 
     * @param string $quantity
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function limit(string $quantity)
    {
        $this->sql[] = " LIMIT {$quantity}";
        return $this;
    }

    /**
     * This is equivalent of AND SQL statement
     * 
     * Can be used with WHERE, BETWEEN and etc... statements
     * 
     * @param string $condition 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function and(string $condition)
    {
        $this->sql[] = " AND {$condition}";
        return $this;
    }

    /**
     * This is equivalent of OR SQL statement
     * 
     * Can be used with another SQL statements
     * like WHERE and etc
     * 
     * @param string $condition 
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function or(string $condition)
    {
        $this->sql[] = " OR {$condition}";
        return $this;
    }

    /**
     * This is equivalent of BETWEEN SQL statement
     * 
     * Usually its use when you need to get average value
     * 
     * @param string $column 
     * @param int  $lowItem
     * @param int $highItem
     * 
     * @return \Manipualator\SQL\Select
     */ 
    public function between(string $column, int $lowItem, int $highItem)
    {
        $this->sql[] = " WHERE {$column} BETWEEN {$lowItem} AND {$highItem}";
        return $this;
    }

    /**
     * This is equivalent of NOT SQL statement
     * 
     * Can be used with IN SQL statement
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function not()
    {
        $this->sql[] = " NOT";
        return $this;
    }

    /**
     * This is equivalent of IN SQL statement
     * 
     * @param string $condition 
     * 
     * @return \Manipualtor\SQL\Select
     */ 
    public function in(string $condition)
    {
        $this->sql[] = " IN ('{$condition}')";
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