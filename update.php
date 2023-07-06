<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $urlmap = $_POST["urlmap"];
    $jam_operasional = $_POST["jam_operasional"];
    
    $perintah = "UPDATE tbl_gotomalls SET nama ='$nama',lokasi='$lokasi',urlmap='$urlmap',jam_operasional='$jam_operasional' WHERE id='$id'";
    $eksekusi = mysqli_query($koneksi,$perintah);
    $cek = mysqli_affected_rows($koneksi);
    
    if($cek>0){
        $response["kode"]=1;
        $response["pesan"] = "Update Data Berhasil";
    }
    else{
        $response["kode"]=0;
        $response["pesan"] = "Update Data Gagal";
    }
    
}
else{
    $response["kode"]=0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($koneksi);