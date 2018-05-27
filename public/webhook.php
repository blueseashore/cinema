<?php
/**
 * @name github钩子函数
 * User: kendo    Date: 2018/4/24
 */
$githubJson = file_get_contents('php://input');
$githubData = json_decode($githubJson, TRUE);
if (isset($githubData['ref']) && $githubData['ref'] == 'refs/heads/master') {
    shell_exec(file_get_contents('./deploy.ssh'));
    file_put_contents('/tmp/github/' . time() . '.jpg', $githubJson);
}
