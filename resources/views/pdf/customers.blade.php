<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            font-size: 15px;
        }
        table, td, th {
        border: 1px solid black;
        border-collapse: collapse
        }
        thead tr{
            background-color: rgb(198, 198, 198);
        }
        
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>NIK</td>
                <td>Nama Lengkap</td>
                <td>Tanggal Lahir</td>
                <td>Alamat Lengkap</td>
                <td>Nama Pemeriksaan</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $item)
            <tr>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                <td>{{ $item->birth_date }}</td>
                <td>{{ $item->full_address }}</td>
                <td>{{ $item->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>