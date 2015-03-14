<?php

namespace SanThapa\NepaliDateConverterBundle\Converter\Date;

class DateFormat{

	const DD_MM_YYYY = 'dd-mm-yyyy' ; //02-01-2010
	const MM_DD_YYYY = 'mm-dd-yyyy' ; //Default format 01-02-2010
	const YYYY_MM_DD = 'yyyy-mm-dd'; // 2010-01-02


	const DD_MMM_YYYY = 'dd-mmm-yyyy' ; //02-JAN-2010
	const MMM_DD_YYYY = 'mmm-dd-yyyy' ; //JAN-02-2010

	const MMMM_DD_YYYY = 'mmmm-dd-yyyy'; //January 02, 2010
	const DD_MMMM_YYYY = 'dd-mmmm-yyyy'; //02 January, 2010

	const MMMM_DD_YYYY_W = 'mmmm-dd-yyyy-w'; //January 02, 2010 (Saturday)
	const DD_MMMM_YYYY_W = 'dd-mmmm-yyyy-w'; //02 January, 2010 (Saturday)
}