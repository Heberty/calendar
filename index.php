<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	?>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet">
</head>
<body>

<?php  

ini_set('default_charset','UTF-8');

$daysOfWeeks = [

	1 => 'Dom',
	2 => 'Seg',
	3 => 'Ter',
	4 => 'Qua',
	5 => 'Qui',
	6 => 'Sex',
	7 => 'Sab'
];

// $months = [

// 	01 => 'Janeiro',
// 	02 => 'Fevereiro',
// 	03 => 'Março',
// 	04 => 'Abril',
// 	05 => 'Maio',
// 	06 => 'Junho',
// 	07 => 'Julho',
// 	08 => 'Agosto',
// 	09 => 'Setembro',
// 	10 => 'Outubro',
// 	11 => 'Novembro',
// 	12 => 'Dezembro'
// ];



$month = date('m');
$day = date('d');
$year = date('Y');
$currentMonth = isset($_GET['mes']) ? trim($_GET['mes']) : $month;
$firstDayWeek = date('w', strtotime($currentMonth . "/01/" . $year));
$daysOfMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $year);
$currentDay = date('d', strtotime($daysOfMonth));
echo $currentDay;
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
// $month = strftime('%B');
echo '<div class="container">';
echo '<div class="row d-flex align-items-center justify-content-end">';

echo '<table class="col-12">';
echo '<h1>' . strftime('%B') . ' de ' . $year . '</h1>';
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
echo '<a href="?mes='. ($currentMonth-1) .'"><i class="fa fa-angle-left"></i></a>';
echo '<a href="?mes='. ($currentMonth+1) .'""><i class="fa fa-angle-right"></i></a>';
echo '</div>';
echo '</div>';
echo '</div>';

?>


<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>