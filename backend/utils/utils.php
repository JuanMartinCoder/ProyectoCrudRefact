<?php declare(strict_types=1);

function LoadEnvFile(string $filepath) : bool {
  $var_arrs = array();
  $fopen = fopen($filepath,'r');

  if($fopen){
    //Bucle de las lineas del archivo 
    while(($line = fgets($fopen)) !== false) {
      $line_ = explode("#",$line,2)[0];
      $env_ex = preg_split('/(\s?)\=(\s?)/', $line_);
      $env_name = trim($env_ex[0]);
      $env_value = isset($env_ex[1]) ? trim($env_ex[1]) : "";
      $var_arrs[$env_name] = $env_value;
    } 
    fclose($fopen); 
  }  

  foreach($var_arrs as $name => $value){
    putenv("{$name}={$value}");
  }

  return true;
  

}


?>

