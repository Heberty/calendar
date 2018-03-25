<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	header('Content-Type: text/html; charset=ISO-8859-1');
	?>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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

$daysOfMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

$day = date('w', strtotime(date('m') . "/01/" . date('Y')));

setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );

echo '<div class="container">';
echo '<div class="row d-flex align-items-center">';
echo '<h1 class="col-6">' . ucwords(strftime('%B')) . ' de ' . date('Y') . '</h1>';

echo '<table class="col-6">';
	echo '<tr>';

		for ($i=1; $i <= 7; $i++) { 
			echo '<td>' . $daysOfWeeks{$i} . '</td>';
			if ($i % 7 == 0 ) {
				echo '</tr><tr>';
			}
		}

		for ($i = 0; $i < $day ; $i++) { 
			echo "<td></td>";
		} 

		for ($i=1; $i <= $daysOfMonth; $i++) { 

			if ($i == date('d')) {
				echo '<td style="background-color: #a5a5a599"; color: #fff>' . $i . '</td>';
			} else {
				echo '<td>'. $i . '</td>';
			}


			if (($i + $day) % 7 == 0 ) {
				echo '</tr><tr>';
			}


		}

	echo '</tr>';

echo '</table>';
echo '</div>';
echo '</div>';


?>


<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>