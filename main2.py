from flask import Flask, request, jsonify
from flask_cors import CORS
import pandas as pd
import pickle

app = Flask(__name__)
CORS(app)

def load_model(model_path):
    with open(model_path, 'rb') as f:
        loaded_model = pickle.load(f)
    return loaded_model

def preprocess_data(data, model):
    # Mengubah data kategorikal (Month) menjadi one-hot encoding
    data = pd.get_dummies(data)
    
    # Mendapatkan nama kolom yang digunakan saat pelatihan model
    nama_kolom_pelatihan = model.feature_names_in_
    
    # Memeriksa perbedaan antara nama kolom yang digunakan saat pelatihan model dan nama kolom pada data prediksi
    kolom_yang_hilang = set(nama_kolom_pelatihan) - set(data.columns)
    for kolom in kolom_yang_hilang:
        data[kolom] = 0
    
    # Menyesuaikan urutan kolom agar sesuai dengan urutan yang digunakan saat melatih model
    data = data[nama_kolom_pelatihan]
    
    return data

def predict_price(model, data):
    # Memprediksi harga cabai
    harga_prediksi = model.predict(data)
    return harga_prediksi

def format_price(prediction):
    # Memformat hasil prediksi menjadi format mata uang yang umum
    harga_prediksi_formatted = "{:,.0f} rupiah".format(prediction[0])
    return harga_prediksi_formatted

# Load the model once when the server starts
model_path = 'gradient_boosting_model9.pkl'
loaded_model = load_model(model_path)

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    
    data_prediksi = pd.DataFrame(data)
    
    # Melakukan preprocessing data
    data_prediksi_processed = preprocess_data(data_prediksi, loaded_model)
    
    # Melakukan prediksi harga
    harga_prediksi = predict_price(loaded_model, data_prediksi_processed)
    
    # Format hasil prediksi
    harga_prediksi_formatted = format_price(harga_prediksi)
    
    return jsonify({'predicted_price': harga_prediksi_formatted})

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5000)
