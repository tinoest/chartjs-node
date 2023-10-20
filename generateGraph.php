<?php
$title		= 'Wildlife Population';
$options	= ['plugins' => [ 'title' => [ 'display' => true, 'text' => $title ] ], 'responsive' => true, 'scales' => [ 'x' => [ 'stacked' => false ], 'y' => [ 'stacked' => false ] ] ];
$options	= ['plugins' => [ 'legend' => [ 'position' => 'bottom' ], 'title' => [ 'display' => true, 'text' => $title ] ], 'responsive' => true, 'scales' => [ 'x' => [ 'stacked' => false ], 'y' => [ 'stacked' => false ] ] ];

$arr  = [ 
	'width' => 800,
	'height' => 400,
	'type' => 'line', 
	'data' =>  [
		'labels' => [ '2017', '2018', '2019' ], 
		'datasets' => [
			[ 'label' => 'Birds', 'data' => [60, 40, 200], 'backgroundColor' => "rgba(255, 99, 132, 0.5)", 'borderColor' => "rgba(255, 99, 132, 0.5)"],
			[ 'label' => 'Whales', 'data' => [70, 90, 100], 'backgroundColor' => "rgba(0, 99, 132, 0.5)", 'borderColor' => "rgba(0, 99, 132, 0.5)"],
			[ 'label' => 'Lions', 'data' => [300, 200, 50], 'backgroundColor' => "rgba(255, 99, 0, 0.5)", 'borderColor' => "rgba(255, 99, 0, 0.5)"],
		],
	],
	'options' => $options
];

$json = json_encode($arr);

$cmd = 'curl http://127.0.0.1:8080 -H "Authorization: Basic YWRtaW46c3VwZXJzZWNyZXQ=" -H "Content-Type: application/json" -d \''.$json.'\'';

$img = shell_exec($cmd);
file_put_contents('image-line.png', $img);

$options	= ['plugins' => [ 'title' => [ 'display' => true, 'text' => $title ] ], 'responsive' => true, 'scales' => [ 'x' => [ 'stacked' => false ], 'y' => [ 'stacked' => false ] ] ];

$arr  = [
	'width' => 600,
	'height' => 400,
	'type' => 'bar', 
	'data' =>  [
		'labels' => [ '2017', '2018', '2019' ], 
		'datasets' => [
			[ 'label' => 'Birds', 'data' => [60, 40, 200], 'backgroundColor' => "rgba(255, 99, 132, 0.5)", 'borderColor' => "rgba(255, 99, 132, 0.5)" ],
			[ 'label' => 'Animals', 'data' => [30, 10, 20], 'backgroundColor' => [ "rgba(0, 99, 132, 0.5)", "rgba(50, 99, 132, 0.5)", "rgba(100, 0, 132, 0.5)"], 'borderColor' => [ "rgba(0, 99, 132, 0.5)", "rgba(100, 99, 132, 0.5)", "rgba(50, 255, 132, 0.5)"] ],
			[ 'label' => 'Fish', 'data' => [300, 200, 50], 'backgroundColor' => "rgba(255, 99, 0, 0.5)", 'borderColor' => "rgba(255, 99, 0, 0.5)"],
		],
	],
	'options' => $options
];

$json = json_encode($arr);

$cmd = 'curl http://127.0.0.1:8080 -H "Authorization: Basic YWRtaW46c3VwZXJzZWNyZXQ=" -H "Content-Type: application/json" -d \''.$json.'\'';
$img = shell_exec($cmd);

file_put_contents('image-bar.png', $img);

$options	= ['plugins' => [ 'title' => [ 'display' => true, 'text' => $title ] ], 'responsive' => true, 'legend' => [ 'position' => 'top' ]];

$arr  = [
	'width' => 600,
	'height' => 400,
	'type' => 'pie', 
	'data' =>  [
		'labels' => [ '2017', '2018', '2019' ], 
		'datasets' => [
			[ 'label' => 'Pie Data', 'data' => [30, 10, 20], 'backgroundColor' => [ "rgba(0, 99, 132, 0.5)", "rgba(50, 99, 132, 0.5)", "rgba(100, 0, 132, 0.5)"], 'borderColor' => [ "rgba(0, 99, 132, 0.5)", "rgba(100, 99, 132, 0.5)", "rgba(50, 255, 132, 0.5)"] ],
		],
	],
	'options' => $options
];

$json = json_encode($arr);

$cmd = 'curl http://127.0.0.1:8080 -H "Authorization: Basic YWRtaW46c3VwZXJzZWNyZXQ=" -H "Content-Type: application/json" -d \''.$json.'\'';
$img = shell_exec($cmd);

file_put_contents('image-pie.png', $img);


