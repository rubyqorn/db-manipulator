<?php

namespace Manipulator\SQL\Traits;

trait Expressions
{
    /**
     * The equivalent of WHERE SQL condition
     * 
     * If you want to select record with the 
     * condition you can combine it with another
     * sql's
     * 
     * @param string $condition 
     * 
     * @return \Manipulator\Connector
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
     * @return \Manipulator\Connector
     */ 
    public function orderBy(string $column, string $sortOrder)
    {
        $this->sql[] = " ORDER BY {$column} {$sortOrder}";
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
     * @return \Manipulator\Connector
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
     * @return \Manipulator\Connector
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
     * @return \Manipulator\Connector
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
     * @return \Manipulator\Connector
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
     * @return \Manipulator\Connector
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
     * @return \Manipulator\Connector
     */ 
    public function in(string $condition)
    {
        $this->sql[] = " IN ('{$condition}')";
        return $this;
    }

     /**
     * Equivalent of GROUP BY SQL statement
     * 
     * @param string $column 
     * 
     * @return \Manipulator\Connector
     */ 
    public function groupBy(string $column)
    {
        $this->sql[] = " GROUP BY {$column}";
        return $this;
    }

    /**
     * Equivalent of HAVING SQL statement
     * 
     * @param string $condition 
     * 
     * @return \Manipulator\Connector
     */ 
    public function having(string $condition)
    {
        $this->sql[] = " HAVING {$condition}";
        return $this;
    }
}