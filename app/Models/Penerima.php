<?php

namespace App\Models;

class Penerima extends User
{
    protected $daftarPermintaan = [];

    public function login($email, $password)
    {
        return "Penerima login";
    }

    public function ajukanPermintaan(Permintaan $p)
    {
        $this->daftarPermintaan[] = $p;
        return "Permintaan diajukan";
    }

    public function lihatKebutuhan()
    {
        return $this->daftarPermintaan;
    }
}