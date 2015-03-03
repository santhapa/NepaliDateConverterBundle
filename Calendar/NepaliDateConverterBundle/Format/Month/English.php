<?php

namespace Calendar\NepaliDateConverterBundle\Format\Month;

use Calendar\NepaliDateConverterBundle\Format\Month\MonthInterface;

class English implements MonthInterface{

	const JANUARY = 1;
    const FEBRUARY = 2;
    const MARCH = 3;
    const APRIL = 4;
    const MAY = 5;
    const JUNE = 6;
    const JULY = 7;
    const AUGUST = 8;
    const SEPTEMBER = 9;
    const OCTOBER = 10;
    const NOVEMBER = 11;
    const DECEMBER = 12;

    public static function getMonth($m)
    {
        $dateObj = \DateTime::createFromFormat('!m', $m);
        $monthName = $dateObj->format('F'); //F for full length month name and M for 3 digit Month name
        return $monthName;
    }

    

}