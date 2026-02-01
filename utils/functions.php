<?php
  
  function redirectWithMessage($exito, $exitoMsg, $errMsg, $redirectUrl){
        if(!isset($_SESSION)) session_start();
        $_SESSION['mensaje']= ($exito)?$exitoMsg:$errMsg;
        $_SESSION['color']= ($exito)?'primary':'danger';

       header("Location: $redirectUrl");
    }

?>