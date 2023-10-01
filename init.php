<?php

$jsonurl = plugins_url()."/pay-calculator/data/".$year.".json";

$data = file_get_contents($jsonurl);
$obj = json_decode($data, true);
$year_data = (array) $obj;

$q2Val = $year_data[$year]['q2'][$q2];
$q3Val = $year_data[$year]['q3'][$q3];

    /* Veteran */
    if ( $MarSt[$key] == 1 && $parents[$key] == 1 && $childs[$key] == 0 ) {
         /* spouse and 1 parent */
         $ex_q2_vet = $year_data[$year]['spou_onePar'][$q2];
         $ex_q3_vet = $year_data[$year]['spou_onePar'][$q3];
    } elseif ( $MarSt[$key] == 1 && $parents[$key] == 2 && $childs[$key] == 0 ) {
        /* spouse and 2 parent */
         $ex_q2_vet = $year_data[$year]['spou_twoPar'][$q2];
         $ex_q3_vet = $year_data[$year]['spou_twoPar'][$q3];        
    } elseif ( $MarSt[$key] == 1 && $parents[$key] == 0 && $childs[$key] > 0 ) {
        /* spouse and child */
         $ex_q2_vet = $year_data[$year]['spou_child'][$q2]; 
         $ex_q3_vet = $year_data[$year]['spou_child'][$q3];        
    } elseif ( $MarSt[$key] == 1 && $parents[$key] == 1 && $childs[$key] > 0 ) {
        /* spouse, 1 parent and child */
         $ex_q2_vet = $year_data[$year]['spou_child_onePar'][$q2]; 
         $ex_q3_vet = $year_data[$year]['spou_child_onePar'][$q3];        
    } elseif ( $MarSt[$key] == 1 && $parents[$key] == 2 && $childs[$key] > 0 ) {
        /* spouse, 2 parent and child */
         $ex_q2_vet = $year_data[$year]['spou_child_twoPar'][$q2]; 
         $ex_q3_vet = $year_data[$year]['spou_child_twoPar'][$q3];        
    } elseif ( $MarSt[$key] == 0 && $parents[$key] == 1 && $childs[$key] > 0 ) {
        /* 1 parent and child */
         $ex_q2_vet = $year_data[$year]['onePar_child'][$q2];
         $ex_q3_vet = $year_data[$year]['onePar_child'][$q3];        
    } elseif ( $MarSt[$key] == 0 && $parents[$key] == 2 && $childs[$key] > 0 ) {
        /* 1 parent and child */
         $ex_q2_vet = $year_data[$year]['twoPar_child'][$q2];
         $ex_q3_vet = $year_data[$year]['twoPar_child'][$q3];        
    } elseif ( $MarSt[$key] == 1 && $parents[$key] == 0 && $childs[$key] == 0 ) {
        /* spouse only */
         $ex_q2_vet = $year_data[$year]['MarData'][$q2];
         $ex_q3_vet = $year_data[$year]['MarData'][$q3];        
    } elseif ( $MarSt[$key] == 0 && $parents[$key] == 1 && $childs[$key] == 0 ) {
        /* parent one only */
         $ex_q2_vet = $year_data[$year]['parent_one'][$q2];
         $ex_q3_vet = $year_data[$year]['parent_one'][$q3];        
    } elseif ( $MarSt[$key] == 0 && $parents[$key] == 2 && $childs[$key] == 0 ) {
        /* parent one only */
         $ex_q2_vet = $year_data[$year]['parent_two'][$q2];
         $ex_q3_vet = $year_data[$year]['parent_two'][$q3];        
    } else {
        $ex_q2_vet = 0;
        $ex_q3_vet = 0;
    }

    // echo $ex_q3_vet."<br>";

    /* Child */
    if ( $childs[$key] > 1 ) {
        $ex_q2_ch = ($childs[$key] - 1) * $year_data[$year]['addChild'][$q2];
        $ex_q3_ch = ($childs[$key] - 1) * $year_data[$year]['addChild'][$q3];
    } else {
        $ex_q2_ch = 0;
        $ex_q3_ch = 0;
    }

    /* Elder Child */
    if ( $elderChilds[$key] > 0 ) {
        $ex_q2_elch = $elderChilds[$key] * $year_data[$year]['addElChild'][$q2];
        $ex_q3_elch = $elderChilds[$key] * $year_data[$year]['addElChild'][$q3];
    } else {
        $ex_q2_elch = 0;
        $ex_q3_elch = 0;
    }

    /* Spouse Aid */
    if ( $spouAid[$key] == 1 ) {
        $ex_q2_spAid = $year_data[$year]['spouseAid'][$q2];
        $ex_q3_spAid = $year_data[$year]['spouseAid'][$q3];
    } else {
        $ex_q2_spAid = 0;
        $ex_q3_spAid = 0;
    }

    /* Total Extra */
    $ex_q2_sum = ($ex_q2_vet + $ex_q2_ch + $ex_q2_elch + $ex_q2_spAid);
    $ex_q3_sum = ($ex_q3_vet + $ex_q3_ch + $ex_q3_elch + $ex_q3_spAid);

    // echo "<br>".$ex_q3_sum;

    /* Q2 and Q3 with extra Result */
    if ($ex_q2_sum > 0) {
       $ex_q2_res = $ex_q2_sum - $q2Val;
        $ex_q3_res = $ex_q3_sum - $q3Val;
    } else {
        $ex_q2_res = 0;
        $ex_q3_res = 0;
    }

    // echo "<br>".$q3Val;

