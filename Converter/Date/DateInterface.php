<?php

namespace SanThapa\NepaliDateConverterBundle\Converter\Date;

interface DateInterface{

	public function isValidRange();
	public function convert();
}