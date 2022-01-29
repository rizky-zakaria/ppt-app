<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Barang extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $data = $this->db->get('tb_barang')->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'messages' => 'Data Anda',
                    'data' => $data,
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'messages' => 'Data Not Found',
                ],
                REST_Controller::HTTP_NOT_FOUND
            );
        }
    }
}
