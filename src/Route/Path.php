<?php

namespace App\Route;

class Path
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var array
     */
    private $parameters;

    public function __construct(string $path, array $parameters = [])
    {
        $this->path = $path;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

}