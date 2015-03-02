<?php

namespace Calendar\NepaliDateConverterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Calendar\NepaliDateConverterBundle\Converter\Calendar;

class CalendarController extends Controller
{
	public function testAction()
	{
		$converter = new Calendar();

		// Get English to Nepali converted date
		print_r($converter->englishToNepali(2015,1,1));

		// Get Nepali to English converted date
		print_r($converter->nepaliToEnglish(2071,9,17));
		exit;
	}
}
