<x-app-layout>
    <style>
        .select2-container .select2-selection--single {
            height: 2.8rem;
            border-radius: 0.375rem;
            border-color: #D1D5DB;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 2.8rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 2.8rem;
        }
    </style>

    <div class="flex justify-center flex-col items-center my-10">
        <h3 class="text-center font-bold text-2xl text-[#020817]">Geração de certificado</h3>
        <span class="text-[#64748B]">Preencha os dados para gerar um novo certificado</span>
    </div>

    <div class="flex flex-col items-center mx-4 lg:m-0">

        <form action="{{ route('certificate.store') }}" method="POST"
              class="flex flex-col gap-4 w-full lg:w-[60%] xl:w-[40%] border border-[#E2E8F0] p-8 rounded-md bg-white">
            @csrf

            <span class="text-[#1A2856] font-bold text-lg">Novo certificado</span>

            <!-- Estudante -->
            <div class="flex flex-col w-full gap-2">
                <label class="text-[#020817] font-medium">Estudante</label>
                <select name="student_id" id="student_id"
                        class="select2 w-full rounded-md border-gray-300">
                    <option value="">Selecione um estudante</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Atividades -->
            <div class="flex flex-col w-full gap-2">
                <label class="text-[#020817] font-medium">Atividades</label>

                <div class="flex gap-2">
                    <input type="text" id="activity_input"
                           placeholder="Digite o título da atividade"
                           class="w-full border border-[#E2E8F0] text-[#64748B] rounded-md px-3">

                    <button type="button" onclick="addActivity()"
                            class="flex items-center px-4 gap-1 bg-gradient-to-tr from-[#1A2856] to-[#334EA9] h-12 rounded-md text-white font-semibold">
                        <i class="ph ph-plus"></i>
                        Adicionar
                    </button>
                </div>

                <!-- Lista de atividades -->
                <ul id="activity_list" class="flex flex-col gap-2 mt-2"></ul>
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="bg-gradient-to-tr from-[#1A2856] to-[#334EA9] w-full h-12 rounded-md text-white font-semibold">
                Cadastrar
            </button>

        </form>
    </div>

    <!-- Erros -->
    @if ($errors->any())
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 8000)" x-show="show"
             class="fixed bottom-5 left-1/2 -translate-x-1/2 w-[90%] max-w-md bg-red-600 text-white px-4 py-3 rounded-lg shadow-lg z-50">
            <div class="font-semibold mb-1">Ops! Algo deu errado</div>
            <ul class="text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Scripts -->
    <script>
        $(document).ready(function () {
            $('#student_id').select2({
                placeholder: 'Selecione um estudante',
                allowClear: true,
                width: '100%'
            });
        });

        function addActivity() {
            const input = document.getElementById('activity_input');
            const list = document.getElementById('activity_list');

            if (input.value.trim() === '') return;

            const li = document.createElement('li');
            li.className = 'flex items-center justify-between bg-gray-100 px-3 py-2 rounded-md';

            li.innerHTML = `
                <span class="text-sm text-[#020817]">${input.value}</span>
                <button type="button" onclick="this.parentElement.remove()"
                        class="text-red-600 font-semibold text-xl">
                        <i class="ph ph-x"></i>
                </button>
                <input type="hidden" name="activities[]" value="${input.value}">
            `;

            list.appendChild(li);
            input.value = '';
        }
    </script>

</x-app-layout>
