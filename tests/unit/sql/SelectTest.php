<?php

namespace Tests\Unit\SQL;

use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    protected $table = 'test';

    public function test_that_the_all_method_return_array_of_records()
    {
        $select = new \Manipulator\SQL\Select($this->table);

        return $this->assertIsArray($select->all());
    }

    public function test_that_the_rows_method_return_string_with_rows_values()
    {
        $select = new \Manipulator\SQL\Select($this->table);

        return $this->assertIsString($select->rows('title, content'));

    }
}