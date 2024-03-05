import sys
import pyttsx3

def speak(text):
    engine= pyttsx3.init()
    voices= engine.getProperty('voices')
    print(voices)
    engine.setProperty('voice', voices[4].id)

    engine.say(text)
    engine.runAndWait()


if(len(sys.argv)>1):
    length= len(sys.argv)
    oldtext=""
    for i in range(1,length):
        oldtext+= sys.argv[i]+" "
    speak(oldtext)



