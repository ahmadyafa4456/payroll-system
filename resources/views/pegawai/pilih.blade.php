<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="b">
    <div class="select-role-container">
        <div class="select-role-content">
            <div class="text-role">Pilih Pegawai</div>
            <div class="sr-container">
                @foreach($pegawai as $p)
                <div class="select-role">
                    <a href="/pegawai-absen?nama={{$p->nama}}&id={{$p->id}}">{{$p->nama}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function updateContainerOverflow() {
            const container = document.querySelector('.sr-container');
            const items = container.querySelectorAll('.select-role');

            if (items.length > 3) {
                container.style.overflowY = 'auto';
            } else {
                container.style.overflowY = 'hidden';
            }
        }
        updateContainerOverflow();
    </script>
</body>
</html>