<?php

 $conn = mysql_connect('127.0.0.1','root','root');
 $dbcon = mysql_select_db('masterscuba');

 /*if(isset($conn)) {
   echo "you are connected to MySQL server successfully <br/>";
 } else {
   echo "you are failed to connect to MySQL server";
 }

 if(isset($dbcon)) {
   echo "you are connected to MySQL database successfully";
 } else {
   echo "you are failed to connect to MySQL database";
 }*/

 if(!isset($conn)) {
   echo "you are failed to connect to MySQL server";
 }

 if(!isset($dbcon)) {
   echo "you are failed to connect to MySQL database";
 }
 ?>
