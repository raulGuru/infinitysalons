<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('convertToHoursMins'))
{
    function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);

        return sprintf($format, $hours, $minutes);
    }
}

if( !function_exists('hrsmins') )
{
    function hrsmins($time) {        
        $duration = '';
        $hours = floor($time / 60);
        $minutes = $time % 60;
        if($hours == 0)
            $duration = $minutes.'min';
        elseif($minutes == 0)
            $duration = $hours.'h';
        else
            $duration = $hours.'h '.$minutes.'min';     
        return $duration;
    }
}