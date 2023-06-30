<?php
$query = "SELECT * FROM announcements";
$results = $db->query($query);

if ($results) {
    while ($row = $results->fetchArray(SQLITE3_ASSOC)) { ?>
        <div class="announcement">
            <div class="announcement-title"><?= $row['title'] ?></div>
            <div class="announcement-timestamp"><?= $row['timestamp'] ?></div>
            <div class="announcement-body"><?= $row['body'] ?></div>
        </div> <?php
    }
}

$db->close();
?>
