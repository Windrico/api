<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $urlmap = $_POST["urlmap"];
    $jam_operasional = $_POST["jam_operasional"];
    
    $perintah = "INSERT INTO tbl_gotomalls (nama,lokasi,urlmap,jam_operasional) VALUE ('$nama','$lokasi','$urlmap','$jam_operasional')";
    $eksekusi = mysqli_query($koneksi,$perintah);
    $cek = mysqli_affected_rows($koneksi);
    
    if($cek>0){
        $response["kode"]=1;
        $response["pesan"] = "Tambah Data Berhasil";
    }
    else{
        $response["kode"]=0;
        $response["pesan"] = "Tambah Data Gagal";
    }
    
}
else{
    $response["kode"]=0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($koneksi);