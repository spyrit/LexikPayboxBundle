<?php

namespace Lexik\Bundle\PayboxBundle\Tests\Transport;

use Lexik\Bundle\PayboxBundle\Paybox\RequestInterface;
use Lexik\Bundle\PayboxBundle\Transport\AbstractTransport;
use PHPUnit\Framework\TestCase;


/**
 * Test class for Abstract Transport
 *
 * @author Fabien Pomerol <fabien.pomerol@gmail.com>
 */
class AbstractTransportTest extends TestCase
{
    /**
     * @var AbstractTransport
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new MockTransport();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionSetEndpoint()
    {
        $this->object->setEndpoint(3243204);
    }

    public function testSetEndpoint()
    {
        $this->object->setEndpoint('http://www.hello.fr/hey.cgi');

        // This is how to test a private or protected attribute. Value expected,
        // Attribute name, Object
        $reflected_actions = (new \ReflectionObject($this->object))->getProperty('endpoint');
        $reflected_actions->setAccessible(true);
        $this->assertEquals('http://www.hello.fr/hey.cgi', $reflected_actions->getValue($this->object));    }

    public function testGetEndpoint()
    {
        $this->object->setEndpoint('http://www.hello.fr/hey.cgi');
        $this->assertTrue(is_string($this->object->getEndpoint()));
        $this->assertEquals('http://www.hello.fr/hey.cgi', $this->object->getEndpoint());
    }

    /**
     * @expectedException \RunTimeException
     */
    public function testCheckEndpoint()
    {
        $method = new \ReflectionMethod('Lexik\Bundle\PayboxBundle\Transport\AbstractTransport', 'checkEndpoint');
        $method->setAccessible(true);
        $method->invoke($this->object);
    }

}

class MockTransport extends AbstractTransport
{
    public function call(RequestInterface $request)
    {
        return;
    }
}
