<?php

$filename = 'numbers_day_one.txt';
$file_contents = file_get_contents($filename);

$lines = array_map('trim', explode("\n", $file_contents));
$right_side = [];
$left_side = [];
$total_similarity = 0;
foreach ($lines as $line) {
	list($right, $left) = explode("   ", $line);
	$right_side[] = (int)$right;
	$left_side[] = (int)$left;
}

$left_side_count_values = array_count_values($left_side);

foreach ($right_side as $key => $value) {
	if (array_key_exists($value, $left_side_count_values)) {
		$total_similarity += ($value * $left_side_count_values[$value]);
	}
}

print_r($total_similarity);

