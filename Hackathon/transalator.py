import sys
from googletrans import Translator

transalator= Translator()

def translate(oldtext):
    
    text= transalator.translate(oldtext, dest='en').text
    return text


if(len(sys.argv)>1):
    length= len(sys.argv)
    oldtext=""
    for i in range(1,length):
        oldtext+= sys.argv[i]+" "
    print(translate(oldtext))
else:
    print("Hello")



