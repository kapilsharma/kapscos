<?php
/**
 * Entry point of KAPsCos.
 */

require '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$name = $request->query->get('name', 'Guest');
$response = new Response('Hello ' . $name);
$response->send();