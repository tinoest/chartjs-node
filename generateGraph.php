<?php

$arr  = [ 'data' => [ [ 'Set 1' => [ 'one' => 1, 'two' => 2, 'three' => 3 ] ], "labels" => [ 'label 1', 'label 2', 'label 3' ], 'title' => 'This is a title' ]];

$arr  = [ 
	'type' => 'line', 
	'stacked' => [ "x" => false, "y" => false ],
	'labels' => [ '2017', '2018', '2019' ], 
	'data' =>  [
			[ 'label' => 'Birds', 'data' => [60, 40, 200], 'backgroundColor' => "rgba(255, 99, 132, 0.5)", 'borderColor' => "rgba(255, 99, 132, 0.5)"],
			[ 'label' => 'Whales', 'data' => [70, 90, 100], 'backgroundColor' => "rgba(0, 99, 132, 0.5)", 'borderColor' => "rgba(0, 99, 132, 0.5)"],
			[ 'label' => 'Lions', 'data' => [300, 200, 50], 'backgroundColor' => "rgba(255, 99, 0, 0.5)", 'borderColor' => "rgba(255, 99, 0, 0.5)"],
		],
	'title' => 'Wildlife Population' 
];

$json = json_encode($arr);

$cmd = 'curl http://127.0.0.1:8080 -H "Authorization: Basic YWRtaW46c3VwZXJzZWNyZXQ=" -H "Content-Type: application/json" -d \''.$json.'\'';

$img = shell_exec($cmd);
$img = str_replace('data:image/png;base64,', '', $img);

file_put_contents('image-line.png', base64_decode($img));

$arr  = [
	'type' => 'bar', 
	'stacked' => [ "x" => false, "y" => false ],
	//'stacked' => [ "x" => true, "y" => true ],
	'labels' => [ '2017', '2018', '2019' ], 
	'data' =>  [
		[ 'label' => 'Birds', 'data' => [60, 40, 200], 'backgroundColor' => "rgba(255, 99, 132, 0.5)", 'borderColor' => "rgba(255, 99, 132, 0.5)" ],
		[ 'label' => 'Animals', 'data' => [30, 10, 20], 'backgroundColor' => [ "rgba(0, 99, 132, 0.5)", "rgba(50, 99, 132, 0.5)", "rgba(100, 99, 132, 0.5)"], 'borderColor' => [ "rgba(0, 99, 132, 0.5)", "rgba(100, 99, 132, 0.5)", "rgba(50, 99, 132, 0.5)"] ],
	],
	'title' => 'Wildlife Population' 
];

$json = json_encode($arr);

$cmd = 'curl http://127.0.0.1:8080 -H "Authorization: Basic YWRtaW46c3VwZXJzZWNyZXQ=" -H "Content-Type: application/json" -d \''.$json.'\'';
$img = shell_exec($cmd);
$img = str_replace('data:image/png;base64,', '', $img);

file_put_contents('image-bar.png', base64_decode($img));


