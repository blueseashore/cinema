<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 自动部署
 * Class Deploy
 */
class Deploy extends CI_Controller
{
    public function index()
    {
        echo 'start', PHP_EOL;
        $githubJson = file_get_contents('php://input');
        $githubData = json_decode($githubJson, TRUE);
        if (isset($githubData['ref']) && $githubData['ref'] == 'refs/heads/master') {
            echo 'exec', PHP_EOL;
            exec('../system/deploy.sh');
            file_put_contents('/tmp/github/' . time() . '.log', $githubJson);
        }
        echo 'end', PHP_EOL;
    }
}