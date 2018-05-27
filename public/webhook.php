<?php
/**
 * User: kendo    Date: 2018/4/24
 */
file_put_contents('/tmp/' . time() . '.log', file_get_contents('php://input'));
echo 11;
//shell_exec('cd /var/www && php gitpull.php');