@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 5000)"
         x-show="show"
         class="fixed bottom-8 right-6 bg-blue-500 text-white text-sm py-2 px-4 rounded-xl shadow-md ">
        <p>{{ session('success') }}</p>
    </div>
@endif
