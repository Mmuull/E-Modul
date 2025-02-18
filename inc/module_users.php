<?php
    include_once "koneksi.php";

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        // Check if it contain id which means delete or update
        if ($id = $_GET['id']) {
            switch ($_GET['method']) {
                case 'delete':
                    $table = $_GET['table'];
                    echo deleteUser($koneksi,$table, $id);    
                    break;
                case 'update':
                    // updateUser($koneksi, $id);    
                    break;
                
                default:
                    break;
            }
        }
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Check if it contain form input from pengguna which means insert pengguna
        if (isset($_POST['pengguna_name'])) {
            $data = [];
            $table = $_POST['table'];
            array_push($data, 
                $_POST['pengguna_name'],
                $_POST['pengguna_username'],
                mysqli_real_escape_string($koneksi,md5($_POST['pengguna_password'])),
                $_POST['pengguna_level']
            );

            echo addUser($koneksi, $table, $data);
        }

        elseif (isset($_POST['siswa_name'])) {
        // Check if it contain form input from siswa which means insert siswa
            $data = [];
            $table = $_POST['table'];
            array_push($data, 
                $_POST['siswa_name'],
                $_POST['siswa_username'],
                mysqli_real_escape_string($koneksi,md5($_POST['siswa_password'])),
                $_POST['siswa_gender'],
                $_POST['siswa_kelas'],
                $_POST['siswa_email'],
                $_POST['siswa_level']
            );

            echo addUser($koneksi, $table, $data);
        }

        // Check if it contain data to update
        elseif ($rawData = file_get_contents("php://input")){
            $data = json_decode($rawData, true);
            $table = $data['table']; unset($data['table']);
            $id = $data["id_$table"];

            echo updateUser($koneksi,$table, $id, $data);
        }
    }

    function deleteUser($koneksi, $table, $id){
        $sql = "DELETE FROM tb_$table WHERE id_$table = $id";
        
        $koneksi->query($sql);
        echo "<script> window.location.href = `../index.php?page=$table`; </script>";

        return "User Deleted";
    }

    function updateUser($koneksi, $table, $id, $data){
        $set = []; 
        foreach ($data as $column => $value) {
            $set[] = "$column = '$value'";
        }
        $setString = implode(', ', $set);
        
        // Create the SQL query
        $sql = "UPDATE tb_$table SET $setString WHERE id_$table = $id";
        // echo $sql;

        $koneksi->query($sql);
        // echo "<script> window.location.href = `../index.php?page=pengguna`; </script>";

        // return "User Deleted";
    }

    function addUser($koneksi, $table, $data){
        $sql = "INSERT INTO tb_$table VALUE (NULL";
        foreach ($data as $value) {
            $sql = $sql.",'$value'";
        }
        $sql = $sql.")";

        // echo $sql;

        $koneksi->query($sql);

        if ($table == 'siswa'){
            $query = "SELECT id_siswa FROM tb_siswa ORDER BY id_siswa DESC LIMIT 1";
            $id = $koneksi->query($query);

            $sql = "INSERT INTO tb_nilai VALUE (NULL, $id, NULL, 0, NULL, 0, 0)";
            
            // echo $sql;
            $koneksi->query($sql);
        }

        echo "<script> window.location.href = `../index.php?page=$table`; </script>";

        // return "User Inserted";
    }
?>