import sys
import googletrans
from googletrans import Translator
import json


languages= googletrans.LANGUAGES


transalator= Translator()

def createfile(oldtext):
    
    srcoftext= transalator.translate(oldtext, dest='en').src
    text=transalator.translate(oldtext,dest=srcoftext).text
    list1=[text,languages[srcoftext]]
    return list1

if(len(sys.argv)>1):
    length= len(sys.argv)
    oldtext=""
    for i in range(1,length):
        oldtext+= sys.argv[i]+" "

    list2=createfile(oldtext)
    mydict= {0:list2[0],1:list2[1]}

    with open("sample.json", "w") as outfile: 
        json.dump(mydict, outfile)


else:
    print("Hello")
