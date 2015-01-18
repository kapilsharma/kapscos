<?php
/**
 * Entry point of KAPsCos.
 */

require '../vendor/autoload.php';

use Kapscos\Application;
use Symfony\Component\HttpFoundation\Response;

$application = Application::getApplication();
$name = $application->getRequest()->query->get('name', 'Guest');

$response = new Response('Hello ' . $name);
$response->send();