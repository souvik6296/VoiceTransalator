from googletrans import Translator
transalator= Translator()

oldtext="ਸ਼ੁਭ ਸਵੇਰ"

srcoftext= transalator.translate(oldtext, dest='en').src
text= transalator.translate(oldtext, dest=srcoftext).text
print(text)