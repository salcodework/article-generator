import os
import io
from os import environ
from flask import *
import mysql.connector
import matplotlib.pyplot as plt
import numpy as np
from PIL import Image
from flask_cors import CORS
from sklearn.metrics import accuracy_score
import pandas as pd
from gtts import gTTS
import string
from sklearn.feature_extraction.text import TfidfVectorizer
import time

from transformers import GPT2LMHeadModel, GPT2Tokenizer
import tensorflow as tf
import torch

torch.manual_seed(40)

# Specify the local path to the downloaded model
model_path1 = 'path1/to/save/model'
model_path2 = 'path1/to/save/tokenizer'

# Load pre-trained BERT model and tokenizer from the local directory
tokenizer = GPT2Tokenizer.from_pretrained(model_path2)
model = GPT2LMHeadModel.from_pretrained(model_path1)


mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="articlegenerator"
)
mycursor = mydb.cursor()

app = Flask(__name__)
CORS(app)
app.secret_key = "abc"

@app.route('/')  
def main():
    #return render_template("signin.html")
    Respon=make_response("hii")
    return Respon

@app.route('/signin')  
def signin():  
    Respon=make_response("hii")
    return Respon

@app.route('/success', methods = ['POST','GET'])  
def success():
    #http://192.168.137.27:5555/success
    Respondata=""
    if request.method == 'POST':
        UID = request.form['UID']
        input_text = str(request.form['EnterArticle'])
        print(input_text)

        input_ids = tokenizer.encode(input_text, return_tensors="tf")
        #input_ids = tokenizer.encode(input_text, return_tensors="pt")

        # Explicitly create attention mask
        attention_mask = tf.ones_like(input_ids)

        # Convert TensorFlow tensor to NumPy array
        input_ids_np = input_ids.numpy()

        # Generate with attention mask
        output = model.generate(
            torch.tensor(input_ids_np),  # Convert NumPy array to PyTorch tensor
            max_length=300,
            num_beams=5,
            no_repeat_ngram_size=2,
            top_k=50,
            top_p=0.95,
            temperature=0.7,
            attention_mask=torch.tensor(attention_mask.numpy()),  # Convert attention mask to PyTorch tensor
            eos_token_id=tokenizer.eos_token_id,  # Set eos_token_id to mark the end of the sequence
        )

        # Decode and print the generated text
        generated_text = tokenizer.decode(output[0], skip_special_tokens=True)
        print(generated_text)
        
        unique_file = generate_unique_filename(prefix='file_', suffix='.mp3')
        generated_text=generated_text+'<audio controls><source src="http://127.0.0.1:5555/static/tmp/'+unique_file+'" type="audio/mpeg">Your browser does not support the audio element.</audio>'

        sql="INSERT INTO article(UID,ArticleTitle,Article,Adatetime) VALUES (%s,%s,%s,now())"
        val=(UID,input_text,generated_text)
        mycursor.execute(sql,val)
        mydb.commit()

        

        language = 'en'
        myobj = gTTS(text=generated_text, lang=language, slow=False) 
        myobj.save("static/tmp/"+unique_file) 
  
        Respondata=generated_text
          

    Respon=make_response(Respondata)
    return Respon

def generate_unique_filename(prefix='', suffix=''):
    timestamp = int(time.time())
    unique_filename = f"{prefix}{timestamp}{suffix}"
    return unique_filename


@app.route('/Mainpage', methods=['GET'])  
def Mainpage():
    Respon=make_response("")
    #return Respon
    #return render_template("Mainpage.html")
    return Respon
            
@app.route('/shutdown')
def shutdown():
    sys.exit()
    os.exit(0)
    return
   
if __name__ == '__main__':
   HOST = environ.get('SERVER_HOST', '0.0.0.0')
   #HOST = environ.get('SERVER_HOST', 'localhost')
   try:
      PORT = int(environ.get('SERVER_PORT', '5555'))
   except ValueError:
      PORT = 5555
   app.run(HOST, PORT)
   #app.run(debug=True)
