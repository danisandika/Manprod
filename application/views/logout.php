<?php
  session_start();
  session_destroy();
  redirect(base_url('login'));
?>