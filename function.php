<?php
$conn = mysqli_connect("localhost", "root", "", "upi_siak");

function query_db($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_data($data){
    global $conn;
    $nim = $data["nim"];
    $nama = $data["nama"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $gambar = $data["gambar"];

    $query = "INSERT INTO mahasiswa (nim, nama, email, jurusan, gambar)
                VALUES ('$nim', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_data($id){
    global $conn;
    $query = "DELETE FROM mahasiswa WHERE id =$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_data($data){
    global $conn;
    $id = $data["id"];
    $nim = $data["nim"];
    $nama = $data["nama"];
    $email = $data["email"];
    $jurusan = $data["jurusan"];
    $gambar = $data["gambar"];

    $query = "UPDATE mahasiswa SET 
                nim = '$nim', 
                nama = '$nama', 
                email = '$email', 
                jurusan = '$jurusan', 
                gambar = '$gambar' 
              WHERE id = $id";
              
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// SEARCH
function cari_data($keyword) {
    global $conn;


    $keyword = mysqli_real_escape_string($conn, $keyword);


    $query = "SELECT * FROM mahasiswa
              WHERE
              nim LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%'";


    return query_db($query);
}


?>
