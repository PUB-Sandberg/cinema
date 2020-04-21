
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="<?= $site->description() ?>">
  <meta name="keywords" content="<?= $site->keywords() ?>">
  <title>
    <?= $page->title() ?> | <?= $site->title() ?>
  </title>
  <link rel="stylesheet" type="text/css" href="assets/css/app.css">
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>

<!---<iframe class="chat" src="http://saschakrischock.com/atomchat/"></iframe>--->

<div id="particles-js"></div>


<img class="curtain-left active" src="assets/images/curtain1.jpg">
<img class="curtain-right active" src="assets/images/curtain1.jpg">

<div class="stage">
<?php 
// using the `toStructure()` method, we create a structure collection
$items = $site->movies()->toStructure();
// we can then loop through the entries and render the individual fields
foreach ($items as $item): ?>

<?php 
$today = date("Y-m-d");
$choosendate = $item->published()->toDate('Y-m-d');
?>

<?php  if ($item->category() == 'vimeo' && $today == $choosendate ) : ?>
  <div class='iframe-wrapper'>
    <iframe src='https://player.vimeo.com/video/<?php echo $item->url() ?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  </div>
<?php endif ?>

<?php  if ($item->category() == 'youtube' && $today == $choosendate ) : ?>
  <div  class="iframe-wrapper">
  <?php $item->url()->html() ?>
<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $item->url() ?>&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<?php endif ?>

<?php  if ($item->category() == 'jitsi' && $today == $choosendate ) : ?>
  <div  class="iframe-wrapper">
  <iframe allow="camera; microphone" src="<?php echo $item->url() ?>"></iframe>
</div>
<?php endif ?>
<?php endforeach ?>
</div>




<div class="timeline">
  <h1>pub cinema program</h1>

<?php 

// using the `toStructure()` method, we create a structure collection
$items = $site->movies()->toStructure();
// we can then loop through the entries and render the individual fields
foreach ($items as $item): ?>

<?php 
$today = date("Y-m-d");
$choosendate = $item->published()->toDate('Y-m-d');
echo $today;
echo $choosendate;
$index = 1+ $items->indexOf($item); // add offset if required
$next = $index + 1;
?>

<div class="timeline__item">
  <div class="timeline__item__headline"><span class="counter"><?php echo $index ?></span> <?= $item->title()->html() ?></div>
  <div class="timeline__item__date">

    <span class="day"><?= $item->published()->toDate('d.m.Y') ?></span>
    <span class="today"><?php  if ($today == $choosendate) { ?>
today
<?php } ?></span>

 

    <span class="time">
    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><title>moon</title><path d="M34.9,60a27.86,27.86,0,0,0,15-4.35,2.7,2.7,0,0,0-.63-4.84A20,20,0,0,1,39.91,44l-.54,0a13.78,13.78,0,0,1-9.66-3.93,2.09,2.09,0,0,1-.31-2.71,2,2,0,0,1,3-.23,9.82,9.82,0,0,0,1.77,1.4,1.53,1.53,0,0,0,2.29-1.68v0a1.14,1.14,0,0,1,.69-1.32l.94-.38a2.27,2.27,0,0,0,1-3.49l-.1-.13a8.1,8.1,0,0,1-.86-8.6A19.72,19.72,0,0,1,40,20a20.15,20.15,0,0,1,3-3.2,19.83,19.83,0,0,1,6.27-3.58,2.7,2.7,0,0,0,.63-4.83A27.86,27.86,0,0,0,34.9,4q-1.15,0-2.32.09c-.89.07-1.76.2-2.62.35q-1,.18-2,.43-.74.19-1.46.42t-1.62.57a28.11,28.11,0,0,0-9,5.58c-.63.58-1.23,1.2-1.81,1.84A28.37,28.37,0,0,0,11.32,17h0c-.27.43-.54.86-.79,1.3h0A27.61,27.61,0,0,0,7,30.17,28,28,0,0,0,34.9,60Zm-6-30a2,2,0,1,1,2-2A2,2,0,0,1,28.9,30Zm4-21.92C33.56,8,34.23,8,34.9,8a24,24,0,0,1,6.8,1,1.87,1.87,0,0,1,.57,3.32,23.88,23.88,0,0,0-2.59,2.06,6.2,6.2,0,0,1-1.86,1.2,5.87,5.87,0,0,1-2.23.43c-5.43,0-10.79-.27-15.88-.72a.83.83,0,0,1-.47-1.45A23.77,23.77,0,0,1,32.9,8.08Z"/><path d="M56.52,26.43a1.94,1.94,0,0,0-1.07-3.31L54.51,23a1.94,1.94,0,0,1-1.46-1.06l-.42-.84a1.94,1.94,0,0,0-3.48,0l-.42.84A1.94,1.94,0,0,1,47.28,23l-.93.14a1.94,1.94,0,0,0-1.07,3.31l.67.66a1.94,1.94,0,0,1,.56,1.72l-.16.93a1.94,1.94,0,0,0,2.81,2l.83-.44a1.94,1.94,0,0,1,1.8,0l.83.44a1.94,1.94,0,0,0,2.81-2l-.16-.93a1.94,1.94,0,0,1,.56-1.72Z"/></svg>
    <?= $item->time()->toDate('g:i a'); ?><span>
  </div>
  </div>
<?php endforeach ?>
</div>

<div class="popcorn">Popcorn</div>
<div class="curtain">Curtain</div>

<?= js([
  'assets/js/jquery.js',
  'assets/js/particles.min.js',
  'assets/js/app.js',
]) ?>
</body>
</html>

