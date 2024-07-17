document.getElementById('predictionForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const data = {
        Tahun: [parseInt(document.getElementById('tahun').value)],
        Bulan: [document.getElementById('bulan').value],
        Minggu: [parseInt(document.getElementById('minggu').value)],
        Hari: [parseInt(document.getElementById('hari').value)],
        'Jumlah Pasokan': [parseInt(document.getElementById('jumlahPasokan').value)],
        Hari_Raya: [parseInt(document.getElementById('hariRaya').value)]
    };

    try {
        const response = await fetch('http://127.0.0.1:5000/predict', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }

        const result = await response.json();
        console.log('Prediction result from Python server:', result); // Debugging
        document.getElementById('result').textContent = 'Prediksi harga cabai: ' + result.predicted_price;

        // Kirim data ke server PHP untuk disimpan di database
        const formData = new FormData();
        formData.append('tahun', document.getElementById('tahun').value);
        formData.append('bulan', document.getElementById('bulan').value);
        formData.append('minggu', document.getElementById('minggu').value);
        formData.append('hari', document.getElementById('hari').value);
        formData.append('jumlahPasokan', document.getElementById('jumlahPasokan').value);
        formData.append('hariRaya', document.getElementById('hariRaya').value);
        formData.append('predicted_price', result.predicted_price);

        console.log('Data to be sent to PHP server:', Object.fromEntries(formData)); // Debugging

        await fetch('form_process.php', {
            method: 'POST',
            body: formData
        });

    } catch (error) {
        document.getElementById('result').textContent = 'Error: ' + error;
        console.error('Error:', error); // Debugging
    }
});

