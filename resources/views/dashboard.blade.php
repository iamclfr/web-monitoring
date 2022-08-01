<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap justify-between items-center ">
                        <a href="/wordpress" class="relative w-72 my-2 overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex justify-center items-center flex-wrap p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h5 class="w-full text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Accèder aux Domaines</h5>
                            </div>
                        </a>
                        <a href="/admin/import" class="relative w-72 my-2 overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex justify-center items-center flex-wrap p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h5 class="w-full text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Importer des Domaines</h5>
                            </div>
                        </a>
                        <a href="/admin/export" class="relative w-72 my-2 overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex justify-center items-center flex-wrap p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h5 class="w-full text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Exporter les Domaines</h5>
                            </div>
                        </a>
                        <a href="/admin" class="relative w-72 my-2 overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex justify-center items-center flex-wrap p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h5 class="w-full text-xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Accèder aux Statistiques</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
