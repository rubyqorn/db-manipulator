<?php 

namespace Manipulator\SQL;

use Manipulator\SQL\Traits\Expressions;

class Delete extends Query
{
    use Expressions;

    /**
     * Table name where will be
     * happen manipualtions
     * 
     * @var string
     */ 
    protected $table;

    /**
     * Array with SQL statements
     * 
     * @var array 
     */ 
    protected $sql = [];

    public function __construct(string $table)
    {
        $this->table = $table;

        parent::__construct();

        $this->dropRecord();
    }

    /**
     * Set sql statement and return reference
     * at this class
     * 
     * @return \Manipulator\SQL\Delete
     */ 
    protected function dropRecord()
    {
        $this->sql[] = "DELETE FROM {$this->table}";
        return $this;
    }

}