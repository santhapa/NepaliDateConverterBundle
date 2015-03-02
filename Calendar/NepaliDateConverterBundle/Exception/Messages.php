<?php

namespace Calendar\NepaliDateConverterBundle\Exception;

/*
*Exception Messages
*/
class Messages{

	//Messages for English Exception
	const E_UNSUPPORTED_ENG = "Unsupported year range! Supported only between 1944-2022.";
    const E_BAD_DAY_VALUE_ENG="Error! Day value can be between 1-31 only.";

    //Messages for Nepali Exception
    const E_UNSUPPORTED_NEP = "Unsupported year range! Supported only between 2000-2089.";
    const E_BAD_DAY_VALUE_NEP="Error! Day value can be between 1-32 only.";

    const E_BAD_MONTH_VALUE="Error! Month value can be between 1-12 only.";
    const E_OUT_OF_RANGE = "%s, %s, %s is out within Nepali Date Range.";

}