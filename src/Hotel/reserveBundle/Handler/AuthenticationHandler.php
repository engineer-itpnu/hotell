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
            return new RedirectResponse($this->router->generate('a_main'));
        if ($this->security->isGranted('ROLE_HOTELDAR'))
            return new RedirectResponse($this->router->generate('h_main'));
        if ($this->security->isGranted('ROLE_AGENCY'))
            return new RedirectResponse($this->router->generate('g_main'));

        return new RedirectResponse($this->router->generate('login_page'));
    }
}
