<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Tampilan Halaman Kontak
     */
    public function index()
    {
        $services = Service::published()->orderBy('name')->get();

        return view('public.contact', compact('services'));
    }

    /**
     * Simpan Pesan Konsultasi Proyek
     */
    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect()->route('contact')
            ->with('success', 'Terima kasih atas kepercayaan Anda! Tim strategic ARAH Creative akan segera menghubungi Anda dalam 1x24 jam kerja.');
    }
}
