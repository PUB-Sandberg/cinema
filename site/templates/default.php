
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="<?= $site->description() ?>">
  <meta name="keywords" content="<?= $site->keywords() ?>">
  <title>
    <?= $page->title() ?> | <?= $site->title() ?>
  </title>
  <link rel="stylesheet" type="text/css" href="assets/css/app.css">
</head>
<body>

<div class="stage">
<?php 
// using the `toStructure()` method, we create a structure collection
$items = $site->movies()->toStructure();
// we can then loop through the entries and render the individual fields
foreach ($items as $item): ?>

<?php  if ($item->category() == 'vimeo') : ?>
  <div class='embed-container'>
    <iframe src='https://player.vimeo.com/video/66140585' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  </div>
<?php endif ?>

<?php  if ($item->category() == 'youtube') : ?>
  <div  class="iframe-wrapper">
<iframe width="100%" height="100%" src="https://www.youtube.com/embed/5qap5aO4i9A?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<?php endif ?>

<?php  if ($item->category() == 'jitsi') : ?>
    jitsi
<?php endif ?>
  <h2><?= $item->title()->html() ?></h2>
  <h2><?= $item->url()->html() ?></h2>
  <h2><?= $item->published()->toDate('Y-m-d') ?></h2>
<?php endforeach ?>
</div>


<div class="timeline">

<?php 

// using the `toStructure()` method, we create a structure collection
$items = $site->movies()->toStructure();
// we can then loop through the entries and render the individual fields
foreach ($items as $item): ?>
<?php 
$today = date("Y-m-d");
$choosendate = $item->published()->toDate('Y-m-d');
?>


<div class="timeline__item">
  <div class="timeline__item__headline"><?= $item->title()->html() ?></div>
  <div class="timeline__item__date">
    <span><?= $item->published()->toDate('d.m.Y') ?></span>

    <?php  if ($today == $choosendate) { ?>
today
<?php } ?>

    <span><?= $item->time()->toDate('g:i a'); ?><span>
  </div>
  </div>
<?php endforeach ?>
</div>

<?= js([
  'assets/js/jquery.js',
  'assets/js/app.js',
]) ?>
</body>
</html>

