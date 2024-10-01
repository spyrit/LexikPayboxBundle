<?php

namespace Lexik\Bundle\PayboxBundle\Tests\Paybox\System;

use Lexik\Bundle\PayboxBundle\Paybox\System\Base\ParameterResolver;
use PHPUnit\Framework\TestCase;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
/**
 * Paybox\System\ParameterResolver class tests.
 *
 * @author Olivier Maisonneuve <o.maisonneuve@lexik.fr>
 */
class ParameterResolverTest extends TestCase
{
    public function testResolveFirst()
    {
        $this->expectException('InvalidArgumentException');

        $resolver = new ParameterResolver(array());
        $resolver->resolve(array());
    }

    public function testResolveNoCurrency()
    {
        $this->expectException('InvalidArgumentException');

        $resolver = new ParameterResolver(array('953'));
        $resolver->resolve(array(
            'PBX_CMD'         => '',
            'PBX_DEVISE'      => '',
            'PBX_HASH'        => '',
            'PBX_HMAC'        => '',
            'PBX_IDENTIFIANT' => '',
            'PBX_PORTEUR'     => '',
            'PBX_RANG'        => '',
            'PBX_RETOUR'      => '',
            'PBX_SITE'        => '',
            'PBX_TIME'        => '',
            'PBX_TOTAL'       => '',
        ));
    }

    public function testResolveBadCurrency()
    {
        $this->expectException(InvalidOptionsException::class);

        $resolver = new ParameterResolver(array('953'));
        $resolver->resolve(array(
            'PBX_CMD'         => '',
            'PBX_DEVISE'      => '978',
            'PBX_HASH'        => '',
            'PBX_HMAC'        => '',
            'PBX_IDENTIFIANT' => '',
            'PBX_PORTEUR'     => '',
            'PBX_RANG'        => '',
            'PBX_RETOUR'      => '',
            'PBX_SITE'        => '',
            'PBX_TIME'        => '',
            'PBX_TOTAL'       => '',
        ));
    }

    public function testResolveUndefinedParameter()
    {
        $this->expectException('InvalidArgumentException');

        $resolver = new ParameterResolver(array());
        $resolver->resolve(array(
            'unknow'          => '',
            'PBX_CMD'         => '',
            'PBX_DEVISE'      => '',
            'PBX_HASH'        => '',
            'PBX_HMAC'        => '',
            'PBX_IDENTIFIANT' => '',
            'PBX_PORTEUR'     => '',
            'PBX_RANG'        => '',
            'PBX_RETOUR'      => '',
            'PBX_SITE'        => '',
            'PBX_TIME'        => '',
            'PBX_TOTAL'       => '',
        ));
    }
}
