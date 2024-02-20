<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mx-72">
                    <h2 class="text-2xl font-semibold mb-6 mx-auto text-center">Editar Estudiante</h2>
                    <form action="{{ route('students.update', $student) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        @include('students.form')

                        <div class="flex justify-around">
                            <a href="{{ route('students.index') }}" class="flex items-center bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                                Regresar
                            </a>
                            <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>