<?php
require_once 'db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM comments WHERE comment_status=0 ORDER BY RAND() LIMIT 1");

if ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="alert">';
    echo htmlspecialchars($row['comment_subject']);
    echo null;
    echo htmlspecialchars($row['comment_text']);
    echo '</div>';
}
?>
