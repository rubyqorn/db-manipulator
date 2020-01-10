<?php 

namespace Tests\Unit\Parser;

use PHPUnit\Framework\TestCase;

class SQLParserTest extends TestCase 
{
    /**
     * @return array
     */ 
    public function convert_to_string_data_provider()
    {
        return [
            [
                ['one', 'two'], ' '
            ]
        ];
    }

    /**
     * @return array
     */ 
    public function convert_to_array_data_provider()
    {
        return [
            [
                'one,two,three', ','
            ]
        ];
    }

    /**
     * @dataProvider convert_to_string_data_provider
     */ 
    public function test_that_the_convert_to_string_return_string(array $arr, string $delimiter)
    {
        $parser = new \Manipulator\Parser\SQLParser();

        return $this->assertIsString($parser->convertToString($arr, $delimiter));       
    }

    /**
     * @dataProvider convert_to_array_data_provider
     */ 
    public function test_that_the_convert_to_array_return_array(string $str, string $delimiter)
    {
        $parser = new \Manipulator\Parser\SQLParser();

        return $this->assertIsArray($parser->convertToArray($str, $delimiter));
    }
}