<x-app-layout>
    <div class="flex justify-center flex-col items-center">
       <div class="flex justify-center flex-col items-center my-10">
            <h3 class="text-center font-bold text-2xl text-[#020817]">Certificados gerados</h3>
            <span class="text-[#64748B]">Visualize todos os certificados gerados</span>
        </div>

        @empty($certificates)
            <div class="flex justify-center flex-col items-center border border-[#E2E8F0] w-[50%] py-20 gap-4 rounded-md">
                <i class="ph ph-certificate text-[#64748B] text-6xl"></i>
                <div class="flex flex-col items-center">
                    <span class="text-[#1A2856] font-bold">Nenhum certificado gerado</span>
                <span class="text-[#64748B]">Gere certificados para consultar o histórico</span>
                </div>
                <button class="bg-[#1A2856] text-white font-semibold px-4 rounded-md h-10">Gerar certificado</button>
            </div>
        @endempty

        @isset($certificates)
            <div class="w-full lg:w-[60%] xl:w-[45%] flex flex-col justify-center items-center">
                @foreach($certificates as $certificate)
                    <div class="flex flex-col items-center justify-center mb-2 w-full">
                        <div class="flex border border-[#E2E8F0] p-4 gap-4 rounded-md w-full justify-center items-center ">
                            <div class="flex flex-col w-full">
                                <span class="text-[#020817] font-bold text-base">{{$certificate->student->name}}</span>
                                <span class="text-[#64748B]">Gerado em {{$certificate->created_at->format('d/m/Y')}}</span>
                            </div>
                            <a href="{{ route('certificate.show', ['certificateId' => encrypt($certificate->id)]) }}"
                                    class="flex bg-gradient-to-tr from-[#1A2856] to-[#334EA9] px-4 h-10 rounded-md text-white font-semibold text-base items-center justify-center">Ver</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
    </div>
</x-app-layout>
