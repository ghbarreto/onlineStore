<?php
require_once 'vendor/autoload.php';
require_once 'scripts/function.php';

$twig = setupMyTwigEnvironment();

$name = "Gabriel";
$welcome = "Welcome!";

$template = $twig->load('about.twig.html');
echo $template->render(array("name" => $name,
"welcome" => $welcome,
));

?>