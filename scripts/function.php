<?php
function setupMyTwigEnvironment()
{
    $loader = new Twig_Loader_Filesystem('./templates'); //set to load from the ./templates directory
    $twig = new Twig_Environment($loader, array('debug' => true, 'auto_reload' => true, 'strict_variables' => true)); 
    return $twig;  
}
?>