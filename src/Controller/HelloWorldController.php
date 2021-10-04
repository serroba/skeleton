<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController
{
    /**
     * @Route("/hello")
     */
    public function hi(): Response
    {
        return new Response('Hello World!');
    }
}