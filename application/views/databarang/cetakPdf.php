<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid black;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Data Barang</h1>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $b) : ?>
                <tr>
                    <td><?= $b->kode_barang; ?></td>
                    <td><?= $b->nama_barang; ?></td>
                    <td><?= $b->keterangan; ?></td>
                    <td><?= $b->stok; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
