<?php

namespace Calendar\NepaliDateConverterBundle\Converter\Date;

interface DateInterface{

	public function isValidRange();
	public function convert();
}