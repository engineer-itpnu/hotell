<?php
namespace Hotel\reserveBundle\Handler;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthenticationHandler implements AuthenticationSuccessHandlerInterface
{
    protected $router;
    protected $security;

    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router = $router;
        $this->security = $security;
    }

    function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($this->security->isGranted('ROLE_ADMIN'))
        {
            $response = new RedirectResponse($this->router->generate('a_main'));
        }
        elseif ($this->security->isGranted('ROLE_HOTELDAR'))
        {
            $response = new RedirectResponse($this->router->generate(''));
        }
        elseif ($this->security->isGranted('ROLE_AGENCY'))
        {
            $response = new RedirectResponse($this->router->generate(''));
        }
        return $response;
    }
}
