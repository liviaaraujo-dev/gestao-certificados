<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Certificado</title>

    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            height: 100%;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .page {
            width: 100%;
            height: 100%;
            position: relative;
            background-image: url("{{ public_path('Certificate_BG.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .ribbon {
            position: absolute;
            top: 10px;
            left: 20px;
            width: 100px;
            z-index: 10;
        }

        .container {
            position: absolute;
            left: 60px;
            right: 60px;
            bottom: 40px;
            top: 40px;
            background: #ffffff;
            border-radius: 12px;
            text-align: center;
            padding: 20px 50px;
            z-index: 1;
        }

        .title {
            color: #1A2856;
            font-size: 34px;
            font-weight: bold;
            margin-bottom: 15px;
            margin-top: 40px;   
        }

        .subtitle {
            font-size: 16px;
            color: #121621;
            margin-bottom: 10px;
        }

        .name {
            font-size: 52px;
            color: #3B5AC2;
            font-weight: bold;
            margin: 30px 0;
            word-wrap: break-word;
        }

        .tasks {
            font-size: 18px;
            color: #121621;
            margin-top: 10px;
            line-height: 1.5;
        }

        .date {
            font-size: 16px;
            font-weight: bold;
            margin-top: 100px;
        }

        .signature{
            margin-top: 2rem;   
        }

        .signature img {
            width: 100px;
            bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="page">

        <img src="{{ public_path('Certificate_Ribbon.png') }}" class="ribbon">

        <div class="container">

            <div class="title">
                CERTIFICADO DE CONCLUSÃO
            </div>

            <div class="subtitle">
                Este certificado comprova que
            </div>

            <div class="name">
                {{ $certificate->student->name }}
            </div>

            <div class="subtitle">
                Concluiu com sucesso as seguintes atividades:
            </div>

            <div class="tasks">
                @foreach ($certificate->tasks as $task)
                    {{ $task->title }}@if(!$loop->last);@endif
                @endforeach
            </div>

            <div class="date">
                Emitido em {{ $certificate->created_at->format('d/m/Y') }}
            </div>

            <div class="signature">
                <img src="{{ public_path('Certificate_Signature.svg') }}">
            </div>

            

        </div>
    </div>
</body>

</html>
