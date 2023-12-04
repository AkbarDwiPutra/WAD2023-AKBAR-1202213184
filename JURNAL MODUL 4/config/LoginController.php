<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {

    // (1) Panggil variabel global $db dari file config
    
    global $conn;

    // (2) Ambil nilai input dari form login
        // a. Ambil nilai input email
        
        // b. Ambil nilai input password
        
    $email = $input['email'];
    $password = $input['password'];

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // (4) Buatlah perkondisian ketika email ditemukan ( gunakan mysqli_num_rows == 1 )
    if (mysqli_num_rows($result) == 1){
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        
        $data = mysqli_fetch_assoc($result);

        // b. Lakukan verifikasi password menggunakan fungsi password_verify
            
            // c. Set variabel session dengan key login untuk menyimpan status login
            
            // d. Set variabel session dengan key id untuk menyimpan id user
            
            if(password_verify($password, $data['email'])) {
                $_SESSION["login"] = true;
                $_SESSION["username"] = $data['username'];
                $_SESSION["id"] = $data['id'];
            

            // e. Buat kondisi untuk mengecek apakah checkbox "remember me" terisi kemudian set cookie dan isi dengan id
            
            // 
        // f. Buat kondisi else dan isi dengan variabel session dengan key message untuk meanmpilkan pesan error ketika password tidak sesuai
        
            }else{
            $_SESSION['message'] = 'Password Salah';
            $_SESSION['COLOR'] = 'DANGER';
        }
    // 

    // (5) Buat kondisi else, kemudian di dalamnya
    //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
    
    }else{
        $_SESSION['message'] = 'Email tidak ditemukan';
        $_SESSION['color'] = 'danger';
    }
}
// 

// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $db dari file config
    
    global $conn; 

    // (7) Ambil nilai cookie yang ada
    
    $id = $cookie['id']; 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )

        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc

        // b. Set variabel session dengan key login untuk menyimpan status login
        
        // c. Set variabel session dengan key id untuk menyimpan id user
        
    
    if(mysqli_num_rows($result) ==1 ){
        $dataCook = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
        $_SESSION["username"] = $dataCook['username'];
        $_SESSION["id"] = $dataCook['id'];
    }
}
// 

?>