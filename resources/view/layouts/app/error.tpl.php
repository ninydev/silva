<?php
if (isset ($data['error'])) {
  echo '<div  class="alert alert-danger" role="alert">' . PHP_EOL;
  echo $data['error'];
  echo '</div>' . PHP_EOL;
}
