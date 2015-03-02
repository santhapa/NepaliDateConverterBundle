<?php

namespace Calendar\NepaliDateConverterBundle\Converter\Date;

interface DateInterface{

	public static function isValidRange($y, $m, $d);
	public function convert();
}