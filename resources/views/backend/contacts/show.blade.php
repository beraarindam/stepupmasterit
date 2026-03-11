@extends('backend.layouts.app')

@section('title', 'View Enquiry')
@section('breadcrumb')
    <a href="{{ route('admin.contacts.index') }}" class="hover:text-primary">Contacts</a> / View
@endsection

@section('content')
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 border-b border-gray-200 pb-2 flex-grow mr-4">Enquiry Details</h2>
            <a href="{{ route('admin.contacts.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300">
                <i class="fas fa-arrow-left mr-1"></i> Back
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 bg-gray-50 rounded-lg p-6 border border-gray-100">
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Name</p>
                <p class="text-gray-800 font-medium text-lg">{{ $contact->name }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Email</p>
                <p class="text-primary font-medium text-lg"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                </p>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Phone</p>
                <p class="text-gray-800 font-medium">{{ $contact->phone ?? 'Not Provided' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-wider mb-1">Date Received</p>
                <p class="text-gray-800 font-medium">{{ $contact->created_at->format('F d, Y - h:i A') }}</p>
            </div>
        </div>

        @if($contact->subject)
            <div class="mb-4">
                <h4 class="text-sm text-gray-500 font-bold uppercase tracking-wider mb-2 border-b border-gray-200 pb-2">Subject
                    / Interested In</h4>
                <p class="text-gray-800 font-medium text-lg">{{ $contact->subject }}</p>
            </div>
        @endif

        <div class="mt-8">
            <h4 class="text-sm text-gray-500 font-bold uppercase tracking-wider mb-3 border-b border-gray-200 pb-2">Message
                Content</h4>
            <div
                class="bg-gray-50 rounded-lg p-5 border-l-4 border-primary text-gray-700 leading-relaxed text-lg shadow-inner">
                {!! nl2br(e($contact->message)) !!}
            </div>
        </div>

        <div class="mt-10 flex justify-end">
            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-5 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 shadow-sm font-medium">
                    <i class="fas fa-trash-alt mr-2"></i> Delete Enquiry
                </button>
            </form>
        </div>
    </div>
@endsection