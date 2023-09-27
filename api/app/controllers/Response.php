<?php
// Create a custom Response class
class Response {
    private $statusCode;
    private $data;

    public function __construct() {
        $this->statusCode = 200; // Default status code
        $this->data = [];
    }

    public function withStatus($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function withJson($data, $statusCode = 200) {
        $this->data = $data;
        $this->statusCode = $statusCode;
        return $this;
    }

    public function send() {
        http_response_code($this->statusCode);
        echo json_encode($this->data);
    }

    // Add other methods as needed
}
?>