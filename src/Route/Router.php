<?php

namespace App\Route;

class Router
{
    private $map = [];

    public function withRoute(string $path, string $result): Router
    {
        if (str_contains($path, '*')) {
            $path = str_replace('*', '.*', $path);
        }
        $path = preg_replace('#\{[a-z]+\}#', '([a-zA-Z0-9]+)', $path);
        $this->map[$path] = $result;
        return $this;
    }

    public function route(string $path): Path
    {
        if (array_key_exists($path, $this->map)) {
            return new Path($this->map[$path]);
        }
        $matches = [];
        foreach ($this->map as $key => $result) {
            preg_match("#$key#", $path, $matches);
            if (count($matches) > 0) {
                return new Path($this->map[$key]);
            }
        }

        throw new \InvalidArgumentException('The route provided does not match any known path');
    }
}

/**
 *interface Router {

fun withRoute(path: String, result: String) : Unit;

fun route(path: String) : String;

}

Usage:
Router.withRoute("/bar", "result")
Router.route("/bar") -> "result"
 */