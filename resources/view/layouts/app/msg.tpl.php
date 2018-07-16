<?php
if (isset ($data['msg'])) {
  echo '<div class="alert alert-info" role="alert">' . PHP_EOL;
  echo $data['msg'];
  echo '</div>' . PHP_EOL;
}
