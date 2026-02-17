<x-app-layout>
    <div class="flex flex-col items-center">
        <div class="w-full lg:w-[60%] xl:w-[45%] flex flex-col justify-cernter items-center gap-6 px-4 lg:px-0">
            <div class="=flex items-start justify-start w-full">
                <a href="{{ url()->previous() }}" class="text-[#64748B] font-semibold text-sm flex gap-2 items-center mt-8">
                    <i class="ph ph-arrow-left"></i>
                    Voltar
                </a>
            </div>
            <h3 class="text-center font-bold text-2xl text-[#020817] mb-8">Estudante</h3>
            <div class="flex flex-col w-full">
                  <span for="" class="text-[#020817] font-bold">Nome Completo</span>
                  <p class="text-[#020817] font-base text-base">{{$student->name}}</p>
            </div>
            <div class="flex flex-col w-full">
                  <span for="" class="text-[#020817] font-bold">CPF</span>
                  <p class="text-[#020817] font-base text-base">{{$student->cpf}}</p>
            </div>
          </div>
    </div>
</x-app-layout>
