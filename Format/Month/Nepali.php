<?php 

namespace SanThapa\NepaliDateConverterBundle\Format\Month;

use SanThapa\NepaliDateConverterBundle\Format\Month\MonthInterface;

class Nepali implements MonthInterface{

    const BAISHAKH = 1;
    const JESTHA = 2;
    const ASAR = 3;
    const SHRAWAN = 4;
    const BHADRA = 5;
    const ASOJ = 6;
    const KARTIK = 7;
    const MANGSIR = 8;
    const POUSH = 9;
    const MAGH = 10;
    const FALGUN = 11;
    const CHAITRA = 12;

    protected static $months = array(
        self::BAISHAKH => 'Baisakh', 
        self::JESTHA => 'Jestha',
        self::ASAR => 'Ashar', 
        self::SHRAWAN => 'Shrawan',
        self::BHADRA => 'Bhadra', 
        self::ASOJ => 'Ashoj',
        self::KARTIK => 'Kartik', 
        self::MANGSIR => 'Mangshir',
        self::POUSH => 'Poush', 
        self::MAGH => 'Magh',
        self::FALGUN => 'Falgun', 
        self::CHAITRA => 'Chaitra'
    );

    public static function getMonth($m)
    {
        return self::$months[$m];
    }

}