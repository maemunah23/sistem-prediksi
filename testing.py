import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import GradientBoostingRegressor
from sklearn.metrics import mean_absolute_error
import pickle

# Membaca data dari file Excel
data_pasokan = pd.read_excel('data pasokan.xlsx')
data_harga = pd.read_excel('tessdata.xlsx')

# Menggabungkan kedua data berdasarkan Tahun, Bulan, Minggu, dan Hari
data = pd.merge(data_pasokan, data_harga, on=['Tahun', 'Bulan', 'Minggu', 'Hari'])

# Tambahkan fitur baru yang menunjukkan apakah hari tersebut hari raya atau tidak
hari_raya = ['Idul Adha', 'Idul Fitri', 'Natal', 'Tahun Baru']
data['Hari Raya'] = data['Hari'].isin(hari_raya)

# Membuat fitur baru berdasarkan kondisi yang dijelaskan
data['Harga Baru'] = data['Harga']
data.loc[(data['Hari Raya'] == False) & (data['Jumlah Pasokan'] > 100), 'Harga Baru'] = data['Harga Baru'] * 0.8
data.loc[(data['Hari Raya'] == True) & (data['Jumlah Pasokan'] > 100), 'Harga Baru'] = data['Harga Baru'] * 1.2

# Memisahkan fitur (features) dan target variable (target)
X = data[['Tahun', 'Bulan', 'Minggu', 'Hari', 'Jumlah Pasokan', 'Hari Raya']]
y = data['Harga Baru']  # Menggunakan kolom harga baru yang sudah disesuaikan

# Mengubah data kategorikal menjadi one-hot encoding
X = pd.get_dummies(X)

# Memisahkan data menjadi data latih dan data uji
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Inisialisasi dan melatih model Gradient Boosting
model = GradientBoostingRegressor()
model.fit(X_train, y_train)

# Memprediksi harga menggunakan data uji
y_pred = model.predict(X_test)

# Menghitung Mean Absolute Error (MAE) dari prediksi
mae = mean_absolute_error(y_test, y_pred)
print("Mean Absolute Error:", mae)

# Menyimpan model ke file menggunakan pickle
with open('gradient_boosting_model9.pkl', 'wb') as f:
    pickle.dump(model, f)
