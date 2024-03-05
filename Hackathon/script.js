const SpeechRecognisition= window.SpeechRecognition||window.webkitSpeechRecognition;

const micbtn= document.querySelector("#micbtn");
const textbox= document.getElementById("text");
const btn= document.getElementById("btn1");


function goto(){
    document.getElementById('tts').value= document.getElementById('english').innerText;
    document.getElementById('btn2').click();
}




if(SpeechRecognisition){
    console.log("OK");

    const recognition= new SpeechRecognisition();
    micbtn.addEventListener('click', function(){
        console.log("clicked");
        if(micbtn.src.includes("microphone.png")){  //listing started

            micbtn.src= "./microphone-active.png";
            window.setTimeout(()=>{
                window.parent.document.querySelector("#micbtn").style.animation="greenwave 2s ease-out infinite";

            },500);
            recognition.start();



        }else{ //listing stopped
            micbtn.src= "./microphone.png";
            recognition.stop();

        }
        recognition.onstart= function(){
            console.log("recognition started");
        }
        recognition.onend= function(){
            console.log("recognition stopped");
        }
        recognition.onresult= function(event){
            var result= event.results[0][0].transcript;
            console.log(result);
            document.getElementById("text").value=result;
            window.setTimeout(()=>{
                btn.click();

            },750);
            
            micbtn.src= "./microphone.png";
            recognition.stop();

        }

        

    });


}else{
    console.log("Not OK");
}