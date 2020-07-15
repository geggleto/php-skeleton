<?php


namespace Sans\Infrastructure;


use Slim\Http\Response;

class ApiResponder
{
    public static function success(Response $response, string $message, ?array $data = null): Response {
        return $response->withJson([
            'errors' => false,
            'message' => $message,
            'data' => $data
        ]);
    }
    public static function error(Response $response, string $message, ?array $data = null): Response {
        return $response->withJson([
            'errors' => true,
            'message' => $message,
            'data' => $data
        ])->withStatus(400);
    }
}