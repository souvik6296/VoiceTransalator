<?php
    error_reporting(0);

    if(isset($_POST['submit'])){
        $text= $_POST["text"];
        $command = escapeshellcmd("python ./transalator.py " .$text);
        exec($command, $output, $requescode);
        // print_r($output);
        // echo($output[0]);
        $cmnd1= "<script>document.getElementById('english').innerText='".$output[0]."';</script>";
        // echo $cmnd1;
        
        $command1 = escapeshellcmd("python ./actualscript.py " .$text);
        exec($command1, $output1, $requescode1);

        $json = file_get_contents('sample.json'); 
  
        // Decode the JSON file 
        $json_data = json_decode($json,true); 
        
        // Display data 
        // print_r($json_data);





        // print_r($json_data[0]);
        $cmnd2= "<script>document.getElementById('script').innerText='".$json_data[0]."';</script>";
        $cmnd3= "<script>document.getElementById('script-lang').innerText='".$json_data[1]."';</script>";
        $cmnd4= "<script>document.getElementById('output-holder').style.animation='appear 2s ease-in-out'; 
        document.getElementById('output-holder').style.opacity=1;</script>";




        // $data = array(
        //     'name' => "'".$json_data[0]."'"
        //     );
        
        // // header('Content-Type: application/json; charset=UTF-8'); 
        // print json_encode($data, JSON_UNESCAPED_UNICODE);



        // $input= fopen("sample.txt","r");
        // while(!feof($input)){
        //     // print(fgets($input)."<br>");



        // }

    }






?>    
    

    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Setu - bridge btw langs</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div id="left-part">

            <img src="./bg.jpg" alt="" srcset="" id="bg-img">
        </div>

        <div id="right-part">
            <div id="layer"></div>

            <div id="inputholder">
                <form method="post">
                    <input type="text" name="text" id="text" placeholder="Click here to input your text">
                    <button type="submit" name="submit" id="btn1">Translate</button>
                </form>
                <img src="./microphone.png" alt="" srcset="" width="90px" id="micbtn">
                
            </div>
            <div id="output-holder">
                <h1 id="heading">Here's your answer...</h1>
                <ul id="list">
                    <li class="items">

                        <p id="script-heading">Given text in it's real scripture</p>
                    </li>
                    <p id="script" class="object">This is a demo script</p>
                    <li class="items">

                        <p id="english-heading">Transalated to English</p>
                    </li>
                    <div id="secondary-holdar">

                        <p id="english" class="object">This a 2nd demo</p>
                        <img src="./speaking.png" alt="" srcset="" id="speak" onclick="goto()">
                        <form action="./tospeak.php" method="post">
                            <input type="hidden" name="texttospeak" id="tts">
                            <button type="submit" style="opacity:0;" id="btn2" name="btn2"></button>

                        </form>

                        
                    </div>
                    <li class="items">

                        <p id="script-lang-heading">Language of the given text:</p>
                    </li>
                    <p id="script-lang" class="object">Bn</p>
                </ul>
    
            </div>
        </div>

        <!-- <div id="container">
            <p id="title">Translate to English</p>
            <form method="post">
                <input type="text" name="text" id="text">
                <button type="submit" name="submit" id="btn1">Translate</button>
                <img src="./microphone.png" alt="" srcset="" width="50px" id="micbtn">
            </form>
        </div> -->


    </body>
    <div id="bellow">
        
    </div>
    <script src="./script.js"></script>
    <?php
        echo $cmnd1;
        echo $cmnd2;
        echo $cmnd3;
        echo $cmnd4;
    ?>





    </html>
