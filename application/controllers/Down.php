<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Down extends CI_Controller {

    public function index()
    {
        $url = $this->input->get('url');
        $allow_type = array("wmv","apk","deb","iso","xls","xlsx","exe","cpp","pdf","gif","mp3","mp4","zip","rar","doc","docx","mov","ppt","pptx","txt","7z","jpeg","jpg","JPEG","png");
        $torrent = explode(".",$url);
        $file_end = end($torrent);
        $file_end = strtolower($file_end);
        if( in_array($file_end,$allow_type) )
        {
            shell_exec("wget -b -nc -o /dev/null --restrict-file-names=nocontrol -P ./download " . escapeshellarg($url));
            echo "success";
        }
        else
        {
            echo "failed";
        }
    }
}
