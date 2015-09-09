<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ly
 * Date: 2015/9/7
 * Time: 10:38
 */
class Downlist extends CI_Controller {
    public function index() {
        date_default_timezone_set("PRC");
        $this->load->helper('directory');
        $uri = dirname(dirname(__DIR__)) . '/download/';
        if (!is_dir($uri)) mkdir($uri);
        $map = directory_map($uri, 1);
        $count = count($map);
        $response = array();
        for ($i = 0 ; $i < $count ; $i++)
        {
            $response[$i]['name'] = $map[$i];
            $response[$i]['size'] = substr(filesize($uri . $map[$i]) / 1024 / 1024,0,5) . " M";
            $response[$i]['mtime'] = date("Y-m-d H:i:s",filemtime($uri . $map[$i]));
            $response[$i]['md5'] = strtoupper(md5_file($uri . $map[$i]));
        }
        echo json_encode($response);
    }
}