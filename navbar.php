<!DOCTYPE HTML>

<html lang="en">
    
    <head>

<title>Engineering Applications</title>

<link rel="stylesheet" href="style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="home.php">
Engineering Applications
</a>

<button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav me-auto">

<li class="nav-item">
<a class="nav-link" href="home.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="organisation.php">Organisation</a>
</li>

<li class="nav-item">
<a class="nav-link" href="engineering-functionality.php">
Engineering
</a>
</li>

<li class="nav-item">
<a class="nav-link" href="well-being.php">
Well-being
</a>
</li>

</ul>

<ul class="navbar-nav">

<li class="nav-item dropdown">

<a class="nav-link dropdown-toggle"

href="#"

role="button"

data-bs-toggle="dropdown">

<i class="bi bi-bell-fill"></i>

<span class="badge bg-danger rounded-pill count"></span>

</a>

<ul class="dropdown-menu dropdown-menu-end">

</ul>

</li>

<li class="nav-item">

<a class="nav-link" href="logout.php">

Log out

</a>

</li>

</ul>

</div>

</div>

</nav>
    <div class="container mt-4">





</div>
    <div class="container">

 

    </div>

</div>
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

    </body>


