<?php

  class StringFormatter
  {
      public function concat(String $before, String $after)
      {
          return $before . $after;
      }

      public function toCamelCase(String $before, String $after)
      {
          $before = strtolower($before);
          $after = ucfirst(strtolower($after));
          return $this->concat($before, $after);
      }

      public function prefix(String $prefix, String $word, bool $toCamelCase)
      {
          if ($toCamelCase) {
              return $this->toCamelCase($prefix, $word);
          }
          return $this->concat($prefix, $word);
      }

      public public function suffix(String $suffix, String $word, bool $toCamelCase)
      {
        return $this->prefix($word, $suffix, $toCamelCase);
      }
  }
