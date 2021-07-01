<?php


namespace Openska\Writer;


class DevNullWriter implements WriterInterface
{
    public function writeLine(string $msg): void
    {

    }
}