<?php

function mdebug($v, $l = "debug")
{
  log_message($l, var_export($v, true));
}
