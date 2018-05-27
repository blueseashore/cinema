<?php
/**
 * User: kendo    Date: 2018/4/24
 */
file_put_contents('/tmp/' . time() . '.log', file_get_contents('php://input'));
//shell_exec('cd /var/www && php gitpull.php');