@extends('public.layouts.app')

@section('title', 'Katalog Produk')

@section('content')
<!-- Page Header -->
<section class="bg-[#422812] text-[#F7F1E1] py-16 relative">
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(circle at 1px 1px, #F7F1E1 1px, transparent 0); background-size: 20px 20px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
        <span class="text-xs font-bold uppercase tracking-widest text-[#D0A97A]">Katalog Terpadu</span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-serif-display">Katalog Produk Kami</h1>
        <div class="w-12 h-1 bg-[#4A6B3D] mx-auto rounded"></div>
    </div>
</section>

<!-- Product Section (with Alpine.js for interactive modal & filter) -->
<section class="py-20 bg-[#F7F1E1]" x-data="{
    selectedProduct: null,
    quantity: 1,
    note: '',
    openModal: false,
    whatsappNumber: '{{ preg_replace('/[^0-9]/', '', \App\Models\ContactInfo::first()->whatsapp_number ?? '6281234567890') }}',
    
    openProductDetails(product) {
        this.selectedProduct = product;
        this.quantity = 1;
        this.note = '';
        this.openModal = true;
    },
    
    get whatsappUrl() {
        if (!this.selectedProduct) return '#';
        let msg = 'Halo Gula Aren Gonoharjo,\n\nSaya ingin memesan produk:\n' + 
                  '- Produk: ' + this.selectedProduct.name + '\n' +
                  '- Jumlah: ' + this.quantity + ' pcs\n';
        if (this.note) {
            msg += '- Catatan: ' + this.note + '\n';
        }
        msg += '\nTerima kasih.';
        return 'https://api.whatsapp.com/send?phone=' + this.whatsappNumber + '&text=' + encodeURIComponent(msg);
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filters -->
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            <a href="{{ route('products', ['category' => 'semua']) }}" class="px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-colors duration-200 border border-[#6F4520]/15 {{ !$category || $category == 'semua' ? 'bg-[#6F4520] text-[#F7F1E1] border-transparent' : 'bg-[#FAF7EE] text-[#6F4520] hover:bg-[#EFE8D3]' }}">
                Semua Produk
            </a>
            <a href="{{ route('products', ['category' => 'gula_semut']) }}" class="px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-colors duration-200 border border-[#6F4520]/15 {{ $category == 'gula_semut' ? 'bg-[#6F4520] text-[#F7F1E1] border-transparent' : 'bg-[#FAF7EE] text-[#6F4520] hover:bg-[#EFE8D3]' }}">
                Gula Semut
            </a>
            <a href="{{ route('products', ['category' => 'gula_cetak']) }}" class="px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-colors duration-200 border border-[#6F4520]/15 {{ $category == 'gula_cetak' ? 'bg-[#6F4520] text-[#F7F1E1] border-transparent' : 'bg-[#FAF7EE] text-[#6F4520] hover:bg-[#EFE8D3]' }}">
                Gula Cetak
            </a>
            <a href="{{ route('products', ['category' => 'gula_cair']) }}" class="px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider transition-colors duration-200 border border-[#6F4520]/15 {{ $category == 'gula_cair' ? 'bg-[#6F4520] text-[#F7F1E1] border-transparent' : 'bg-[#FAF7EE] text-[#6F4520] hover:bg-[#EFE8D3]' }}">
                Gula Cair
            </a>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($products as $product)
                <div class="bg-[#FAF7EE] rounded-xl overflow-hidden border border-[#6F4520]/10 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col group justify-between">
                    
                    <div>
                        <!-- Product Image -->
                        <div class="relative h-64 bg-gradient-to-br from-[#EFE8D3] to-[#E5DCBE] overflow-hidden flex items-center justify-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="text-center p-6 space-y-3 text-[#6F4520]/60">
                                    <i class="fa-solid fa-box-open text-5xl"></i>
                                    <span class="block text-xs uppercase font-semibold tracking-wider">Foto belum diunggah</span>
                                </div>
                            @endif
                            <span class="absolute top-4 right-4 px-3 py-1 bg-[#4A6B3D] text-[#F7F1E1] text-[10px] font-bold uppercase tracking-wider rounded-full shadow-sm">
                                @if($product->category == 'gula_semut')
                                    Gula Semut
                                @elseif($product->category == 'gula_cetak')
                                    Gula Cetak
                                @else
                                    Gula Cair
                                @endif
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-6 space-y-3">
                            <h3 class="font-sans-display font-bold text-lg text-[#6F4520] group-hover:text-[#4A6B3D] transition-colors duration-200">{{ $product->name }}</h3>
                            <p class="text-xs text-[#756C5C] leading-relaxed line-clamp-3 font-light">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Bottom Price & Action -->
                    <div class="p-6 pt-0">
                        <div class="pt-6 border-t border-[#6F4520]/5 flex items-center justify-between">
                            <span class="text-lg font-bold text-[#6F4520] font-sans-display">
                                Rp {{ number_format($product->price, 0, ',', '.') }}<span class="text-xs text-[#756C5C] font-normal">/pcs</span>
                            </span>
                            
                            <!-- Action to trigger details modal -->
                            <button @click="openProductDetails({{ json_encode($product) }})" class="px-4 py-2 bg-[#6F4520] hover:bg-[#8B5A2B] text-[#F7F1E1] text-[11px] font-bold uppercase tracking-wider rounded-lg shadow-sm hover:shadow transition-all duration-200">
                                Detail & Pesan
                            </button>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-3 text-center py-24 text-[#756C5C]">
                    <i class="fa-solid fa-face-frown text-5xl mb-4 opacity-50"></i>
                    <p class="text-base font-light">Tidak ada produk yang aktif dalam kategori ini.</p>
                </div>
            @endforelse
        </div>

    </div>

    <!-- Product Details Modal (Backdrop) -->
    <div class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/55 backdrop-blur-sm transition-opacity duration-300" 
         x-show="openModal" 
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;"
         @click.away="openModal = false">
        
        <!-- Modal Content Plaque -->
        <div class="bg-[#F7F1E1] rounded-2xl overflow-hidden border-2 border-[#8B5A2B] shadow-2xl max-w-2xl w-full flex flex-col md:flex-row relative transform transition-all duration-300"
             x-show="openModal"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
             
             <!-- Close Button -->
             <button @click="openModal = false" class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-black/40 hover:bg-[#6F4520] text-[#F7F1E1] flex items-center justify-center transition-colors">
                 <i class="fa-solid fa-xmark"></i>
             </button>

             <!-- Left Column: Product Photo -->
             <div class="w-full md:w-1/2 h-64 md:h-auto bg-[#E5DCBE] relative flex items-center justify-center">
                <template x-if="selectedProduct && selectedProduct.image">
                    <img :src="'/storage/' + selectedProduct.image" :alt="selectedProduct.name" class="w-full h-full object-cover">
                </template>
                <template x-if="!selectedProduct || !selectedProduct.image">
                    <div class="text-center p-8 text-[#6F4520]/50 space-y-2">
                        <i class="fa-solid fa-box-open text-6xl"></i>
                        <span class="block text-xs uppercase font-bold tracking-wider">Foto Produk</span>
                    </div>
                </template>
             </div>

             <!-- Right Column: Product Form & Details -->
             <div class="w-full md:w-1/2 p-8 space-y-6 flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="inline-block px-3 py-1 bg-[#4A6B3D] text-[#F7F1E1] text-[9px] font-bold uppercase tracking-wider rounded-full shadow-sm"
                          x-text="selectedProduct ? (selectedProduct.category == 'gula_semut' ? 'Gula Semut' : (selectedProduct.category == 'gula_cetak' ? 'Gula Cetak' : 'Gula Cair')) : ''">
                    </span>
                    <h2 class="text-xl font-bold font-serif-display text-[#6F4520]" x-text="selectedProduct ? selectedProduct.name : ''"></h2>
                    <div class="text-lg font-bold text-[#6F4520] font-sans-display" x-text="selectedProduct ? 'Rp ' + new Intl.NumberFormat('id-ID').format(selectedProduct.price) : ''"></div>
                    <p class="text-xs text-[#756C5C] leading-relaxed font-light" x-text="selectedProduct ? selectedProduct.description : ''"></p>
                </div>

                <!-- Ordering quick interactive inputs -->
                <div class="space-y-4 pt-4 border-t border-[#6F4520]/10">
                    <div class="flex items-center justify-between gap-4">
                        <label class="text-xs font-bold text-[#6F4520] uppercase tracking-wider">Jumlah</label>
                        <div class="flex items-center border border-[#6F4520]/30 rounded-lg overflow-hidden bg-white">
                            <button @click="if(quantity > 1) quantity--" class="px-3 py-1 text-sm font-bold text-[#6F4520] hover:bg-[#EFE8D3]">-</button>
                            <input type="number" x-model.number="quantity" class="w-12 text-center text-xs font-bold text-[#6F4520] border-none focus:ring-0 p-1" min="1">
                            <button @click="quantity++" class="px-3 py-1 text-sm font-bold text-[#6F4520] hover:bg-[#EFE8D3]">+</button>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-[#6F4520] uppercase tracking-wider block">Catatan Tambahan</label>
                        <textarea x-model="note" rows="2" placeholder="Tulis catatan (misal: ukuran, kemasan, dll.)" class="w-full text-xs p-2 rounded-lg border border-[#6F4520]/20 bg-white focus:outline-none focus:border-[#6F4520] text-[#6F4520]"></textarea>
                    </div>

                    <a :href="whatsappUrl" target="_blank" class="w-full inline-flex items-center justify-center gap-2 py-3 bg-[#4A6B3D] hover:bg-[#5C7A4A] text-[#F7F1E1] font-bold text-xs uppercase tracking-wider rounded-lg shadow-md transition-colors">
                        <i class="fa-brands fa-whatsapp text-lg"></i> Pesan via WhatsApp
                    </a>
                </div>
             </div>

        </div>
    </div>
</section>
@endsection
