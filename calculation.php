<?php

$todayYear = date('Y');

/* loop input year */
foreach ($years as $key => $year) {

    $q2 = $Q2s[$key];
    $q3 = $Q3s[$key];

    $mon = $months[$key];
    $monVal = 0;

    for ($year; $year <= $todayYear; $year++) {

        require 'init.php';

        /* collect months value*/
        if ($year == $todayYear &&  $monVal == 0) {
            $monVal = calculate_month(date('m'),$mon,$year);
        } elseif ($year == $todayYear) {
            $monVal = calculate_month(date('m'),0,$year);
        } elseif ($year == $years[$key]) {
            $monVal = calculate_month(12,$mon,$year);
        } else {
            $monVal = calculate_month(12,0,$year);
        }   

        // echo $year."-".$monVal."<br>";

        /* store data in array */
        $ydata[$key][$year]= array(
            'tq2'=>$q2Val,
            'tq3'=>$q3Val,
            'texq2'=>$ex_q2_res,
            'texq3'=>$ex_q3_res,
            'tmon'=>$monVal,
        );
        
    }

}

$ftYr = $years[0];
$countYd = count($ydata)-1;

for ($ftYr; $ftYr <= $todayYear; $ftYr++) {

    // echo $ftYr."<br>";

    for ($nx=0; $nx <=$countYd; $nx++ ){

        if (array_key_exists($ftYr,$ydata[$nx])) {

            $fdata = $ydata[$nx][$ftYr];
            $nextM = $nx+1;
            $nM = 0;

            if ($nextM <= $countYd) {
                if (array_key_exists($ftYr,$ydata[$nextM])) {
                       $nextMon = $ydata[$nextM][$ftYr];
                       $nM = $nextMon['tmon'];
                }
            }

            // echo $fdata['tq3']."+".$fdata['texq3']."x".$fdata['tmon']."-".$nM."-".$nextM;

            $totalComp += (($fdata['tq3'] + $fdata['texq3'])*($fdata['tmon']-$nM)); 
            $compRec += (($fdata['tq2'] + $fdata['texq2'])*($fdata['tmon']-$nM)); 

            // echo "<br><br>";
        }
        
    }
}

$comDue = $compRec - $totalComp;


/* Calculate the month number */
function calculate_month($calMon,$month,$year) {
    $todayMonth = $calMon;
    $todayYear = $year;
    $totalMonth = (($todayYear - $year) * 12) + ($todayMonth - $month);
    return $totalMonth;
}

