<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class PinjamanKu extends REST_Controller
{
    public function index_post()
    {
        $id = $this->post('id');

        $data = $this->db->query("SELECT a.keterangan, a.id, a.timestamps, a.lokasi_acara, a.tgl_sewa, a.status, b.nama AS nama_peminjam, r.nama AS nama_barang FROM tb_transaksi a JOIN tb_user u JOIN tb_biodata b JOIN tb_barang r ON a.id_user = u.id AND a.id_barang = r.id AND u.id = b.id_user WHERE a.id_user = $id ORDER BY a.tgl_sewa ASC")->result_array();

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
