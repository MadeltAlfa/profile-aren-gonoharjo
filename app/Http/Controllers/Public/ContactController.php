<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $contact = ContactInfo::first() ?? new ContactInfo([
            'address' => 'Desa Gonoharjo, RT 02 RW 01, Kecamatan Limbangan, Kabupaten Kendal, Jawa Tengah 51383',
            'phone' => '081234567890',
            'email' => 'aren@gonoharjo.desa.id',
            'operating_hours' => 'Setiap Hari: 08:00 - 17:00 WIB',
            'map_lat' => -7.1189,
            'map_lng' => 110.3168,
            'whatsapp_number' => '6281234567890',
        ]);

        $products = Product::where('is_active', true)->get();

        return view('public.contact', compact('contact', 'products'));
    }

    public function storeOrder(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
        ]);

        // Save order to database
        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'phone' => $validated['phone'],
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'note' => $validated['note'] ?? '',
            'status' => 'baru',
        ]);

        // Get product details
        $product = Product::find($validated['product_id']);

        // Get contact/whatsapp info
        $contact = ContactInfo::first();
        $waNumber = $contact ? $contact->whatsapp_number : '6281234567890';
        // Clean whatsapp number (remove plus, spaces, etc.)
        $waNumber = preg_replace('/[^0-9]/', '', $waNumber);

        // Format message
        $message = "Halo Gula Aren Gonoharjo,\n\nSaya ingin memesan produk berikut:\n";
        $message .= "- Produk: " . $product->name . "\n";
        $message .= "- Jumlah: " . $validated['quantity'] . " pcs\n";
        $message .= "- Nama Pemesan: " . $validated['customer_name'] . "\n";
        $message .= "- No. HP: " . $validated['phone'] . "\n";
        if (!empty($validated['note'])) {
            $message .= "- Catatan: " . $validated['note'] . "\n";
        }
        $message .= "\nTerima kasih.";

        $waUrl = "https://api.whatsapp.com/send?phone=" . $waNumber . "&text=" . urlencode($message);

        return redirect()->back()->with([
            'success' => 'Pesanan berhasil disimpan di sistem! Silakan klik tombol kirim WhatsApp di bawah ini untuk meneruskan pesanan Anda langsung ke Whatsapp pengelola.',
            'whatsapp_url' => $waUrl
        ]);
    }
}
