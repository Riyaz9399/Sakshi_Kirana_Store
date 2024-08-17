<?php
 session_start();
 session_unset();
 session_destroy();
 echo "<script>alert('Miss you come soon again..');
 window.location.href='../index.php';</script>";
?>