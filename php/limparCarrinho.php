<?php
    $con = mysqli_connect("localhost:3306", "root", "", "advanced");

    $limpar_sql = "DELETE FROM carrinho";

    $resultado = mysqli_query($con, $limpar_sql);

    mysqli_close($con);
?>
