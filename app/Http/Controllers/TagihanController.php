<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Services\TwilioService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // protected $twilio;

    // public function __construct(TwilioService $twilio)
    // {
    //     $this->twilio = $twilio;
    // }

    public function index()
    {
        $tagihan = Tagihan::with('penghuni')
            ->where('status', 'belum lunas')
            ->get();

        return view('tagihan.index', compact('tagihan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $tagihan = Tagihan::find($id);

        if (!$tagihan) {
            return redirect()->back()->with('error', 'Tagihan not found.');
        }

        $tagihan->status = 'lunas';
        $tagihan->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    // public function sendMessage(Request $request)
    // {
    //     $validated = $request->validate([
    //         'number' => '',
    //         'message' => '',
    //     ]);

    //     $number = $validated['number'];
    //     $message = $validated['message'];

    //     // Kirim data ke aplikasi Node.js (Baileys) melalui HTTP request
    //     $response = Http::post('http://localhost:3000/send', [
    //         'number' => $number,
    //         'message' => $message,
    //     ]);

    //     return response()->json([
    //         'success' => $response->successful(),
    //         'message' => $response->body(),
    //     ]);
    // }

    // public function sendWhatsAppMessage(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'to' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
    //     ]);

    //     $to = $request->input('to');
    //     $message = "Pesan otomatis yang telah diatur.";

    //     try {
    //         // Kirim pesan WhatsApp menggunakan Twilio
    //         $this->twilio->sendWhatsAppMessage($to, $message);

    //         return response()->json(['status' => 'Message sent successfully']);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'Failed to send message', 'error' => $e->getMessage()], 500);
    //     }
    // }


    // public function sendWhatsapp(Request $request)
    // {
    //     $jid = $request->input('jid');
    //     $message = 'Hello there!';

    //     try {
    //         $response = Http::post('http://127.0.0.1:3000/send-message', [
    //             'jid' => $jid,
    //             'message' => $message,
    //         ]);

    //         if ($response->successful()) {
    //             return redirect()->route('tagihan.index')->with('success', 'Message sent successfully!');
    //         } else {
    //             Log::error('Failed to send message. Response: ' . $response->body());
    //             return redirect()->route('tagihan.index')->with('error', 'Failed to send message.');
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error: ' . $e->getMessage());
    //         return redirect()->route('tagihan.index')->with('error', 'An error occurred: ' . $e->getMessage());
    //     }
    // }

    public function sendWhatsapp(Request $request)
    {
        $jid = $request->input('jid');
        $lantai = $request->input('lantai');
        $nomorKamar = $request->input('nomor_kamar');
        $namaPenghuni = $request->input('nama_penghuni');
        $totalTagihan = $request->input('total_tagihan');
        $tanggalJatuhTempo = $request->input('tanggal_jatuh_tempo');
        $message = sprintf(
            "Assalamu'alaikum Warahmatullahi Wabarakatuh,\n\n" .
                "Yth. Bapak/Ibu Orang Tua Penghuni Asrama,\n\n" .
                "Kami ingin menginformasikan bahwa tagihan untuk bulan ini atas nama %s dengan nomor kamar Lantai %s | Kamar %s sudah tersedia. Berikut adalah rincian tagihan:\n\n" .
                "- **Total Tagihan:** Rp. %s\n" .
                "- **Tanggal Jatuh Tempo:** %s\n\n" .
                "Mohon untuk melakukan pembayaran. Pembayaran dapat dilakukan melalui [METODE PEMBAYARAN] dengan nomor rekening [NOMOR REKENING] atau langsung ke [TEMPAT PEMBAYARAN].\n\n" .
                "Jika Bapak/Ibu membutuhkan informasi lebih lanjut atau memiliki pertanyaan, jangan ragu untuk menghubungi kami di [NOMOR KONTAK] atau [EMAIL].\n\n" .
                "Terima kasih atas perhatian dan kerjasamanya.\n\n" .
                "Wassalamu'alaikum Warahmatullahi Wabarakatuh,\n\n" .
                "[INFO KONTAK ASRAMA]",
            $namaPenghuni,
            $lantai,
            $nomorKamar,
            number_format($totalTagihan, 0, ',', '.'),
            $tanggalJatuhTempo
        );

        try {
            $response = Http::post('http://127.0.0.1:3000/send-message', [
                'jid' => $jid,
                'message' => $message,
            ]);

            if ($response->successful()) {
                return redirect()->route('tagihan.index')->with('success', 'Message sent successfully!');
            } else {
                Log::error('Failed to send message. Response: ' . $response->body());
                return redirect()->route('tagihan.index')->with('error', 'Failed to send message.');
            }
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            return redirect()->route('tagihan.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
