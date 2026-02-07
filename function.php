<?php

include('conn.php');
function readPelanggan(){
    global $conn;

    $query = "SELECT * FROM pelanggan";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readPembayaran($id){
    global $conn;

    $query = "SELECT
    sewa_pembayaran.total_harga,
    sewa.jam_awal,
    sewa.jam_akhir
    FROM
    sewa
    Inner Join sewa_pembayaran ON sewa.id_sewa = sewa_pembayaran.id_sewa WHERE sewa_pembayaran.id_sewa = $id";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readBayar(){
    global $conn;

    $query = "SELECT
    sewa_pembayaran.id_bayar,
	sewa_pembayaran.total_harga, 
	sewa_pembayaran.durasi_sewa, 
	sewa_pembayaran.status_pembayaran,
    sewa_pembayaran.transaksi_timestamp,
    pelanggan.nama_pelanggan,
    sewa_pembayaran.id_pegawai
    FROM
    sewa_pembayaran
    INNER JOIN sewa ON sewa.id_sewa = sewa_pembayaran.id_sewa
    INNER JOIN pelanggan ON sewa.id_pelanggan = pelanggan.id_pelanggan;";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readSewaJoin($id){
    global $conn;

    $query = "SELECT
    sewa.id_sewa,
    sewa.tanggal_sewa,
    sewa.jam_awal,
    sewa.jam_akhir,
    lapangan.nama_lapangan,
    lapangan.foto_lapangan,
    ekstra.nama_ekstra,
    sewa.id_pelanggan,
    pelanggan.nama_pelanggan
    FROM
    sewa
    Left Join lapangan ON sewa.id_lapangan = lapangan.id_lapangan
    Left Join ekstra ON sewa.id_ekstra = ekstra.id_ekstra
    Left Join pelanggan ON sewa.id_pelanggan = pelanggan.id_pelanggan WHERE sewa.id_pelanggan = $id";
    
    $result = mysqli_query($conn, $query);

    return $result;
}

function readPegawai(){
    global $conn;

    $query = "SELECT * FROM pegawai";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readUserProfile($id){
    global $conn;
    
    // Validasi input
    if(empty($id)){
        return null;
    }

    $query = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

    return $result;
}

function readLapangan(){
    global $conn;

    $query = "SELECT * FROM lapangan";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readQuery($table, $id, $find){
    global $conn;
    $query = "SELECT * FROM ".$table." WHERE ".$id."=".$find;
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);


    return $result;
};

function readSewa(){
    global $conn;

    $query = "SELECT * FROM sewa";
    $result = mysqli_query($conn, $query);

    return $result;
}

function readEkstra(){
    global $conn;

    $query = "SELECT * FROM ekstra";
    $result = mysqli_query($conn, $query);

    return $result;
}



function addSewa($data, $lapangan, $pelanggan){
    global $conn;

    $tanggalsewa = $data['tanggal_sewa'];
    $jamawal = $data['jam_awal'];
    $jamakhir = $data['jam_akhir'];
    $metodebayar = $data['metode_bayar'];
    $jumlahdstok = $data['jumlah_stok'];
    
    $namaekstra = $data['id_ekstra'];
    $idvoucher = $data['id_voucher'];
    if(($data['id_ekstra'] === '0') && ($data['id_voucher'] !== '0')){
        $query = "INSERT INTO sewa (sewa.tanggal_sewa, sewa.jam_awal, sewa.jam_akhir, sewa.metode_bayar, sewa.jumlah_stok, sewa.id_lapangan, sewa.id_pelanggan, sewa.id_voucher)
        VALUES('$tanggalsewa', '$jamawal', '$jamakhir', '$metodebayar', '$jumlahdstok', 
        '$lapangan', '$pelanggan', '$idvoucher')";
    }
    else if(($data['id_ekstra'] !== '0') && ($data['id_voucher'] === '0')){
        $query = "INSERT INTO sewa (sewa.tanggal_sewa, sewa.jam_awal, sewa.jam_akhir, sewa.metode_bayar, sewa.jumlah_stok, sewa.id_lapangan, sewa.id_ekstra, sewa.id_pelanggan)
        VALUES('$tanggalsewa', '$jamawal', '$jamakhir', '$metodebayar', '$jumlahdstok', 
        '$lapangan', '$namaekstra', '$pelanggan')";
    }
    else if(($data['id_ekstra'] === '0') && ($data['id_voucher'] === '0')){
        $query = "INSERT INTO sewa (sewa.tanggal_sewa, sewa.jam_awal, sewa.jam_akhir, sewa.metode_bayar, sewa.jumlah_stok, sewa.id_lapangan, sewa.id_pelanggan)
        VALUES('$tanggalsewa', '$jamawal', '$jamakhir', '$metodebayar', '$jumlahdstok', 
        '$lapangan', '$pelanggan')";
    }
    else{
        $query = "INSERT INTO sewa VALUES(NULL, '$tanggalsewa', '$jamawal', '$jamakhir', '$metodebayar', '$jumlahdstok', 
        '$lapangan', '$namaekstra', '$pelanggan', '$idvoucher')";
    }

    $result = mysqli_query($conn, $query);
    $isSucceed = mysqli_affected_rows($conn);


    return $isSucceed;
}

function addLapangan($data, $file){
    global $conn;


    $namaFoto = $file['foto_lapangan']['name'];
    $tempNamaFoto = $file['foto_lapangan']['tmp_name'];
    $direktori = 'assets/img/'.$namaFoto;
    $isMoved = move_uploaded_file($tempNamaFoto, $direktori);
    if(!$isMoved){
        $namaFoto = 'default.jpg';
    }


    $namaLapangan = $data['nama_lapangan'];
    $fasilitas = $data['fasilitas_tambahan'];
    $harga = $data['harga_lapangan'];


    $query = "INSERT INTO lapangan VALUES(NULL, '$namaLapangan', '$fasilitas', '$namaFoto', '$harga')";
    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);


    return $isSucceed;
}

function addEkstra($data){
    global $conn;

    $nama = $data['nama_ekstra'];
    $stok = $data['stok_ekstra'];
    $harga = $data['harga_ekstra'];

    $query = "INSERT INTO ekstra VALUES(NULL,  '$nama', '$stok', '$harga')";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);

    return $isSucceed;
}

function updateLapangan($data, $file){
    global $conn;


    $id = $data['id'];
    $namaLapangan = $data['nama_lapangan'];
    $fasilitas = $data['fasilitas_tambahan'];
    $harga = $data['harga_lapangan'];
    $namaFoto = $file['foto_lapangan']['name'];


    if($namaFoto != ""){
        $tempNamaFoto = $file['foto_lapangan']['tmp_name'];
        $direktori = 'assets/img/'.$namaFoto;
        move_uploaded_file($tempNamaFoto, $direktori);
        $query = "UPDATE lapangan SET nama_lapangan = '$namaLapangan', fasilitas_tambahan = '$fasilitas', harga_lapangan = '$harga', foto_lapangan='$namaFoto' WHERE id_lapangan = '$id'";
        $result = mysqli_query($conn, $query);
    } else{
        $query = "UPDATE lapangan SET nama_lapangan = '$namaLapangan', fasilitas_tambahan = '$fasilitas', harga_lapangan = '$harga' WHERE id_lapangan = '$id'";
        $result = mysqli_query($conn, $query);
    }


    $isSucceed = mysqli_affected_rows($conn);
    return $isSucceed;
}

function updateEkstra($data, $file){
    global $conn;

    $id = $data['id'];
    $nama_ekstra = $data['nama_ekstra'];
    $stok = $data['stok_ekstra'];
    $harga = $data['harga_ekstra'];
    

    $query = "UPDATE ekstra SET nama_ekstra = '$nama_ekstra', stok_ekstra = '$stok', harga_ekstra = '$harga' WHERE id_ekstra = '$id'";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);
    return $isSucceed;

}

function updateBayar($data){
    global $conn;

    $id = $data['id'];
    $status = $data['status_pembayaran'];
    

    $query = "UPDATE sewa_pembayaran SET status_pembayaran = '$status' WHERE id_bayar = '$id'";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);
    return $isSucceed;

}

function updatePelanggan($data, $file){
    global $conn;

    $id = $data['id'];
    $nama_pelanggan = $data['nama_pelanggan'];
    $kontak = $data['kontak_pelanggan'];
    $email = $data['email'];
    

    $query = "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', kontak_pelanggan = '$kontak', email = '$email' WHERE id_pelanggan = '$id'";
    $result = mysqli_query($conn, $query);

    $isSucceed = mysqli_affected_rows($conn);
    return $isSucceed;

}

function deleteLapangan($id){
    global $conn;


    $query = "DELETE FROM lapangan WHERE id_lapangan = $id";
    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);


    return $isSucceed;
}

function deleteEkstra($id){
    global $conn;


    $query = "DELETE FROM ekstra WHERE id_ekstra = $id";
    $result = mysqli_query($conn, $query);


    $isSucceed = mysqli_affected_rows($conn);


    return $isSucceed;
}




?>