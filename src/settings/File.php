<?php 

namespace Manipulator\Settings;

use Manipulator\Exceptions\FileDoesntExists;

abstract class File
{
    /**
     * @var resource
     */ 
    protected $file;

    /**
     * Subclasses have to realize this method when
     * extends from this class
     * 
     * @param string $file
     * 
     * @return array
     */ 
    abstract public function getSettingsFromFile(string $file);

    /**
     * Check if the passed file is exists
     * 
     * @param string $file 
     * 
     * @return string
     */ 
    protected function checkFileExists(string $file)
    {
        if (file_exists($file)) {
            return $file;
        }

        throw new FileDoesntExists("File {$file} is not exists");
    }

    /**
     * File processing. Put passed content in passed file
     * 
     * @param string $file 
     * @param string $mode 
     * @param mixed $content
     * 
     * @return bool
     */ 
    public function putContentInFile($file, $mode, $content)
    {
        $this->file = fopen($file, $mode);
        fwrite($this->file, $content);
        return fclose($this->file);
    }

}