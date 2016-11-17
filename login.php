<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<form method="POST" style="display:none;">
    <input type="text" name="email" placeholder="podaj e-mail"><br>
    <input type="password" name="password" placeholder="podaj hasło">
    <input type="submit">
   
 <a href="regiestr.php"><h3>Jeśli nie masz konta zarejestruj się</h3></a>   
</form>
 <?php include_once 'src/BaseUser.php';
          $user= new BaseUser();
          $user->login();
            ?>