<x-app-layout>
    <style>
            /* Altura da caixa principal */
        .select2-container .select2-selection--single {
            height: 2.8rem; /* ajuste como quiser */
            border-radius: 0.375rem; /* mantém o rounded-md do Tailwind */
            border-color: #D1D5DB; /* gray-300 */
        }

        /* Alinhamento do texto dentro */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 2.8rem; /* mesma altura da caixa */
        }

        /* Altura da seta do lado direito */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 2.8rem; /* ajuste como quiser */
        }
    </style>
    <div class="flex justify-center flex-col items-center my-10">
        <h3 class="text-center font-bold text-2xl text-[#020817]">Geração de certificado</h3>
        <span class="text-[#64748B]">Preencha os dados para gerar um novo certificado</span>
    </div>

    <div class="flex flex-col items-center mx-4 lg:m-0">
        <form action="{{ route('student.store') }}" method="POST"
              class="flex flex-col justify-center items-start border border-[#E2E8F0] p-8 gap-4 w-full lg:w-[60%] xl:w-[40%] rounded-md bg-white">
            @csrf
            <span class="text-[#1A2856] font-bold text-lg">Novo certificado</span>
            <div class="flex flex-col w-full gap-2">
                <label for="" class="text-[#020817] font-medium">Estudante</label>
                <select name="student_id" id="student_id" class="select2 h-20 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecione um curso</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-full gap-2">
                <label for="" class="text-[#020817] font-medium">Atividade</label>
                <div class="flex gap-2">
                   <input type="text" name="cpf"
                          value=""
                          placeholder="Digite o título da atividade"
                          class="w-full border border-[#E2E8F0] text-[#64748B] text-base rounded-md">
                   <button type="button" class="flex  items-center justify-center px-4 gap-1 bg-gradient-to-tr from-[#1A2856] to-[#334EA9] h-12 rounded-md text-white font-semibold text-base">
                       <i class="ph ph-plus text-white"></i>
                       Adicionar
                   </button>
               </div>
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
        $(document).ready(function () {
            $('#student_id').select2({
                placeholder: 'Selecione um estudante',
                allowClear: true,
                width: '100%',

            });
        });
    </script>

</x-app-layout>
