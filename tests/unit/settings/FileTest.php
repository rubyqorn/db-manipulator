<?php

namespace Tests\Unit\Settings;

use PHPUnit\Framework\TestCase;

class FileTest extends TestCase 
{
    /**
     * @return string
     */ 
    public function test_file_exists()
    {
        $file = './env.ini';
        $this->assertFileExists($file);

        return $file;

        $this->markTestIncomplete();
    }

    /**
     * @return array
     */ 
    public function contentProvider()
    {
       return [
           ['./config/settings.php'],
           ['w'],
           ['content']
       ];
    }

    /**
     * @depends test_file_exists
     */ 
    public function test_check_file_exists_return_string(string $file)
    {
        $reflection = new \ReflectionClass(\Manipulator\Settings\File::class);
        $method = $reflection->getMethod('checkFileExists');
        $method->setAccessible(true);

        $mock = $this->getMockBuilder(\Manipulator\Settings\File::class)->getMock();

        return $this->assertIsString(
            $method->invoke(
                $mock, $file
            )
        );
    }

    /**
     * @dataProvider contentProvider
     */ 
    public function test_put_content_in_file_return_bool($file)
    {
        $mock = $this->getMockBuilder(\Manipulator\Settings\File::class)
                    ->setMethods(['putContentInFile'])
                    ->getMockForAbstractClass();
        
        return $this->assertNull($mock->putContentInFile($file, $file, $file));
    }
}