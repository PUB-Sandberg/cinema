
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
    hello 
<?php endif ?>

<?php  if ($item->category() == 'jitsi') : ?>
    hello 
<?php endif ?>
  <h2><?= $item->title()->html() ?></h2>
  <h2><?= $item->url()->html() ?></h2>
  <h2><?= $item->date()->html() ?></h2>
<?php endforeach ?>
</div>


<div class="timeline">
<?php 
// using the `toStructure()` method, we create a structure collection
$items = $site->movies()->toStructure();
// we can then loop through the entries and render the individual fields
foreach ($items as $item): ?>
  <h2><?= $item->title()->html() ?></h2>
  <h2><?= $item->date()->html() ?></h2>
<?php endforeach ?>
</div>

</body>
</html>

