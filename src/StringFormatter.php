<?php

  class StringFormatter
  {
    public function concat(String $before, String $after) {
      return $before . $after;
    }

    public function toCamelCase(String $before, String $after) {
      $before = strtolower($before);
      $after = ucfirst(strtolower($after));
      return concat($before, $after);
    }
  }

?>
