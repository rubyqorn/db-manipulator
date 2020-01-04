<?php 

namespace Manipulator\Settings;

use Manipulator\Exceptions\FileDoesntExists;

abstract class File
{
    protected $file;

    abstract public function getSettingsFromFile(string $file);

    protected function checkFileExists(string $file)
    {
        if (file_exists($file)) {
            return $file;
        }

        throw new FileDoesntExists("File {$file} is not exists");
    }

    public function putContentInFile($file, $mode, $content)
    {
        $this->file = fopen($file, $mode);
        fwrite($this->file, $content);
        return fclose($this->file);
    }

}