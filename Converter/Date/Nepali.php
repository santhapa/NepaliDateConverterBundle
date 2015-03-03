<?php

namespace Calendar\NepaliDateConverterBundle\Converter\Date;

use Calendar\NepaliDateConverterBundle\Converter\Date\DateInterface;
use Calendar\NepaliDateConverterBundle\Converter\Date\Utility;

use Calendar\NepaliDateConverterBundle\Format\Day;
use Calendar\NepaliDateConverterBundle\Format\Month\English as EnglishFormat;

use Calendar\NepaliDateConverterBundle\Exception\Exception as CalendarException;
use Calendar\NepaliDateConverterBundle\Exception\Messages as CalendarMessages;

class Nepali implements DateInterface{

    private $year;

    private $month;

    private $day;

    private $format;

    public function __construct($y, $m, $d, $f='mm-dd-yyyy')
    {
        $this->year = $y;
        $this->month = $m;
        $this->day = $d;
        $this->format = $f;
    }

    public function isValidRange()
    {
        if ($this->year < 2000 || $this->year > 2089) {
            throw new CalendarException(CalendarMessages::E_UNSUPPORTED_NEP);
        }

        if ($this->month < 1 || $this->month > 12) {
            throw new CalendarException(CalendarMessages::E_BAD_MONTH_VALUE);
        }

        if ($this->day < 1 || $this->day > 32) {
            throw new CalendarException(CalendarMessages::E_BAD_DAY_VALUE_NEP);
            }

        return TRUE;
    }

    /*
    *Convert nepali date to english date
    */
    public function convert($formatOpt=true)
    {
        $year = $this->year;
        $month = $this->month;
        $day = $this->day;
        $bs = Utility::$nepaliDates;

        //Initial english dates
        $init_engYear = 1943;   $init_engMonth = 4; $init_engDay = 14-1;
        //Equivalent nepali dates
        $init_nepYear = 2000;   $init_nepMonth = 1; $init_nepDay = 1;

        //Initialization of value
        $totalDays_eng = 0;     $totalDays_nep = 0;
        $k = 0;

        //Count total number of days interms of year
        for($i=0; $i<($year-$init_nepYear); $i++){ 
            for($j=1; $j<=12; $j++){
                $totalDays_nep += $bs[$k][$j];
            }
            $k++;
        }

        //Count total number of days in-terms of month           
        for($j=1; $j<$month; $j++){
            $totalDays_nep += $bs[$k][$j];
        }

        //total number days for given nepali date
        $totalDays_nep += $day;   


        //now calculating of equivalent english date...
        $general_month = array(0,31,28,31,30,31,30,31,31,30,31,30,31);
        $leap_month = array(0,31,29,31,30,31,30,31,31,30,31,30,31);
        $weekDay=4-1; 
        
        $a=0;   $numDay = 0;


        $totalDays_eng = $init_engDay;
        $m = $init_engMonth;
        $y = $init_engYear;

        while($totalDays_nep != 0){
            if(Utility::isLeapYear($y))
            {
                $a = $leap_month[$m];
            }
            else
            {
                $a = $general_month[$m];
            }
            $totalDays_eng++;
            $weekDay++;
            if($totalDays_eng > $a){
                $m++;
                $totalDays_eng = 1;
                if($m > 12){
                    $y++;
                    $m = 1;
                }   
            }
            if($weekDay > 7)
                $weekDay = 1;
            $totalDays_nep--; 
        }
        $numDay = $weekDay;


        //storing converted value in array
        $newDate = array();

        $newDate["year"] = $y;                   
        $newDate["num_month"] = sprintf("%02d", $m);
        $newDate["day"] = sprintf("%02d", $totalDays_eng);     
        $newDate["alpha_weekDay"] = Day::getWeekDay($weekDay);                  
        $newDate["alpha_month"] = EnglishFormat::getMonth($m);           
        $newDate["num_weekDay"] = $numDay;   

        if($formatOpt == false) return $newDate;
            
        $newDate['format'] = $this->format;     
        
        $cDate = Utility::formatResult($newDate);
        
        return $cDate;
    }

}