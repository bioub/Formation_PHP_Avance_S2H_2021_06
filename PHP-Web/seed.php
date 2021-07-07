<?php
require_once __DIR__ . '/vendor/autoload.php';

$DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
$DB_NAME = getenv('DB_NAME') ?: 'address_book';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';

$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=UTF8";
$pdo = null;

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec('TRUNCATE contact');

    // SYNTAXE HEREDOC (permet de changer le délimiteur d'un chaine de char)
    $sql = <<<SQL
INSERT INTO contact (prenom, nom)
VALUES(:prenom, :nom)
SQL;

    // Requete préparée ou paramétrée (protection contre les injections SQL)
    $stmt = $pdo->prepare($sql);

    $faker = Faker\Factory::create('fr_FR');

    $pdo->beginTransaction();

    for ($i = 0; $i < 10; $i++) {
        $stmt->bindValue('prenom', $faker->firstName, PDO::PARAM_STR);
        $stmt->bindValue('nom', $faker->lastName, PDO::PARAM_STR);
        $stmt->execute();
    }

    $pdo->commit();
}
catch (Exception $exception) {
    $pdo->rollBack();
}