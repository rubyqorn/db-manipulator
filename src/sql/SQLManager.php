<?php 

namespace Manipulator\SQL;

class SQLManager 
{
    /**
     * Get an object of Select class
     * for selecting data from database
     * 
     * @return \Manipulator\SQL\Select
     */ 
    public function select()
    {
        return new Select($this->table);
    }

    /**
     * Insert object creating
     * 
     * @return \Manipulator\SQL\Insert
     */ 
    public function insert()
    {
        return new Insert($this->table);
    }
}