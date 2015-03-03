<?php

namespace Calendar\NepaliDateConverterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Calendar\NepaliDateConverterBundle\Converter\Calendar;

class ConverterController extends Controller
{
	public function testAction()
	{
		$data[] = null;
		$converter = $this->container->get('date_converter');

		if(isset($_POST['nep-convert']))
		{
			$data['filters'] = $_POST;

			$year = $_POST['nep-year'];
			$month = $_POST['nep-month'];
			$day = $_POST['nep-day'];

			$date = $converter->nepaliToEnglish_noformat($year, $month, $day);

			$data['nep_result'] = $date['alpha_month'].' '.$date['day'].', '.$date['year'].' ('.$date['alpha_weekDay'].')';
		}
		if(isset($_POST['eng-convert']))
		{
			$data['filters'] = $_POST;

			$year = $_POST['eng-year'];
			$month = $_POST['eng-month'];
			$day = $_POST['eng-day'];

			$date = $converter->englishToNepali_noformat($year, $month, $day); 

			$data['eng_result'] = $date['alpha_month'].' '.$date['day'].', '.$date['year'].' ('.$date['alpha_weekDay'].')';
		}
		$data['neptest'] = $converter->nepaliToEnglish(2071, 9, 17,'mmmm-dd-yyyy');
		$data['engtest'] = $converter->englishToNepali(2015, 1, 1, 'mmmm-dd-yyyy');

		return $this->render('CalendarNepaliDateConverterBundle::Converter/test.html.twig', $data);
	}
}
