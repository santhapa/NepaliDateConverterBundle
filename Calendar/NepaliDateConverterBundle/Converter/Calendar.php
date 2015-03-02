<?php

namespace Calendar\NepaliDateConverterBundle\Converter;

use Calendar\NepaliDateConverterBundle\Converter\Date\English as EnglishConverter;
use Calendar\NepaliDateConverterBundle\Converter\Date\Nepali as NepaliConverter;


/**
* Converts nepali to english date or vicevers based on given date
*/
class Calendar
{
	public function nepaliToEnglish($y, $m, $d)
	{
		$converter = new NepaliConverter($y, $m, $d);
		if (NepaliConverter::isValidRange($y, $m, $d) == false) {
			return false;
		}
		return $converter->convert();
	}

	public function englishToNepali($y, $m, $d)
	{
		$converter = new EnglishConverter($y, $m, $d);
		if (EnglishConverter::isValidRange($y, $m, $d) == false) {
			return false;
		}
		return $converter->convert();
	}
}
