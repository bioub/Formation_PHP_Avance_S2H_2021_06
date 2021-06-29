<?php


namespace Openska\Writer;


class FileWriter implements WriterInterface
{
    /** @var resource */
    protected $fic;

    public function __construct($filePath, $mode = "a")
    {
        $this->fic = fopen($filePath, $mode);
    }

    public function writeLine(string $msg): void
    {
        fwrite($this->fic, "$msg\n");
    }

    public function __destruct()
    {
        fclose($this->fic);
    }
}