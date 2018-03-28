<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	header('Content-Type: text/html; charset=UTF-8');
	?>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet">
</head>
<body>

<?php  

$daysOfWeeks = [

	1 => 'Dom',
	2 => 'Seg',
	3 => 'Ter',
	4 => 'Qua',
	5 => 'Qui',
	6 => 'Sex',
	7 => 'Sab'
];

setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );

$month 				= empty($_GET['mes']) ? date('m') : $_GET['mes'];
$currentMonth 		= strtotime($month . "/01/" . date('Y'));
$currentMonthName 	= strtotime(($month+1) . "/01/" . date('Y'));
$daysOfMonth 		= cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
$firstDayWeek 		= date('w', $currentMonth);
$currentDay 		= date('d', strtotime($daysOfMonth));


echo '<div class="container">';
echo '<div class="row d-flex align-items-center justify-content-end">';

echo '<table class="col-12">';
echo '<h1>' . strftime('%B', $currentMonthName) . ' de ' . date('Y') . '</h1>';
	echo '<tr>';

		for ($i=1; $i <= 7; $i++) { 
			echo '<td>' . $daysOfWeeks{$i} . '</td>';
			if ($i % 7 == 0 ) {
				echo '</tr><tr>';
			}
		}

		for ($i = 0; $i < $firstDayWeek ; $i++) { 
			echo "<td></td>";
		} 

		for ($i=1; $i <= $daysOfMonth; $i++) { 

			if ($i == $currentDay) {
				echo '<td style="background-color: #a5a5a599"; color: #fff>' . $i . '</td>';
			} else {
				echo '<td>'. $i . '</td>';
			}


			if (($i + $firstDayWeek) % 7 == 0 ) {
				echo '</tr><tr>';
			}


		}

	echo '</tr>';

echo '</table>';
echo '<div class="arrows">';
echo '<a href="?mes='. ($month-1) .'"><i class="fa fa-angle-left"></i></a>';
echo '<a href="?mes='. ($month+1) .'"><i class="fa fa-angle-right"></i></a>';
echo '</div>';
echo '</div>';
echo '</div>';

?>


<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>