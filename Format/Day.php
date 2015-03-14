<?php

namespace SanThapa\NepaliDateConverterBundle\Format;

class Day{

	const SUNDAY = 1;
    const MONDAY = 2;
    const TUESDAY = 3;
    const WEDNESDAY= 4;
    const THURSDAY = 5;
    const FRIDAY = 6;
    const SATURDAY= 7;

    protected static $days = array(
        self::SUNDAY=>'Sunday',
        self::MONDAY=>'Monday',
        self::TUESDAY=>'Tuesday',
        self::WEDNESDAY=>'Wednesday', 
        self::THURSDAY=>'Thursday',
        self::FRIDAY=>'Friday',
        self::SATURDAY=>'Saturday'
    );

    public static function getWeekDay($d){
        return self::$days[$d];
    }

}