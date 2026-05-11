<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestão de Certificados</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.2"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="bg-[#F8FAFC] text-[#020817]">
    <header class="border-b border-[#E2E8F0] bg-white" style="padding: 1rem 14rem">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo.svg') }}" alt="Logo" class="h-12">
                <div class="flex flex-col">
                    <span class="font-bold text-xl text-[#1A2856]">
                        Gestão de Certificados
                    </span>
                    <span class="text-sm text-[#64748B]">
                        Plataforma de emissão e gerenciamento
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}"
                    class="h-10 px-5 border border-[#CBD5E1] rounded-md font-medium flex items-center hover:bg-slate-100 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="h-10 px-5 rounded-md bg-gradient-to-tr from-[#1A2856] to-[#334EA9] text-white font-semibold flex items-center">
                    Cadastro
                </a>
            </div>

        </div>
    </header>

    <section class="bg-[#F8FAFC]" style="padding: 1rem 14rem; height: 90vh;">
        <h1 class="mt-8 text-6xl lg:text-7xl font-black leading-[1.05] text-[#020817]">
            Certificados digitais com aparência profissional
        </h1>
        <p class="mt-8 text-xl text-[#64748B] leading-relaxed max-w-2xl">
            Automatize emissões, organize participantes,
            acompanhe históricos e gere certificados
            elegantes em poucos segundos.
        </p>
        <div class="flex flex-wrap gap-8 mt-14">
            <div>
                <h3 class="font-black text-3xl text-[#020817]">
                    +15 mil
                </h3>
                <span class="text-[#64748B]">
                    certificados emitidos
                </span>
            </div>
            <div>
                <h3 class="font-black text-3xl text-[#020817]">
                    +500
                </h3>

                <span class="text-[#64748B]">
                    eventos gerenciados
                </span>
            </div>
            <div>
                <h3 class="font-black text-3xl text-[#020817]">
                    100%
                </h3>

                <span class="text-[#64748B]">
                    online e automatizado
                </span>
            </div>
        </div>
        </div>
    </section>

    <footer class="relative border-t border-[#E2E8F0] bg-white overflow-hidden" style="padding: 1rem 14rem">
        <div class="px-4 py-16">
            <div class="flex items-center gap-3">
                <img src="{{ asset('logo.svg') }}" alt="Logo" class="h-12">
                <div class="flex flex-col">
                    <span class="font-bold text-xl text-[#1A2856]">
                        Gestão de Certificados
                    </span>
                    <span class="text-sm text-[#64748B]">
                        Plataforma de emissão e gerenciamento
                    </span>
                </div>
            </div>
            <div class=" mt-4 pt-6 flex flex-col lg:flex-row items-center justify-between gap-4">
                <span class="text-sm text-[#64748B] text-center lg:text-left">
                    © {{ date('Y') }} Gestão de Certificados. Todos os direitos reservados.
                </span>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-sm text-[#64748B] hover:text-[#1A2856] transition">
                        Política de Privacidade
                    </a>

                    <a href="#" class="text-sm text-[#64748B] hover:text-[#1A2856] transition">
                        Termos de Uso
                    </a>

                </div>

            </div>

        </div>
    </footer>
</body>

</html>

