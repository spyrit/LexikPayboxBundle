<?php

namespace Lexik\Bundle\PayboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package Lexik\Bundle\PayboxBundle\Controller
 *
 * @author Lexik <dev@lexik.fr>
 * @author Olivier Maisonneuve <o.maisonneuve@lexik.fr>
 */
class DefaultController extends AbstractController
{
    /**
     * Instant Payment Notification action.
     * Here, presentation is anecdotal, the requesting server only looks at the http status.
     *
     * @return Response
     */
    public function ipn(\Lexik\Bundle\PayboxBundle\Paybox\System\Base\Response $payboxResponse)
    {
        $result = $payboxResponse->verifySignature();

        return new Response($result ? 'OK' : 'KO');
    }
}
