<?php

require_once "config/config.php";

    // Gaya Positional (?)
    $stmt = $pdo->prepare("SELECT * FROM pegawai WHERE aktif = ?");
    $stmt->execute([1]);
    $dataPegawai = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    // Gaya Named (:nama)
    $stmt = $pdo->prepare("SELECT * FROM pegawai WHERE aktif = :status");
    $stmt->execute(["status" => 1]);
    $dataPegawai = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($dataPegawai as $item){
    echo $item['nama'];
    echo $item['jabatan'];
    echo $item['gaji'];
    echo $item['tanggal_bergabung'];
    echo $item['aktif'];
}
echo "selamat datang di aplikasi simpeg";

?>