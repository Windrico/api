<?php
    require("koneksi.php");
    
    $perintah = "SELECT * FROM tbl_gotomalls";
    $eksekusi = mysqli_query($koneksi,$perintah);
    
    $cek = mysqli_affected_rows($koneksi);
    
    if($cek>0){
        $response ["kode"] = 1;
        $response ["pesan"] = "Data Tersedia";
        $response ["data"] = array();
        
        while($ambil = mysqli_fetch_object($eksekusi)){
            $temp ["id"] = $ambil->id;
            $temp ["nama"] = $ambil->nama;
            $temp ["lokasi"] = $ambil->lokasi;
            $temp ["urlmap"] = $ambil->urlmap;
            $temp ["jam_operasional"] = $ambil->jam_operasional;
            
            array_push($response ["data"],$temp);
        }
    }
    else{
        $reponse["kode"]= 0;
         $reponse["pesan"]= "Data Tidak Tersedia";
    }
    echo json_encode($response);
    mysqli_close($koneksi);
    
    
    
    
    
    
    