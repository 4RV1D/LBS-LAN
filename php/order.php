<?php

  if (isset($_POST['order'])) {
    $OrderSeat = $_POST['seat'];

    $placing = new Placing("0");
    $placing->order($_SESSION['logged-in'], $OrderSeat);
  }

?>
