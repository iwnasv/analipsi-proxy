<?php

// just log the client's IP, referer, and request time
$referer = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_SANITIZE_SPECIAL_CHARS);
$ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);
$analytics_db = './analytics.db';

// behavior similar to fail2ban
$timeframe = '-1 hour';
$max_connections = 3;

if ($referer && $ip) {
    $db = new SQLite3($analytics_db);
    $referer = $db->escapeString($referer);
    $ip = $db->escapeString($ip);
    $current_time = date('Y-m-d H:i:s');
    $query = "INSERT INTO analytics (referer, ip, timestamp) VALUES ('$referer', '$ip', '$current_time')";
    $db->exec($query);

    $one_hour_ago = date('Y-m-d H:i:s', strtotime($timeframe));
    $query = "SELECT COUNT(*) FROM analytics WHERE ip = '$ip' AND timestamp > '$one_hour_ago'";
    $times_connected = $db->querySingle($query);

    if ($times_connected > $max_connections) {
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: https://www.google.com');
        exit;
    }

    $db->close();
}

?>
