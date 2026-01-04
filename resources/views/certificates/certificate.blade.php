<x-app-layout>
    <div class="flex items-center justify-center mt-8">
        <div class="w-[60%] flex flex-col justify-center items-center gap-4">
            <div class="flex justify-between w-full">
                <a href="{{ url()->previous() }}" class="text-[#64748B] font-semibold text-sm felx gap-2">
                    <i class="ph ph-arrow-left"></i>
                    Voltar
                </a>
                <button onclick="downloadCertificate('{{$certificate->student->name}}')" class="bg-[#1A2856] text-white font-semibold text-sm px-4 py-2 rounded-md">
                    <i class="ph ph-download-simple"></i>
                    Download
                </button>
            </div>
            <div id="certificado" style="background-image: url('{{ asset('Certificate_BG.png') }}')"
                class="bg-cover bg-center h-[80vh] flex flex-col items-center justify-center px-14 py-14 rounded-md">
                <div class="flex items-start w-full">
                    <img src="{{ asset('Certificate_Ribbon.png') }}" alt="" class="absolute">
                </div>
                <div class="bg-white text-center p-8 rounded-lg shadow-lg h-full flex flex-col justify-center gap-4">
                    <h3 class="text-[#1A2856] text-2xl font-black">CERTIFICADO DE CONCLUSÃO</h3>
                    <p class="text-[#121621] text-sm">Este certificado comprova que</p>
                    <span
                        class="font-dancing-script text-5xl text-[#3B5AC2] font-bold my-4">{{ $certificate->student->name }}</span>
                    <p class="text-[#121621] text-sm">Concluiu com sucesso as seguintes atividades:</p>
                    <p class="text-[#121621] text-base">
                        Introdução ao Angular, Configuração com Angular CLI, Criação de componentes reutilizáveis,
                        Manipulação de dados, Implementação de data binding, Criação de rotas com Angular Router,
                        Consumo de
                        APIs REST
                    </p>
                    <span class="font-bold text-[#121621] text-sm mt-14">Emitido em 25/04/2025</span>
                    <div class="flex items-center justify-center mt-4">
                        <img src="{{ asset('Certificate_Signature.svg') }}" alt="">

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        async function downloadCertificate(name) {
            const div = document.getElementById('certificado');

            await Promise.all(Array.from(div.getElementsByTagName('img')).map(img => {
                if (!img.complete) {
                    return new Promise(resolve => {
                        img.onload = img.onerror = resolve;
                    });
                }
            }));

            const canvas = await html2canvas(div, {scale: 3});

            const imgData = canvas.toDataURL('image/png');

            const {jsPDF} = window.jspdf;
            const pdf = new jsPDF({
                orientation: 'landscape',
                unit: 'px',
                format: [canvas.width, canvas.height]
            });

            pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
            pdf.save(`Certificado ${name}.pdf`);
        }

    </script>

</x-app-layout>
