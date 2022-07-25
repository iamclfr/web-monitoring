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
                        <a href="{{ route('admin') }}" class="inline-block p-4 text-gray-800 rounded-t-lg border-b-2 border-indigo-400 dark:text-blue-500 dark:border-blue-500">Statistiques</a>
                    </li>
                    <li class="mr-2">
                        <a href="admin/import" class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Importer des Domaines</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500" title="En Développement">Supprimer des Domaines <sup class="text-yellow-500 font-bold">(dev)</sup></a>
                    </li>
                </ul>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-evenly flex-wrap p-6 bg-white border-b border-gray-200">
                    <div class="relative w-72 overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex justify-center items-center flex-wrap p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 w-full text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Nombre de Domaines</h5>
                            <p class="font-normal text-center text-3xl text-gray-700 dark:text-gray-400">{{ $domaines->count() }}</p>
                        </div>
                    </div>
                    <div class="relative w-72 overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex justify-center items-center flex-wrap p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 w-full text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Nombre de Sauvegardes</h5>
                            <p class="font-normal text-center text-3xl text-gray-700 dark:text-gray-400">{{ $sauvegardes->count() }}</p>
                        </div>
                    </div>
                    <div class="relative w-72 overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex justify-center items-center flex-wrap p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h5 class="mb-2 w-full text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Etat de Sante</h5>
                            <p class="font-normal text-center px-2 rounded-lg bg-green-100 text-3xl mr-2 text-green-800 dark:text-gray-400">{{ $etat_bien }}</p>
                            <p class="font-normal text-center px-2 rounded-lg bg-yellow-100 text-3xl mr-2 text-yellow-800 dark:text-gray-400">{{ $etat_moyen }}</p>
                            <p class="font-normal text-center px-2 rounded-lg bg-red-100 text-3xl text-red-800 dark:text-gray-400">{{ $etat_mauvais }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
