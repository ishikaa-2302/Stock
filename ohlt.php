<?php
  $connect = mysqli_connect("localhost","root","","testing");
  $filename= "Stock List.json";
  $sql = '';
  $data = file_get_contents($filename);
  $array = json_decode($data,true);
  foreach($array as $row)
  {
    $sql = "INSERT INTO stock2(close, high, low, open, symbol, volume, dated) VALUES ('".$row["close"]."', '".$row["high"]."', '".$row["low"]."', '".$row["open"]."', '".$row["symbol"]."', '".$row["volume"]."', '".$row["date"]."'); ";
    mysqli_query($connect, $sql);
  }
  echo "Inserted";

 ?>
