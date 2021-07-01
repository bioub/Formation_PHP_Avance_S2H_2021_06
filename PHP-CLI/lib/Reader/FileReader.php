<?php


namespace Openska\Reader;


class FileReader implements \ArrayAccess
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


    public function offsetExists($offset)
    {
        return isset($this->readLines()[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->readLines()[$offset];
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}