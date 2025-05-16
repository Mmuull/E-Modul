<?php
    session_start();
    include "../../inc/koneksi.php";

    if (isset($_POST['answer'])){
        $answers = $_POST['answer'];
        $testtype = $_POST['testtype'];
        $student_id = $_POST['student_id'];
        submitGrade($koneksi, $answers, $testtype, $student_id);
    }
    if ($_GET['mode'] == "delete" && isset($_GET['id'])){
        deleteGrade($koneksi, $_GET['id']);
    }

    function submitGrade($koneksi, $answers, $testtype, $student_id){
        // Get Answer Key
        $file = fopen("../../dist/file/$testtype.csv","r");
        if (strlen($answers) == 35 && $file !== FALSE && !isset($_SESSION[$testtype.'result'])){
            
            // Grading
            $index = 0; $grade = 0;
            while (($line = fgetcsv($file)) !== false) {
                if ($answers[$index*2+1] == $line[6]) { $grade += 10; }
                $index++;
            }

            // Push it into database
            $sql = "UPDATE tb_nilai SET jawaban_$testtype = '$answers', nilai_$testtype = '$grade' WHERE id_siswa = '$student_id'";
            $koneksi->query($sql);

            // Change Final Grade
            $data = $koneksi->query("SELECT nilai_pretest, nilai_posttest FROM tb_nilai WHERE id_siswa = '$student_id'");
            $grade = $data->fetch_assoc();
            $finalGrade = array_sum($grade)/2;

            $sql = "UPDATE tb_nilai SET summary = $finalGrade WHERE id_siswa = '$student_id'";
            $koneksi->query($sql);

            // Put Answer to session for check mode
            $_SESSION[$testtype.'result'] = $answers; // For checking answers
        }
        
        
        // echo "<script> successProcedure() </script>";
        echo "<script> console.log('Data Saved'); window.location.href = `../../index.php?page=$testtype`; </script>";
    }

    function deleteGrade($koneksi, $id){
        $sql = "UPDATE tb_nilai SET 
        jawaban_pretest = NULL, nilai_pretest = 0, jawaban_posttest = NULL, nilai_posttest = 0, summary = 0
        WHERE id_siswa = $id";
        
        $koneksi->query($sql);
        echo "<script> console.log('Data Deleted'); window.location.href = `../../index.php?page=nilai`; </script>";
    }
    
?>
<script>
    function successProcedure(){
        console.log("Go to Pretest Check")
        window.location.href = `../../index.php?page=<?=$testtype?>?mode=check`;
    }
</script>