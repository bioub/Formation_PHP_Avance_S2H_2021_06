<?php


namespace Openska\Reader;


class FileReader
{
    /** @var resource */
    protected $fic;

    public function __construct($filePath)
    {
        $this->fic = fopen($filePath, 'r');
    }

    public function readLines()
    {
        $lines = [];

        $lineNumber = 1;

        while($lineContent = fgets($this->fic)) {
            $lines[] = $lineNumber++ . ' ' . $lineContent;
        }

        return $lines;
    }

    public function __destruct()
    {
        fclose($this->fic);
    }
}