<?php

class Nilai{
    public $mapel;
    public $nilai;

    public function __construct($mapel,$nilai) {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }    
}

class Siswa{
    public $nrp;
    public $nama;
    public $daftarNilai;

    public function __construct($nrp,$nama) {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->daftarNilai = [];
    }

    public function tambahNilai($mapel,$nilai){
        return $this->daftarNilai[] = new Nilai($mapel,$nilai);
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

$siswa = new Siswa('123','zidane');
$siswa->tambahNilai('inggris',100);

$daftarMapel=['inggris','indonesia','jepang'];
$daftarSiswa = [];
for ($i=0; $i < 10; $i++) { 
    $nama = generateRandomString();
    $nilai = rand(1,100);
    $mapel = $daftarMapel[rand(0,2)];
    $siswaBaru = new Siswa($i+1,$nama);
    $siswaBaru->tambahNilai($mapel,$nilai);
    $daftarSiswa[] = $siswaBaru;
}

foreach ($daftarSiswa as $siswa) {
    echo 'nama : '.$siswa->nama.'<br>';
    echo 'nrp : '.$siswa->nrp.'<br>';
    foreach ($siswa->daftarNilai as $nilai) {
        echo 'mapel : '.$nilai->mapel.'<br>';
        echo 'nilai : '.$nilai->nilai.'<br>';
    }
}