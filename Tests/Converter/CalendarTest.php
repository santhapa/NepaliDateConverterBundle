<?php

namespace SanThapa\NepaliDateConverterBundle\Tests\Converter;

use SanThapa\NepaliDateConverterBundle\Converter\Calendar;

class CalendarTest extends \PHPUnit_Framework_TestCase
{
    public function testNepaliToEnglish()
    {
        $converter = new Calendar();
        $result = $converter->nepaliToEnglish(2071, 9, 17);

        $this->assertEquals('2015-01-01', $result);
    }

    public function testEnglishToNepali()
    {
        $converter = new Calendar();
        $result = $converter->englishToNepali(2015, 1, 1);

        $this->assertEquals('2071-09-17', $result);
    }

    public function testNepaliToEnglish_noformat()
    {
        $converter = new Calendar();
        $result = $converter->nepaliToEnglish_noformat(2071, 9, 17);


        $this->assertTrue(is_array($result));
        $this->assertArrayHasKey('year', $result);
        $this->assertArrayHasKey('num_month', $result);
        $this->assertArrayHasKey('alpha_month', $result);
        $this->assertArrayHasKey('day', $result);
        $this->assertArrayHasKey('num_weekDay', $result);
        $this->assertArrayHasKey('alpha_weekDay', $result);

       	$expectedResult = array('year' =>2015, 'num_month' =>'01', 'day' =>'01', 'alpha_weekDay' =>'Thursday', 'alpha_month' =>'January', 'num_weekDay' =>5);
        $this->assertSame($expectedResult, $result);        
    }

    public function testEnglishToNepali_noformat()
    {
        $converter = new Calendar();
        $result = $converter->englishToNepali_noformat(2015, 1, 1);

        $this->assertTrue(is_array($result));
        $this->assertArrayHasKey('year', $result);
        $this->assertArrayHasKey('num_month', $result);
        $this->assertArrayHasKey('alpha_month', $result);
        $this->assertArrayHasKey('day', $result);
        $this->assertArrayHasKey('num_weekDay', $result);
        $this->assertArrayHasKey('alpha_weekDay', $result);
        
        $expectedResult = array('year' =>2071, 'num_month' =>'09', 'day' =>'17', 'alpha_weekDay' =>'Thursday', 'alpha_month' =>'Poush', 'num_weekDay' =>5);
        $this->assertSame($expectedResult, $result); 
    }

}