<?php
class Logger {
  private static $logFile = "./app.log";

  private static function addEntry($lvl, $msg) {
    $handle = fopen(self::$logFile, 'a');
    fwrite($handle, sprintf("%s [%s] %s\n", date("r"), $lvl, $msg));
    fclose($handle);
  }

  public static function setFile($f) {
    self::$logFile = $f;
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
