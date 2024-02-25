<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignments of teachers / Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ __('Create form') }}</h1>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ __('Enter the requested data') }}</p>
                        </div>

                        @if ($errors->any())
                            <div class="mx-auto w-full max-w-[550px] items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                @foreach ($errors->all() as $error)
                                    <div class="flex items-center my-1">
                                        <svg class=" flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">Alerta!</span> {{ $error }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('assignments.store') }}" method="POST">
                            @csrf
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">

                                    @include('assignments.form')

                                    <div class="p-2 w-full mt-10">
                                        <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-1 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send  </button>
                                    </div>
                                    <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                        <a href="{{ route('assignments.index') }}" class="w-full flex items-center justify-center px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                                            <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                            </svg>
                                            <span>Go back</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </section>


            </div>
        </div>
    </div>

    {{--        select2--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // Variables para almacenar los valores de los inputs antes de desactivarlos
        let selectedGradeValue = null;
        let selectedCourseValue = null;

        $("#grade").select2({
            maximumSelectionLength: 20,
            tags: true
        }).on("select2:select", function (e) {
            // Almacenar el valor antes de desactivar el selector de grade
            selectedGradeValue = $("#grade").val();

            // Asignar el valor al input hidden
            $("#hiddenGrade").val(selectedGradeValue);

            // Verificar si ya hay al menos una opción seleccionada en course
            if ($("#course").val() && $("#course").val().length > 0) {
                // Deshabilitar el selector de grade
                $("#grade").prop("disabled", true);
            }
        }).on("select2:unselect", function (e) {
            // Habilitar el selector de grade cuando se deseleccione una opción en course
            $("#grade").prop("disabled", false);
            // Restaurar el valor después de habilitar el selector de grade
            selectedGradeValue = null;
            // Limpiar el valor del input hidden
            $("#hiddenGrade").val("");
        });

        $("#course").select2({
            maximumSelectionLength: 20,
            tags: true
        }).on("select2:select", function (e) {
            // Almacenar el valor antes de desactivar el selector de course
            selectedCourseValue = $("#course").val();

            // Asignar el valor al input hidden
            $("#hiddenCourse").val(selectedCourseValue);

            // Verificar si ya hay al menos una opción seleccionada en grade
            if ($("#grade").val() && $("#grade").val().length > 0) {
                // Deshabilitar el selector de course
                $("#course").prop("disabled", true);
            }
        }).on("select2:unselect", function (e) {
            // Habilitar el selector de course cuando se deseleccione una opción en grade
            $("#course").prop("disabled", false);
            // Restaurar el valor después de habilitar el selector de course
            selectedCourseValue = null;
            // Limpiar el valor del input hidden
            $("#hiddenCourse").val("");
        });

        // Manejar el evento 'change' para habilitar ambos selectores cuando se eliminan las etiquetas
        $("#grade, #course").on("change", function (e) {
            if ($(this).val() === null || $(this).val().length === 0) {
                $("#grade, #course").prop("disabled", false);
            }
        });

        // Puedes acceder a los valores almacenados en selectedGradeValue y selectedCourseValue en cualquier momento.

    </script>
</x-app-layout>
