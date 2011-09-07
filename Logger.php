<?php
class Logger {
  private static $logFile = './app.log';
  private static $prefix;

  private static function addEntry($lvl, $msg) {
    if(self::$prefix) {
      $msg = self::$prefix . $msg;
    }

    $handle = fopen(self::$logFile, 'a');
    fwrite($handle, sprintf("%s [%s] %s\n", date("r"), $lvl, $msg));
    fclose($handle);
  }

  public static function setFile($f) {
    self::$logFile = $f;
  }

  public static function setPrefix($prefix) {
    if($prefix && (!is_string($prefix) || empty($prefix))) {
      $prefix = null;
    }
    else if(!is_string($prefix)) {
      throw new Exception('Invalid prefix type: must be a string or null.');
    }

    self::$prefix = $prefix;
  }

  public static function error($msg) {
    self::addEntry('ERROR', $msg);
  }

  public static function warn($msg) {
    self::addEntry('LOG', $msg);
  }

  public static function info($msg) {
    self::addEntry('INFO', $msg);
  }

  public static function debug($msg) {
    self::addEntry('DEBUG', $msg);
  }
}
