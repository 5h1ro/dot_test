<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Items
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <button wire:click="create()" class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Tambah
                    Barang</button>

                @if ($isModalOpen)
                    @include('livewire.modal')
                @endif

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">Kode</th>
                            <th class="px-4 py-2">Nama Barang</th>
                            <th class="px-4 py-2 w-32">Jenis Barang</th>
                            <th class="px-4 py-2 w-80">Deskripsi</th>
                            <th class="px-4 py-2 w-24">Jumlah Barang</th>
                            <th class="px-4 py-2 w-56">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="text-center">
                                <td class="border px-4 py-2">{{ $item->id }}</td>
                                <td class="border px-4 py-2">{{ $item->name }}</td>
                                <td class="border px-4 py-2">{{ $item->type->name }}</td>
                                <td class="border px-4 py-2 text-justify">{{ $item->description }}</td>
                                <td class="border px-4 py-2">{{ $item->quantity }} Unit</td>
                                <td class="border px-4 py-2">
                                    <button wire:click="edit('{{ $item->id }}')"
                                        class="bg-indigo-500 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>
                                    <button wire:click="delete('{{ $item->id }}')"
                                        class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
