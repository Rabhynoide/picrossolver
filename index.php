<?php

$dimmax = 5;
$dim0 = 0;

try {
	include('include/dbconn.php');
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Fonction ligne complète
	/*$sql = 'SELECT * FROM base WHERE valeur ='.$dimmax.'';

	foreach ($conn->query($sql) as $row){
    $req = $conn->prepare("INSERT INTO resultat (X, Y, valeur) VALUES (:X, :Y, :valeur)");
    if ($row['type'] == 'Y'){
      $Y = $row['position'];
      $X = 0;

      while($X < $row['valeur']){
        $req->execute(array(
          "X" => $X,
          "Y" => $Y,
          "valeur" => 1
        ));

        $X ++;
      }

    }else{
      echo 'X';
    }

  }
  *///
  //Fonction ligne vide
  $sql = 'SELECT * FROM base WHERE valeur ='.$dim0.'';

	foreach ($conn->query($sql) as $row){
    $req = $conn->prepare("INSERT INTO resultat (X, Y, valeur) VALUES (:X, :Y, :valeur)");
    if ($row['type'] == 'Y'){
      $Y = $row['position'];
      $X = 0;

      while($X < $row['valeur']){
        $req->execute(array(
          "X" => $X,
          "Y" => $Y,
          "valeur" => 0
        ));

        $X ++;
      }

    }else{
      echo 'X';
    }

  }
  //
  ?>
  <table>
  <?php
  $a = 0;
  while ($a < $dimmax){
    echo "<tr>";
    $b = 0;
    while ($b < $dimmax){
      $sql = "SELECT * FROM resultat WHERE X ='.$b.' AND Y = '.$a.'";
      foreach ($conn->query($sql) as $row){
      echo "<td>".$row['valeur']."</td>";
      }
      $b ++;
    }
    echo "</tr>";
    $a ++;
  }
   ?>
  </table>
  <?php
}
catch(PDOException $e){
  $conn = null;
	exit("Connection failed: " . $e->getMessage());
}
?>
