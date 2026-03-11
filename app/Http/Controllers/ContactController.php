<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminContactMail;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        // Send email to admin
        $adminEmail = get_setting('contact_email', 'arindambera49@gmail.com');
        if ($adminEmail) {
            try {
                Mail::to($adminEmail)->send(new AdminContactMail($contact));
            } catch (\Exception $e) {
                // Log or handle mail error silently or otherwise
                \Log::error('Mail could not be sent to ' . $adminEmail . ': ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }

    /**
     * Display a listing of the contacts (Admin Backend).
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified contact (Admin Backend).
     */
    public function show(Contact $contact)
    {
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }
        return view('backend.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact query deleted successfully.');
    }
}
