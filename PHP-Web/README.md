# TP PHP

## Autoloader

Créer un autoloader ou configurer l'autoloader de composer pour que les classes du répertoire `src` chargent automatiquement.

Le préfixe `Openska` devra correspondre au répertoire `src`

## Création d'un contrôleur

Créer le namespace `Controller` et la classe suivante :

```php
<?php

namespace Openska\Controller;

class AbstractController
{
    public function render($templatePath, $variables)
    {
        extract($variables);
        include $templatePath;
    }
}
```

Créer ensuite une classe `ContactController` avec 2 méthodes `list` et `details`, reprendre la "Logique Applicative"
(le code avant le HTML) dans les fichiers `contacts-list.php` et `contacts-details.php` et l'adapter si nécessaire (namespace)

Créer ensuite un répertoire `templates` avec le rendu des pages (mélange de PHP et d'HTML) et la fonction `xss`

Faire hériter `ContactController` de `AbstractController` et en fin de méthode `list` et `show` appeler la méthode `render` 
de cette façon :

```php
/** @var \Openska\Entity\Contact[] $contacts */
$contacts = $stmt->fetchAll();

$this->render(__DIR__ . '/../../templates/contacts-list.php', [
    'contacts' => $contacts,
]);
```

Créer un fichier pour tester le nouveau mode de fonctionnement de la page dans le répertoire public (il suffit d'instancier ContactController et d'appeler la méthode correspondante)

## Création d'un Router et d'un Front Controller

Dans le répertoire `src` ajouter un namespace `Router`, y créer 2 classes : `Application` et `Route`

Dans la classe `Route` créer 3 propriétés : `$path`, `$controller`, `$method`, générer les getters/setters et un constructeur sur les 3 propriétés

Créer ensuite une méthode `addRoute` et `run` dans la classe `Application`

Dans le répertoire `public` ajouter un fichier `index.php` :

```php
<?php

require_once __DIR__ . "/../vendor/autoload.php";

$app = new \Openska\Router\Application();
$app->addRoute(new \Openska\Router\Route('/contacts', \Openska\Controller\ContactController::class, 'list'));
$app->addRoute(new \Openska\Router\Route('/contacts/details', \Openska\Controller\ContactController::class, 'show'));
$app->run();
```

La méthode `addRoute` va simplement ajouter la route dans une liste de routes stockée en propriété de `Application`

Pour tester le router on utilisera des URLs au format : `/index.php/contacts`  

Pour récupérer `/contacts` dans `/index.php/contacts` on peut utiliser `$_SERVER["PATH_INFO"]`

La méthode `run` doit rechercher dans son tableau de route le `PATH_INFO` correspondant à l'URL saisie

Une fois trouvé il faudra appeler la méthode du controller d'un façon similaire à :

```php
$controller = $route->getController();
$method = $route->getMethod();
$instance = new $controller();
$instance->$method();
```
