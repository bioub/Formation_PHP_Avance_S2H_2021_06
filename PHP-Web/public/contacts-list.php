<?php
require_once __DIR__ . '/../src/Entity/Contact.php';

$DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
$DB_NAME = getenv('DB_NAME') ?: 'address_book';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';

$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=UTF8";
$pdo = new PDO($dsn, $DB_USER, $DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query('SELECT id, prenom, nom FROM contact');
$stmt->setFetchMode(PDO::FETCH_CLASS, \Openska\Entity\Contact::class);

/** @var \Openska\Entity\Contact[] $contacts */
$contacts = $stmt->fetchAll();

function xss($value) {
    return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- Exemple Emmet : ul>li*3>lorem2 -->
    <!--
    Faille XSS : Cross Site Scripting
    Donnée exterieure qui fini dans la réponse (par exemple avec echo)
    Pour l'éviter il faut soit :
    - supprimer toutes ou partie des balises (strip_tags)
    - convertir les symboles < > & " en entitées HTML $lt; $gt; $amp; $quot; (html_entities, html_special_chars)
    Depuis PHP 5.2 extension Filter
    -->
    <ul>
        <?php foreach ($contacts as $c) : ?>
        <li>
            <a href="contact-details.php?id=<?=filter_var($c->getId(), FILTER_SANITIZE_NUMBER_INT)?>">
                <?=xss($c->getPrenom())?> <?=xss($c->getNom())?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>