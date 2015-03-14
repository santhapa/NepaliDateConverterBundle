<?php

namespace SanThapa\NepaliDateConverterBundle\Converter\Date;

use SanThapa\NepaliDateConverterBundle\Converter\Date\DateInterface;
use SanThapa\NepaliDateConverterBundle\Converter\Date\Utility;

use SanThapa\NepaliDateConverterBundle\Format\Day;
use SanThapa\NepaliDateConverterBundle\Format\Month\Nepali as NepaliFormat;

use SanThapa\NepaliDateConverterBundle\Exception\Exception as CalendarException;
use SanThapa\NepaliDateConverterBundle\Exception\Messages as CalendarMessages;

class English implements DateInterface{

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
        if ($this->year < 1944 || $this->year > 2033) {
            throw new CalendarException(CalendarMessages::E_UNSUPPORTED_ENG);
        }

        if ($this->month < 1 || $this->month > 12) {
            throw new CalendarException(CalendarMessages::E_BAD_MONTH_VALUE);
        }

        if ($this->day < 1 || $this->day > 31) {
            throw new CalendarException(CalendarMessages::E_BAD_DAY_VALUE_ENG);
        }

        return TRUE;
    }

    /*
    *Convert english date to nepali date
    */
    public function convert($formatOpt=true)
    {
        $year = $this->year;
        $month = $this->month;
        $day = $this->day;        
        $bs = Utility::$nepaliDates;

        //English month data.
        $general_month = array(31,28,31,30,31,30,31,31,30,31,30,31);
        $leap_month = array(31,29,31,30,31,30,31,31,30,31,30,31);

        //Initial values for eng and nep dates
        $init_engYear = 1944;
        $init_nepYear = 2000; $init_nepMonth = 9; $init_nepDay = 17-1;
        
        //Initialization of values
        $totalDays_eng=0;   

        //Count total no of days in terms of year
        for($i=0; $i<($year-$init_engYear); $i++){ 
            //total days for month calculation(english)
            if(Utility::isLeapYear($init_engYear+$i)==1)
                for($j=0; $j<12; $j++)
                    $totalDays_eng += $leap_month[$j];
            else
                for($j=0; $j<12; $j++)
                    $totalDays_eng += $general_month[$j];
        }
        
        //Count total no. of days in-terms of month                    
        for($i=0; $i<($month-1); $i++){        
            if(Utility::isLeapYear($year)==1)
                $totalDays_eng += $leap_month[$i];
            else
                $totalDays_eng += $normal_month[$i];
        }
        
        // count total no. of days in-terms of date
        $totalDays_eng += $day;
        
        //Initialization of values
        $weekDay=7-1;   $numDay=0;
        $a=0;         
        $i = 0; $j = $init_nepMonth;  

        $y = $init_nepYear;
        $m = $init_nepMonth;        
        $totalDays_nep = $init_nepDay;
        
        //Caluating equivalent nepali date
        while($totalDays_eng != 0) {
            $a = $bs[$i][$j];
            $totalDays_nep++;
            $weekDay++;
            if($totalDays_nep > $a){
                $m++;
                $totalDays_nep=1;
                $j++;
            }
            if($weekDay > 7)
                $weekDay = 1;
            if($m > 12){
                $y++;
                $m = 1;
            }
            if($j > 12){
                $j = 1; $i++;
            }
            $totalDays_eng--;
        }
        
        $numDay=$weekDay;

        //storing converted value in array
        $newDate = array();

        $newDate["year"] = $y;                   
        $newDate["num_month"] = sprintf("%02d", $m);
        $newDate["day"] = sprintf("%02d", $totalDays_nep);     
        $newDate["alpha_weekDay"] = Day::getWeekDay($weekDay);                  
        $newDate["alpha_month"] = NepaliFormat::getMonth($m);           
        $newDate["num_weekDay"] = $numDay; 

        if($formatOpt == false) return $newDate;

        $newDate['format'] = $this->format;

        $cDate = Utility::formatResult($newDate);
        
        return $cDate;
    }

}