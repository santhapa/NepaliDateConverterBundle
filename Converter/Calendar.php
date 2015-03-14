<?php

namespace SanThapa\NepaliDateConverterBundle\Converter;

use SanThapa\NepaliDateConverterBundle\Converter\Date\English as EnglishConverter;
use SanThapa\NepaliDateConverterBundle\Converter\Date\Nepali as NepaliConverter;


/**
* Converts nepali to english date or vicevers based on given date
*/
class Calendar
{
	private $nf;
	private $ef;

	public function __construct($nf='yyyy-mm-dd', $ef='yyyy-mm-dd')
	{
		$this->nf = $nf;
		$this->ef = $ef;
	}

	public function nepaliToEnglish($y, $m, $d, $f=null)
	{
		$format = ($f)?$f:$this->ef;

		$converter = new NepaliConverter($y, $m, $d, $format);
		if ($converter->isValidRange() == false) {
			return false;
		}
		return $converter->convert();
	}

	public function englishToNepali($y, $m, $d, $f=null)
	{
		$format = ($f)?$f:$this->nf;

		$converter = new EnglishConverter($y, $m, $d, $format);
		if ($converter->isValidRange() == false) {
			return false;
		}
		return $converter->convert();
	}

	public function nepaliToEnglish_noformat($y, $m, $d)
	{
		$converter = new NepaliConverter($y, $m, $d);
		if ($converter->isValidRange() == false) {
			return false;
		}
		return $converter->convert($format=false);
	}

	public function englishToNepali_noformat($y, $m, $d)
	{
		$converter = new EnglishConverter($y, $m, $d);
		if ($converter->isValidRange() == false) {
			return false;
		}
		return $converter->convert($format=false);
	}

}
