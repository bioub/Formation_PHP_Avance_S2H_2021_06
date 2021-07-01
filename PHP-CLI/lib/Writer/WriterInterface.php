<?php


namespace Openska\Writer;


interface WriterInterface
{
    public function writeLine(string $msg): void;
}