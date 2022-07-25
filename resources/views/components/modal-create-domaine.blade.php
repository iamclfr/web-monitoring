<!-- Main modal -->
<div id="modal-creation-domaine" tabindex="-1" aria-hidden="true" class=" hidden fixed top-0 left-0 right-0 z-50 flex justify-center items-center w-full backdrop-blur-sm overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md p-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button id="btn-modal-close" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ajouter un Domaine</h3>
                <form class="space-y-6" method="POST" action="/wordpress" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-label for="domaine" :value="__('Nom de Domaine')" />
                        <x-input id="domaine" class="block mt-1 w-full lowercase" type="text" name="domaine" :value="old('domaine')" required autofocus />
                    </div>
                    <div>
                        <x-label for="type_site" :value="__('Technologie')" />
                        <x-select id="type_site" name="type_site" class="block mt-1 w-full" required>
                            <option selected disabled></option>
                            <option value="WordPress">WordPress</option>
                        </x-select>
                    </div>
                    <div>
                        <x-label for="serveur" :value="__('Serveur')" />
                        <x-select id="serveur" name="serveur" class="block mt-1 w-full" required>
                            <option selected disabled></option>
                            <option value="SyS-20">SyS-20</option>
                            <option value="SyS-31">SyS-31</option>
                            <option value="SyS-32">SyS-32</option>
                            <option value="SyS-36">SyS-36</option>
                            <option value="SyS-39">SyS-39</option>
                            <option value="SyS-52">SyS-52</option>
                            <option value="SyS-54">SyS-54</option>
                            <option value="Client">Client</option>
                            <option value="Dédié">Dédié</option>
                        </x-select>
                    </div>
                    <div>
                        <x-label for="php_version" :value="__('Version de PHP')" />
                        <x-input id="php_version" class="block mt-1 w-full" type="text" name="php_version" :value="old('php_version')" required />
                    </div>
                    <div>
                        <x-label for="backoffice" :value="__('BackOffice')" />
                        <x-input id="backoffice" class="block mt-1 w-full" type="url" name="backoffice" :value="old('backoffice')" required />
                    </div>
                    <div class="flex justify-between items-center">
                        <a href="admin/import" class="text-sm">Importer plusieurs Domaines ?</a>
                        <x-button class="">
                            {{ __('Ajouter') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
