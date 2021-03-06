<?php

namespace SanThapa\NepaliDateConverterBundle\Tests;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    private $container;

    protected function setUp()
    {
        $kernel = new \AppKernel('test', true);
        $kernel->boot();

        $this->container = $kernel->getContainer();
    }

    public function testServiceIsDefinedInContainer()
    {
        $service = $this->container->get('date_converter');

        $this->assertInstanceOf('SanThapa\NepaliDateConverterBundle\Converter\Calendar', $service);
    }
}