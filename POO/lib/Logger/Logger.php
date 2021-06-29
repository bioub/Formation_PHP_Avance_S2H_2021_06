<?php


namespace Openska\Logger;

use Openska\Writer\WriterInterface;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    /** @var WriterInterface */
    protected $writer;

    public function __construct(WriterInterface $writer)
    {
        // NE PAS IMBRIQUER LES new de classes Services
        // $this->writer = new \Openska\Writer\FileWriter(__DIR__ . '/../../app.log');

        // A LA PLACE on va les injecter
        // => Injection de Dépendance
        $this->writer = $writer;
    }

    public function log($level, $message, array $context = array())
    {
        $this->writer->writeLine("[$level] $message");
    }
}

// Principe SOLID
// S: Single Responsability
// une classe doit faire une chose à la fois

// O: Open / Close
// une classe doit être ouverte à l'extension mais
// fermée à la modification

// L: Substitution de Liskov
// si héritage, on doit pouvoir remplacer une classe fille
// pas sa classe mère

// I: Seggregation des interfaces
// Des "grosses" interfaces devraient découpées en plus petites
// quitte à les regrouper dans une interface qui hérite des plus petites

// D: Dependency inversion principle
// il vaut dépendre des abstractions (interface), que des implémentations
// (classes qui implémentent une interface)