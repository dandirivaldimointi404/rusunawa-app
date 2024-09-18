<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Services\TwilioService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function index()
    {
        $tagihan = Tagihan::with('penghuni')
            ->where('status', 'cicil')
            ->get();

        return view('tagihan.index', compact('tagihan'));
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

    public function sendWhatsAppMessage(Request $request)
    {
        // Validasi input
        $request->validate([
            'to' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
        ]);

        $to = $request->input('to');
        $message = "Pesan otomatis yang telah diatur.";

        try {
            // Kirim pesan WhatsApp menggunakan Twilio
            $this->twilio->sendWhatsAppMessage($to, $message);

            return response()->json(['status' => 'Message sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Failed to send message', 'error' => $e->getMessage()], 500);
        }
    }
}
