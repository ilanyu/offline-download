<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

    public function index()
    {
        $file = $this->input->get('file');
        $uri = dirname(dirname(__DIR__)) . '/download/' . basename($file);
        unlink($uri);
        if (file_exists($uri))
            echo 'failed';
        else
            echo 'success';
    }
}
