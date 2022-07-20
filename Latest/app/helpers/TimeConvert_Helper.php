<?php

// Time Zone
date_default_timezone_set('Europe/London');

function convertTimeToReadableFormat($time) {
    $time_ago = strtotime($time);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    
    $seconds = $time_difference;
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);
    
    if($seconds <= 60) {
        return 'Just now...';
    } elseif($minutes <= 60) {
        if($minutes == 1) {
            return 'One minute ago...';
        } else {
            return $minutes . ' minutes ago...';
        }
    } elseif($hours <= 24) {
        if($hours == 1) {
            return 'One hour ago...';
        } else {
            return $hours . ' hours ago...';
        }
    } elseif($days <= 7) {
        if($days == 1) {
            return 'Yesterday...';
        } else {
            return $days . ' days ago...';
        }
    } elseif($weeks <= 4.3) {
        if($weeks == 1) {
            return 'Last week';
        } else {
            return $weeks . ' weeks ago...';
        }
    } elseif($months <= 12) {
        if($months == 1) {
            return 'Last month...';
        } else {
            return $months . ' minutes ago...';
        }
    } else {
        if($years == 1) {
            return 'Last year...';
        } else {
            return $years . ' years ago...';
        }
    }
}

?>