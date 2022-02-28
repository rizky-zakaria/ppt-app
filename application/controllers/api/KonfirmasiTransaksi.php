<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class KonfirmasiTransaksi extends REST_Controller
{

    public function index_post()
    {
        $id = $this->post('id');
        $data = $this->db->query("UPDATE `tb_transaksi` SET `status`='Terkonfirmasi' WHERE id = '$id'");

        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'messages' => 'Data Berhasil Terkonfirmasi',
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'messages' => 'Data Gagal DiKonfirmasi',
                ],
                REST_Controller::HTTP_NOT_FOUND
            );
        }
    }
}
