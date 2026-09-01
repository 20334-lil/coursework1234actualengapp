<?php
include("db_connect.php");

$output = '';
$query = "SELECT * FROM comments WHERE comment_status = 0 ORDER BY comment_id DESC LIMIT 5";
$result = mysqli_query($conn, $query);

$count_query = "SELECT COUNT(*) AS count FROM comments WHERE comment_status = 0";
$count_result = mysqli_query($conn, $count_query);
$row = mysqli_fetch_assoc($count_result);
$unseen_notification = $row['count'];

if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_array($result)) {
$output .= '
<li>
<a href="#">
<strong>' . $row["comment_subject"] . '</strong><br />
<small>' . $row["comment_text"] . '</small>
</a>
</li>
<li class="divider"></li>
';
}
} else {
$output .= '<li>No Notification Found</li>';
}

$data = array(
'notification' => $output,
'unseen_notification' => $unseen_notification
);
echo json_encode($data);
?>
