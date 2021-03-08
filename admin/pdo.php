<?php
define("PDO_HOST", "localhost");
define("PDO_DBBASE", "project1");
define("PDO_USER", "root");
define("PDO_PW", "");

// define("PDO_HOST", "localhost");
// define("PDO_DBBASE", "nwdr0168_dev_aurelien");
// define("PDO_USER", "nwdr0168_aurelien");
// define("PDO_PW", "5goIkP27RL1d");

// define("PDO_HOST", "localhost");
// define("PDO_DBBASE", "nwdr0168_dev_aurelien");
// define("PDO_USER", "nwdr0168_aurelien");
// define("PDO_PW", "5goIkP27RL1d");

try {
  $start = new PDO(
    "mysql:host=" . PDO_HOST . ";" . "dbname=" . 
    PDO_DBBASE,
    PDO_USER,
    PDO_PW,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  );
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}
