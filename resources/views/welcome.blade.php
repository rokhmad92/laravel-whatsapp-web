<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body>
    <form action="/" method="POST">
        @csrf
        <lable for="nomer">nomer :</label>
            <input type="text" name="nomer" id="nomer">
            <br>
            <lable for="pesan">pesan :</label>
                <input type="text" name="pesan" id="pesan">

                <button type="submit">Kirim</button>
    </form>

    <br><br>

    <p>tunggu 30 detik</p>
    <div id="qrCodeContainer"></div>

    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        const qrcodeContainer = document.getElementById("qrCodeContainer");

        // get qrCode
        fetch("http://localhost:3000")
            .then(res => res.json())
            .then(data => {
                if (data.data == 200) {
                    qrcodeContainer.textContent = 'Client Is Ready';
                } else {
                    if (qrcodeContainer) {
                        qrcodeContainer.innerHTML = "";
                        const qrcode = new QRCode(qrcodeContainer, {
                            text: data.data,
                            width: 256,
                            height: 256,
                        });
                        console.log("Data received:", data.data);
                    } else {
                        console.error("QR code container element not found.");
                    }
                }
            })
            .catch(error => {
                console.error("An error occurred:", error);
            });

        function refreshPage() {
            location.reload();
        }
        setInterval(refreshPage, 30000);
    </script>
</body>

</html>
