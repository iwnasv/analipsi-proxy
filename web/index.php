<?php
$pw = hash('sha256', filter_input(INPUT_GET, 'password'));
$secret = 'dd2fa408297d5b01412181852d5b526b1e45d015c57074a257057c23b2ab04bb'; //not the hash used in production...
$cookey = 'είναι λογοπαίγνιο, cookie + key χεχε';
$authed = ($pw == $secret);
if($authed) {
  $A = 'Καλωσήρθες,';
  $B = 'Ιωνάρα';
  setcookie('iwnaras',$cookey,strtotime('+1 month'),'/','analipsi.online',true,true);
} else {
  $A = 'Ανάληψη';
  $B = 'ονλάιν';
}
$analytics_db = '../analytics.db';
$db = new SQLite3($analytics_db); // the project's getting bigger, might want to consider a better structure before it's too late
include('../analytics.php');
include('../announcements.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="author" content="admin">
<meta name="robots" content="noindex nofollow">
<?php if ($_COOKIE['iwnaras'] == $cookey || $authed): ?>
<meta http-equiv="refresh" content="3" /><?php endif; ?>
<link rel="icon" type="img/png" sizes="32x32" href="data:image/png;base64,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">
<title>Ανάληψη ονλάιν</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=GFS+Didot&display=swap');
body {
  font-family: "GFS Didot";
  font-size: 200%;
  width: 10cm;
  border: 2px solid black;
  margin: auto;
  text-align: center;
}
body h1 {
  background-color: black;
  color: white;
  margin: 0;
}
h3 {
  margin-top: 0;
}
</style>
</head>
<body>
<h1><?= $A ?></h1>
<h3><?= $B ?></h3>
<img src="/index.png">
<p id="location">
<span class="inc" value="40">0</span><span>° </span>
<span class="inc" value="36">0</span><span>' </span>
<span class="inc" value="17.7">0</span><span>"N</span><br>
<span class="inc" value="22">0</span><span>° </span>
<span class="inc" value="57">0</span><span>' </span>
<span class="inc" value="10.1">0</span><span>"E</span>
<?php if($authed) : ?>
<p>Ορίστε το μπισκότο σας, καλά να περάσετε.</p>
<?php endif ?>
<script>
function animateInc(span) {
  let goal = span.getAttribute('value');
  if (goal > Number(span.innerHTML)) {
    setTimeout(() => {
	  if (goal - Number(span.innerHTML) < 1) {
	    span.innerHTML = goal;
	  }
	  else {
	    span.innerHTML = Number(span.innerHTML) + 1;
		let resetter = Math.floor(Math.random()*span.innerHTML);
		if (resetter == span.innerHTML/2) {
		  span.innerHTML = 0;
		}
	  }
	  animateInc(span, goal);
	}, 80);
  }
}
increaseThese = document.querySelectorAll('#location span.inc');
for (i = 0; i < increaseThese.length; i++) {
  animateInc(increaseThese[i]);
}
</script>
</body>
</html>
