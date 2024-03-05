<?php 
    // $command = escapeshellcmd("python ./transalator.py " .$text);
    // exec($command, $output, $requescode);
    // echo "Hello World";

    if(isset($_POST['btn2'])){
        $text= $_POST["texttospeak"];
        // echo $text;
        $command = escapeshellcmd("python ./speak.py " .$text);
        exec($command, $output, $requescode);

        header('location: ./page.php');
        die();

    }



?>