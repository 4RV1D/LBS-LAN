<?php

  if (isset($_POST['order'])) {
    $OrderSeat = $_POST['seat'];

    $placing = new Placing("0");
    $placing->move($_SESSION['logged-in'], $OrderSeat);
  }

?>
