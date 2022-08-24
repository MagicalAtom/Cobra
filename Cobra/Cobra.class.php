<?php


/**
 *
 */
class Cobra
{

public $url = "";
public $data = "";
public $name = "";

  function __construct($url,$name)
  {
      if (filter_var($url, FILTER_VALIDATE_URL)) {
$this->url = $url;
$this->name = $name;
  } else {
      echo("$url is not a valid URL");
    }
  }


// get source site

public  function get(){
  $urll = $this->url;
  if (!$urll) {
    echo("please set a url ");
  }

$source = file_get_contents($this->url);
$this->data = $source;
file_put_contents("pure/" . $this->name . ".txt" , $this->data);
}


//get all div class in page

public function div(){
  $file = file_get_contents("pure/" . $this->name . ".txt");
  preg_match_all("#<div class=(.*)>(.*)</div>#",$this->data,$m);
  preg_match_all("#<div>(.*)</div>#",$this->data,$m2);
  ob_start();
  print_r($m);
  echo "\n";
  print_r($m2);
  file_put_contents("result/" . $this->name . "&" . date("H i s") . $this->name . ".txt" , ob_get_clean());

}


public function img(){
  $file = file_get_contents("pure/" . $this->name . ".txt");
  preg_match_all("#<img class=(.*)>#",$this->data,$m);
  preg_match_all("#<img (.*)>#",$this->data,$m2);
  ob_start();
  print_r($m);
  echo "\n";

  print_r($m2);
  file_put_contents("result/" . $this->name . "&" . date("H i s") . $this->name . ".txt" , ob_get_clean());

}

public function video(){
  $file = file_get_contents("pure/" . $this->name . ".txt");
  preg_match_all("#<video (.*)>#",$this->data,$m2);
  preg_match_all("#<source src=(.*) type=(.*)>#",$this->data,$m);
  ob_start();
  print_r($m);
  echo "\n";

  print_r($m2);
  file_put_contents("result/" . $this->name . "&" . date("H i s") . $this->name . ".txt" , ob_get_clean());

}
public function p(){
  $file = file_get_contents("pure/" . $this->name . ".txt");
  preg_match_all("#<p>(.*)</p>#",$this->data,$m);
  ob_start();
  print_r($m);
  file_put_contents("result/" . $this->name . "&" . date("H i s") . $this->name . ".txt" , ob_get_clean());

}
public function ulLi(){
  $file = file_get_contents("pure/" . $this->name . ".txt");
  preg_match_all("#<ul (.*)>(.*)</ul>#",$this->data,$m2);
  preg_match_all("#<ul>(.*)</ul>#",$this->data,$m);
  ob_start();
  print_r($m);
  echo "\n";

  print_r($m2);
  file_put_contents("result/" . $this->name . "&" . date("H i s") . $this->name . ".txt" , ob_get_clean());

}
public function span(){
  $file = file_get_contents("pure/" . $this->name . ".txt");
  preg_match_all("#<span>(.*)</span>#",$this->data,$m);
  ob_start();
  print_r($m);
  file_put_contents("result/" . $this->name . "&" . date("H i s") . $this->name . ".txt" , ob_get_clean());

}

public function clone(){
  echo $this->data;
}


public function audio(){
  $file = file_get_contents("pure/" . $this->name . ".txt");
  preg_match_all("#<audio (.*)>#",$this->data,$m2);
  preg_match_all("#<source src=(.*) type=(.*)>#",$this->data,$m);
  ob_start();
  print_r($m);
  echo "\n";
  print_r($m2);
  file_put_contents("result/" . $this->name . "&" . date("H i s") . $this->name . ".txt" , ob_get_clean());
}

public function clear(){
  $file = "result";


  $all = scandir($file);

  $all = array_splice($all,2);

  foreach($all as $file2){
      unlink($file . "/" . $file2);
  }
  $file2 = "pure";


  $all2 = scandir($file2);

  $all2 = array_splice($all2,2);

  foreach($all2 as $file3){
      unlink($file2 . "/" . $file3);
  }
}




}




$new = new Cobra("https://7learn.com/course/big-data-engineer-expert","7learn");
$new->get();
$new->img();


 ?>
