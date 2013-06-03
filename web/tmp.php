<?php

function toAscii($str) {

    $clean = strtolower(trim($str, '-'));
    $clean = preg_replace(" /[^\p{Latin}0-9\/_|+ -]+/u", '', $clean);
    $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
    $clean = trim($clean, '-');

    return $clean;
}

echo ("A piñata is a paper container filled with candy.");
echo '<br>';
echo toAscii("A piñata is a paper container filled with candy.");

echo '<br>';
echo toAscii("Perché l'erba è verde?");

echo '<br>';
echo toAscii("ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöùúûüýÿ");

echo '<br>';
echo toAscii("Tänk efter nu – förr'n vi föser dig bort"); // Swedish

echo '<br>';
echo toAscii("Mess'd up --text-- just (to) stress /test/ ?our! `little` \\clean\\ url fun.ction!?-->");



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
