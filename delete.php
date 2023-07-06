<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST["id"];
   

    $perintah = "DELETE FROM tbl_gotomalls WHERE id='$id'";
    $eksekusi = mysqli_query($koneksi,$perintah);
    $cek = mysqli_affected_rows($koneksi);
    
    if($cek>0){
        $response["kode"]=1;
        $response["pesan"] = "Hapus Data Berhasil";
    }
    else{
        $response["kode"]=0;
        $response["pesan"] = "Hapus Data Gagal";
    }
    
}
else{
    $response["kode"]=0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($koneksi);