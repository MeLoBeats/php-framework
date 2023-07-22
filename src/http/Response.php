<?php

namespace Src\Http;

use Src\Blade;

class Response
{
    private $headers = [];
    private $body = null;
    private $statusCode = 200;

    public function __construct(
        $body = null,
        $statusCode = 200,
        $headers = []
    ) {
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        if ($body) {
            return $this->send();
        }
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendBody();
    }

    public function sendHeaders()
    {
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
        return $this;
    }

    public function sendBody()
    {
        echo $this->body;
        return $this;
    }

    public function blade($filename, $data = [])
    {
        $blade = Blade::render();
        return $blade->run($filename, $data);
    }

    public function setStatus($statusCode)
    {
        $this->statusCode = $statusCode;
        http_response_code($this->statusCode);
        return $this;
    }
}
