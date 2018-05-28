<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deploy extends CI_Controller
{
    public function index()
    {
        $githubJson = file_get_contents('php://input');
        $githubData = json_decode($githubJson, TRUE);
        if (isset($githubData['ref']) && $githubData['ref'] == 'refs/heads/master') {
        exec('../system/deploy.sh');
            file_put_contents('/tmp/github/' . time() . '.log', $githubJson);
        }
    }
}