<?php

use Carbon\Carbon;

function formatToYmdhi($datetime)
{
	return Carbon::parse($datetime)->toDateString().'T'.Carbon::parse($datetime)->toTimeString();
}