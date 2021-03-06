<?php

namespace InboxAgency\Session;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SessionMiddleware
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function __invoke(
        Request $request,
        Response $response,
        $next
    ) {
        $request = $request->withAttribute(
            SessionInterface::SESSION_ATTRIBUTE,
            $this->session
        );

        return $next($request, $response);
    }
}
