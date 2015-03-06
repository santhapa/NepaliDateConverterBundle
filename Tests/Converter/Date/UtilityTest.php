<?php

namespace Calendar\NepaliDateConverterBundle\Tests\Converter\Date;

use Calendar\NepaliDateConverterBundle\Converter\Date\Utility;

class UtilityTest extends \PHPUnit_Framework_TestCase
{
    public function testIsLeapYear()
    {
        $true1 = Utility::isLeapYear(2016);
        $this->assertTrue($true1);

        $false1 = Utility::isLeapYear(2015);
        $this->assertFalse($false1);

        $false2 = Utility::isLeapYear(2014);
        $this->assertFalse($false2);

        $false3 = Utility::isLeapYear(2013);
        $this->assertFalse($false3);

        $true2 = Utility::isLeapYear(2012);
        $this->assertTrue($true2);
    }

}