<x-app-layout>
<div class="flex flex-col items-center">
    <h3 class="text-center font-bold text-2xl text-[#020817] my-8">Estudantes</h3>
    <div class="w-full lg:w-[60%] xl:w-[45%] flex flex-col justify-cernter items-center">
        @foreach($students as $student)
            <div class="flex flex-col items-center justify-center mb-2 w-full">
                <div class="flex border border-[#E2E8F0] p-4 gap-4 rounded-md w-full ">
                    <div class="flex flex-col w-full">
                        <span class="text-[#020817] font-bold text-base">{{$student->name}}</span>
                        <span class="text-[#64748B]">{{$student->created_at}}</span>
                    </div>
                    <a
                        href="{{route('student.show', encrypt($student->id)) }}"
                        class="bg-gradient-to-tr from-[#1A2856] to-[#334EA9] px-4 h-10 rounded-md text-white font-semibold text-base flex items-center justity-center">
                        Ver
                    </a>
                </div>
            </div>
        @endforeach
        <div class="flex items-start justify-start w-full mt-4">
            <a href="{{route('student.register')}}"
                    class="bg-gradient-to-tr from-[#1A2856] to-[#334EA9] h-12 rounded-md px-4 text-white font-semibold text-base flex items-center">
                Cadastrar novo estudante
            </a>
        </div>
    </div>
</div>

</x-app-layout>
