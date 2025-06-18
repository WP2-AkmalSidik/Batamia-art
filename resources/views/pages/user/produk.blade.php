@foreach ($produks as $produk)
    <div class="product-card bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-xl border border-gray-200 dark:border-gray-600 p-3 hover:shadow-lg hover:scale-105 transition-all duration-300 cursor-pointer flex flex-col h-full">
        <div class="relative">
            <img src="{{ Str::startsWith($produk->image, 'http') ? $produk->image : asset('storage/' . $produk->image) }}" alt="{{ $produk->nama }}"
                class="w-full h-32 object-cover rounded-lg mb-3">
            <div
                class="absolute top-2 right-2 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-300 px-2 py-1 rounded-full text-xs font-medium">
                Populer
            </div>
        </div>
        <div class="flex-1 flex flex-col">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 flex-1">
                {{ $produk->nama }}</h3>
            <p class="text-lg font-bold text-amber-600 dark:text-amber-400 mb-3">Rp. {{ $produk->harga }}</p>
            <div class="flex gap-2 justify-between">
                <a href="{{ route('user.produk.detail', $produk->id) }}"
                    class="w-auto bg-amber-500 hover:bg-amber-600 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-x-2">
                    <i class="fas fa-eye"></i>
                    <span>Detail</span>
                </a>
                <button
                    onclick="openCartModal('{{ $produk->nama }}', {{ $produk->harga }}, '{{ Str::startsWith($produk->image, 'http') ? $produk->image : asset('storage/' . $produk->image) }}',{{ $produk->id }})"
                    class="w-auto bg-amber-500 hover:bg-amber-600 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-x-2">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Tambah</span>
                </button>
            </div>
        </div>
    </div>
@endforeach
