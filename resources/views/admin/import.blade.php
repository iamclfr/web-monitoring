<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px ml-4">
                    <li class="mr-2">
                        <a href="{{ route('admin') }}" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Statistiques</a>
                    </li>
                    <li class="mr-2">
                        <a href="admin/import" class="inline-block p-4 text-gray-800 rounded-t-lg border-b-2 border-indigo-400 dark:text-blue-500 dark:border-blue-500" aria-current="page">Importer des Domaines</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500" title="En Développement">Supprimer des Domaines <sup class="text-yellow-500 font-bold">(dev)</sup></a>
                    </li>
                </ul>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between flex-wrap p-6 bg-white border-b border-gray-200">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
