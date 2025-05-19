<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Dokumen</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 15mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        td {
            padding-top: 5px;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <div class="book" id="result">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const getData = async () => {
            await axios.get('http://localhost:3000')
                .then((response) => {
                    const profiles = response.data;

                    let text = "";
                    profiles.forEach(element => {
                        text += `
                        <div class="page">
                            <h2 style="text-align: center;">SURAT PERNYATAAN</h2>
                            <p style="margin-top: 50px; margin-bottom: 30px;">Saya yang bertanda tangan dibawah ini:</p>
                            <table>
                                <tr>
                                <td style="width: 100px;">Nama</td>
                                <td>:</td>
                                <td>&nbsp;${element.name}</td>
                                </tr>
                                <tr>
                                <td style="width: 100px;">Tanggal</td>
                                <td>:</td>
                                <td>&nbsp;${element.date}</td>
                                </tr>
                                <tr>
                                <td style="width: 100px;">Alasan</td>
                                <td>:</td>
                                <td>&nbsp;${element.reason}</td>
                                </tr>
                            </table>
                            <p style="margin-top: 30px;line-height:1.5;">${element.content}</p>
                            <div style="margin-top: 80px;float:right">
                                <div style="width: 250px;text-align: left;">
                                <p>.................... , ......................</p>
                                <p>Pengirim</p>
                                <p style="margin-top: 80px;">(${element.name})</p>
                                </div>
                            </div>
                        </div>
                        `
                    });
                    document.getElementById('result').innerHTML = text;
                })
                .catch((error) => {
                    console.log(error);
                });
        }

        getData();
    </script>
</body>

</html>
