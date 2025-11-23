<x-app-layout>
    <div class="flex justify-center flex-col items-center my-10">
        <h3 class="text-center font-bold text-2xl text-[#020817]">Cadastrar Estudente</h3>
        <span class="text-[#64748B]">Preencha os dados para cadastrar o novo estudente</span>

    </div>

        <div class=" flex flex-col items-center">
                <form class="flex flex-col justify-center items-start border border-[#E2E8F0] p-8 gap-4 w-[40%] rounded-md bg-white">
                        <span class="text-[#1A2856] font-bold text-lg">Novo Estudente</span>
                        <div class="flex flex-col w-full gap-2">
                        <label for="" class="text-[#020817] font-medium">Nome Completo</label>
                        <input type="text" name="" id="" placeholder="Digite o nome completo do aluno" class=" w-full border border-[#E2E8F0] text-[#64748B] text-base rounded-md">
                </div>
                <div class="flex flex-col w-full gap-2">
                        <label for="" class="text-[#020817] font-medium">CPF</label>
                        <input type="text" name="" id="" placeholder="000.000.000-00" class=" w-full border border-[#E2E8F0] text-[#64748B] text-base rounded-md">
                </div>
                <button class="bg-gradient-to-tr from-[#1A2856] to-[#334EA9] w-full h-12 rounded-md text-white font-semibold text-base">Cadastrar</button>
            </form>

        </div>
        
</x-app-layout>
