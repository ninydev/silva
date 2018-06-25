<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$data['head']['title']?></title>

<!-- CSS -->
<?php
for ($i = 0; $i < sizeof ($data['head']['css']); $i++){
?>
  <link rel="stylesheet" href="<?=$data['head']['css'][$i] ?>" />
<?php
}
?>

<!-- JS -->
<?php
for ($i = 0; $i < sizeof ($data['head']['js']); $i++){
?>
  <script src="<?=$data['head']['js'][$i] ?>"></script>
<?php
}
?>

<!-- Meta add -->
<?php
// переносим корень дерева
for ($i = 0; $i < sizeof ($data['head']['meta']); $i++){
?>
  <meta name="<?=$data['head']['meta'][$i]['name'] ?>" content="<?=$data['head']['meta'][$i]['val'] ?>" />
<?php
}
?>
</head>
