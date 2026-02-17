<x-app-layout>
    <div class="flex justify-center flex-col items-center my-10">
        <h3 class="text-center font-bold text-2xl text-[#020817]">Cadastrar Estudante</h3>
        <span class="text-[#64748B] px-4 text-center">Preencha os dados para cadastrar o novo estudante</span>

    </div>

    <div class="flex flex-col items-center mx-4 lg:m-0">
        <form action="{{ route('student.store') }}" method="POST"
            class="flex flex-col justify-center items-start border border-[#E2E8F0] p-4 lg:p-8 gap-4 w-full lg:w-[60%] xl:w-[40%] rounded-md bg-white">
            @csrf
            <span class="text-[#1A2856] font-bold text-lg">Novo Estudante</span>
            <div class="flex flex-col w-full gap-2">
                <label for="" class="text-[#020817] font-medium">Nome Completo</label>
                <input type="text" name="name"
                       value="{{ old('name') }}"
                       placeholder="Digite o nome completo do aluno"
                       class="w-full border border-[#E2E8F0] text-[#64748B] text-base rounded-md">
            </div>
            <div class="flex flex-col w-full gap-2">
                <label for="" class="text-[#020817] font-medium">CPF</label>
                <input type="text" name="cpf"
                       value="{{ old('cpf') }}"
                       placeholder="000.000.000-00"
                       class="w-full border border-[#E2E8F0] text-[#64748B] text-base rounded-md">

            </div>
            <button type="submit"
                class="bg-gradient-to-tr from-[#1A2856] to-[#334EA9] w-full h-12 rounded-md text-white font-semibold text-base">Cadastrar</button>
        </form>

    </div>

    @if ($errors->any())
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 8000)" x-show="show"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-4 opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transform ease-in duration-300 transition"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-4 opacity-0"
            class="fixed bottom-5 left-1/2 -translate-x-1/2 w-[90%] max-w-md bg-red-600 text-white px-4 py-3 rounded-lg shadow-lg z-50">
            <div class="font-semibold mb-1">Ops! Algo deu errado</div>

            <ul class="text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="flex gap-1">
                        <span>•</span> {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cpfInput = document.querySelector('input[name="cpf"]');

            cpfInput.addEventListener("input", function (e) {
                let value = e.target.value.replace(/\D/g, "");

                if (value.length > 11) value = value.substring(0, 11);

                value = value.replace(/(\d{3})(\d)/, "$1.$2");
                value = value.replace(/(\d{3})(\d)/, "$1.$2");
                value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

                e.target.value = value;
            });
        });
    </script>


</x-app-layout>
