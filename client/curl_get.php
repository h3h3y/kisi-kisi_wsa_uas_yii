<?php

//mengambil data
$targetUrl = "http://localhost:90/wsauas/web/mahasiswa";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//untuk berarer
$header = [
    'Authorization: Bearer 100-token'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$out = curl_exec($ch);
curl_close($ch);
$data = json_decode($out);
?>

<h1>Data Mahasiswa</h1>
<br>
<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelas</th>
    </tr>
    <?php $no=1; ?>
    <?php foreach($data as $d): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $d->nim ?></td>
            <td><?= $d->nama ?></td>
            <td><?= $d->kelas ?></td>
        </tr>
        <?php $no++ ?>
    <?php endforeach ?>
</table>

<style>
    th,td{
        border: 1px solid black;
        padding: 1em;
    }
    tr:nth-child(odd){
        background-color: #ccc;
    }
    table{
        border-collapse: collapse;
        padding: 1em;
        box-shadow: 5px 10px #ccc;
    }
    .btn-success{
        padding: 10px;
        margin-bottom: 2px;
        box-shadow: 5px, 5px, #ccc;
        background-color: #ccd5ae;
    }
    .btn-success:hover{
        color: white;
        background-color: #344e41;
        transition: 0.5s;
    }
    .btn-hapus{
        padding: 5px;
        box-shadow: 2px 2px #ccc;
        background-color: red;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }
    .btn-edit{
        padding: 5px;
        box-shadow: 2px 2px #ccc;
        background-color: orange;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }
</style>