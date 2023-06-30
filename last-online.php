<?php
$query = "SELECT last_online FROM iwnaras";
$result = $db->querySingle($query);

if ($result) {
    $last_online = $result;
}
$db->close();

function formatTimeUnits($value, $singular, $plural)
{
    return ($value === 1) ? $value . ' ' . $singular : $value . ' ' . $plural;
}

function getTimeDifferenceText($interval)
{
    $timeUnits = [
        ['years' => 'έτος', 'plural' => 'έτη'],
        ['months' => 'μήνας', 'plural' => 'μήνες'],
        ['weeks' => 'εβδομάδα', 'plural' => 'εβδομάδες'],
        ['days' => 'ημέρα', 'plural' => 'ημέρες'],
        ['hours' => 'ώρα', 'plural' => 'ώρες'],
    ];

    $text = '';

    foreach ($timeUnits as $timeUnit) {
        $unitValue = $interval->{$timeUnit[0]};
        if ($unitValue > 0) {
            $text .= formatTimeUnits($unitValue, $timeUnit[1], $timeUnit['plural']) . ', ';
        }
    }

    $text = rtrim($text, ', ');

    return $text;
}

$now = new DateTime();
$lastOnline = new DateTime($last_online);

$interval = $now->diff($lastOnline);

if ($interval->h < 1) {
    echo 'μόλις τώρα';
} else {
    echo getTimeDifferenceText($interval) . ' πριν';
}
?>
