<!doctype html>
<html lang="en">
<?php
  include ($data['tplPath'] . '/head.tpl.php');
?>
<body>
  <?php
  include ($data['tplPath'] . '/header.tpl.php');
  ?>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav">
        <?php
        include ($data['tplPath'] . '/column_left.tpl.php');
        ?>
      </div>

      <div class="col-sm-9">
        <?php
        include ($data['tplPath'] . '/content.tpl.php');
        ?>
      </div>
    </div>
  </div>



  <?php
  include ($data['tplPath'] . '/footer.tpl.php');
  ?>
</body>
</html>
