<?php

class UrlService
{
    public function getUrlParameters(): array
    {
        $parameters = trim($_SERVER['PATH_INFO'], '/');
        return explode('/', $parameters);
    }
}