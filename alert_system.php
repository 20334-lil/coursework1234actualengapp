<?php
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Real-time Notifications System</title>
     <link rel=”stylesheet” href=”style.css”>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br /><br />
<div class="container">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="#">Notification System (Ensuring that projects are carried out to the highest standard) </a>
</div>
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<span class="label label-pill label-danger count" style="border-radius:10px;"></span>
<span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
</a>
<ul class="dropdown-menu"></ul>
</li>
</ul>
</div>
</nav>
<br />
<form method="post" id="comment_form">
<div class="form-group">
<label>Enter Subject</label>
<input type="text" name="subject" id="subject" class="form-control">
</div>
<div class="form-group">
<label>Enter Comment</label>
<textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
</div>
<div class="form-group">
<input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
</div>
</form>
</div>
</body>
</html>
<script>
$(document).ready(function() {
// Function to load notifications
function load_unseen_notification(view = '') {
$.ajax({
url: "fetch_alert.php",
method: "POST",
data: { view: view },
dataType: "json",
success: function(data) {
$('.dropdown-menu').html(data.notification);
if(data.unseen_notification > 0) {
$('.count').html(data.unseen_notification);
}
}
});
}

load_unseen_notification(); // Initial call to load notifications

// Submit form using AJAX
$('#comment_form').on('submit', function(event) {
event.preventDefault();
if($('#subject').val() != '' && $('#comment').val() != '') {
var form_data = $(this).serialize();
$.ajax({
url: "insert_alert.php",
method: "POST",
data: form_data,
success: function(data) {
$('#comment_form')[0].reset();
load_unseen_notification();
}
});
} else {
alert("Both Fields are Required");
}
});

// Mark notifications as seen on dropdown click
$(document).on('click', '.dropdown-toggle', function() {
$('.count').html('');
load_unseen_notification('yes');
});

// Set interval to refresh notifications
setInterval(function() {
load_unseen_notification();
}, 5000);
});
</script>

