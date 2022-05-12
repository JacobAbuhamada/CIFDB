<?php

  $vectorFields =["Exp#", "Date", "Time", "Functioning", "Intensity", "Valence", "Sense of Self", "Description"];
  $experiences = $conn->query("SELECT `v_date`, `v_time`, `x`, `y`, `z`, `SoS`, `description` FROM vectors WHERE ID = {$_SESSION["user"]["ID"]}")->fetch_all();

?>