<?php


namespace Sans\Domains\Identity;


use Sans\Infrastructure\ApiResponder;
use Slim\Http\Request;
use Slim\Http\Response;

class CreateIdentityAction
{
    /**
     * @var HandlesCreateIdentity
     */
    private HandlesCreateIdentity $handlesCreateIdentity;

    public function __construct(HandlesCreateIdentity $handlesCreateIdentity)
    {
        $this->handlesCreateIdentity = $handlesCreateIdentity;
    }

    public function __invoke(Request $request, Response $response)
    {
        $command = CreateIdentity::fromArray($request->getParsedBody());
        $result = $this->handlesCreateIdentity->handle($command);

        if ($result) {
            return ApiResponder::success($response, "Created");
        }
        return ApiResponder::error($response, "Failed");
    }
}