<!DOCTYPE html>
<html>
<head>
    <title>Praktikum Laravel</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    @foreach($mahasiswa as $mhs)
        <p>
            {{ $mhs->nama }} - {{ $mhs->nim }}
        </p>
    @endforeach

</body>
</html>