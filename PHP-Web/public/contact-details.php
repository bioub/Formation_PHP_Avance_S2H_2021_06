<?php
require_once __DIR__ . '/../src/Entity/Contact.php';

$id = $_GET['id'];

$DB_HOST = getenv('DB_HOST') ?: '127.0.0.1';
$DB_NAME = getenv('DB_NAME') ?: 'address_book';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASS') ?: '';

$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=UTF8";
$pdo = new PDO($dsn, $DB_USER, $DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Requete préparée ou paramétrée (protection contre les injections SQL)
$stmt = $pdo->prepare("SELECT id, prenom, nom FROM contact WHERE id = :contact_id");
$stmt->bindValue('contact_id', $id, PDO::PARAM_INT);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_CLASS, \Openska\Entity\Contact::class);

/** @var \Openska\Entity\Contact $contact */
$contact = $stmt->fetch();

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
    <p>
        <?=xss($contact->getPrenom())?> <?=xss($contact->getNom())?>
    </p>
</body>
</html>