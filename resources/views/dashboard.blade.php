<x-app-layout>
    <div class="flex justify-center flex-col items-center">
           <div class="flex justify-center flex-col items-center my-10">
        <h3 class="text-center font-bold text-2xl text-[#020817]">Certificados gerados</h3>
        <span class="text-[#64748B]">Visualize todos os certificados gerados</span>

    </div>

    <div class="flex justify-center flex-col items-center border border-[#E2E8F0] w-[50%] py-20 gap-4 rounded-md">
        <i class="ph ph-certificate text-[#64748B] text-6xl"></i>
        <div class="flex flex-col items-center">
            <span class="text-[#1A2856] font-bold">Nenhum certificado gerado</span>
        <span class="text-[#64748B]">Gere certificados para consultar o histórico</span>
        </div>
        <button class="bg-[#1A2856] text-white font-semibold px-4 rounded-md h-10">Gerar certificado</button>
    </div>
    </div>
</x-app-layout>
