<?php

namespace Tests\Unit\SQL;

use Tests\Unit\DatabaseConnector;

class QueryTest extends DatabaseConnector
{  
    public function sql_data_provider()
    {
        return [
            [
                ['SELECT * FROM users ', 'WHERE id = 1']
            ]
        ];
    }

    public function test_query_return_pdo_statement_object()
    {
        $query = new \Manipulator\SQL\Query();

        $query->query('SELECT * FROM test');
        $reflection = new \ReflectionClass(\Manipulator\SQL\Query::class);
        $property = $reflection->getProperty('statement');
        $property->setAccessible(true);

        $this->assertInstanceOf(
            \PDOStatement::class, $property->getValue($query)
        );

        return $property->getValue($query);
    }    

    /**
     * @depends test_query_return_pdo_statement_object
     */ 
    public function test_fetch_all_return_array(\PDOStatement $statement)
    {
        return $this->assertIsArray($statement->fetchAll());
    }

    public function test_fetch_column_return_string()
    {
        $query = new \Manipulator\SQL\Query();
        $query->query('SELECT title FROM test');
        
        $reflection = new \ReflectionClass(\Manipulator\SQL\Query::class);
        $property = $reflection->getProperty('statement');
        $property->setAccessible(true);

        return $this->assertIsString(
            $query->fetchColumn(
                $property->getValue($query)
            )
        );
    }

    /**
     * @dataProvider sql_data_provider
     */ 
    public function test_convert_sql_to_string_return_string_property(array $sql)
    {
        $query = new \Manipulator\SQL\Query();

        return $this->assertIsString($query->convertSQLToString($sql, ' '));
    }

}