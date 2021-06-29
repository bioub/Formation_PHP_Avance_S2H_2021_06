<?php


namespace Openska\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ConvertXMLToJSON extends Command
{
    protected static $defaultName = 'xml-to-json';

    protected function configure()
    {
        $this->setDescription('Convert XML file to JSON')
             ->addArgument('src', InputArgument::REQUIRED, 'The XML file path to convert')
             ->addOption('indent', 'i', InputOption::VALUE_NONE, 'Will indent JSON file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       $srcXmlFile = $input->getArgument('src');

       $contacts = simplexml_load_file(__DIR__ . '/../../' . $srcXmlFile);

       // echo "Id : " . $contacts->contact[0]['id'] . "\n";
       // echo "Prénom : " . $contacts->contact[0]->prenom . "\n";

       if ($input->getOption('indent')) {
           echo json_encode($contacts, JSON_PRETTY_PRINT) . "\n";
       } else {
           echo json_encode($contacts) . "\n";
       }

       return Command::SUCCESS;
    }
}