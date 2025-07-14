@foreach ($produks as $produk)
    <div
        class="product-card bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-xl border border-gray-200 dark:border-gray-600 p-3 hover:shadow-lg hover:scale-[1.02] transition-all duration-300 cursor-pointer flex flex-col h-full">
        <div class="relative flex-1">
            <a href="{{ route('user.produk.detail', $produk->id) }}" class="block h-full">
                <img src="{{ Str::startsWith($produk->image, 'http') ? $produk->image : asset('storage/' . $produk->image) }}"
                    alt="{{ $produk->nama }}" class="w-full h-full max-h-40 object-cover rounded-lg">
            </a>
            <div
                class="absolute top-2 right-2 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-300 px-2 py-1 rounded-full text-xs font-medium">
                {{ $produk->kategori->nama ?? '-' }}
            </div>
        </div>
        <div class="mt-3 flex flex-col flex-1">
            <a href="{{ route('user.produk.detail', $produk->id) }}" class="block">
                <h3
                    class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 hover:text-amber-600 dark:hover:text-amber-400 transition-colors">
                    {{ $produk->nama }}
                </h3>
            </a>
            <p class="text-lg font-bold text-amber-600 dark:text-amber-400 mb-3">Rp
                {{ number_format($produk->harga, 0, ',', '.') }}</p>

            <div class="mt-auto grid grid-cols-2 gap-2">
                <!-- Tombol Detail -->
                <a href="{{ route('user.produk.detail', $produk->id) }}"
                    class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-x-2">
                    <span>Detail</span>
                    {{-- <i class="fa-solid fa-eye"></i> --}}
                </a>
                <!-- Tombol Keranjang -->
                @if (auth()->check() && auth()->user()->role == 'user')
                    <button
                        onclick="openCartModal('{{ $produk->nama }}', {{ $produk->harga }}, '{{ Str::startsWith($produk->image, 'http') ? $produk->image : asset('storage/' . $produk->image) }}',{{ $produk->id }})"
                        class="bg-amber-500 hover:bg-amber-600 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-x-2">
                        {{-- <span>Keranjang</span> --}}
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                @endif
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-amber-500 hover:bg-amber-600 text-white py-2 px-3 rounded-lg text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-x-2">
                        {{-- <span>Keranjang</span> --}}
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                @endguest
            </div>
        </div>
    </div>
@endforeach
