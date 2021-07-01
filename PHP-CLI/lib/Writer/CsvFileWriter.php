<?php


namespace Openska\Writer;


final class CsvFileWriter extends FileWriter
{
    public function writeArrayLine(array $values)
    {
        $this->writeLine(implode(';', $values));
    }

    public function writeLine(string $msg): void
    {
        parent::writeLine(strtoupper($msg) . ';');
    }
}