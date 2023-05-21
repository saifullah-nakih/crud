<?php
global $conn;
include('inc/header.php');


date_default_timezone_set('Asia/Tokyo'); // Replace 'Your_Timezone' with your desired timezone, e.g., 'America/New_York'

$currentTime = date('H:i');

$hour = (int)date('H', strtotime($currentTime));

if ($hour >= 18 and $hour < 5) {
    $greeting = 'Good evening';
} elseif ($hour >= 12) {
    $greeting = 'Good afternoon';
} else {
    $greeting = 'Good morning';
}
echo  $greeting ." , " . $_SESSION['username'] ;
