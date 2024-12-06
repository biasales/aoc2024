<?php

$filename = 'numbers_day_one.txt';
$file_contents = file_get_contents($filename);

$diff = 0;
$lines = array_map('trim', explode("\n", $file_contents));
$right_side = [];
$left_side = [];

foreach ($lines as $line) {
	list($right, $left) = explode("   ", $line);
	$right_side[] = (int)$right;
	$left_side[] = (int)$left;
}

sort($right_side);
sort($left_side);

foreach ($right_side as $key => $value) {
	$diff += abs($value - $left_side[$key]);
}

print_r($diff);