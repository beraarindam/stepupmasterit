@extends('backend.layouts.app')

@section('title', 'Manage Enquiries')
@section('breadcrumb', 'Contacts / Enquiries')

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Website Enquiries</h2>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="contactsTable" class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="py-3 px-4 font-semibold text-sm text-gray-600">ID</th>
                        <th class="py-3 px-4 font-semibold text-sm text-gray-600">Name</th>
                        <th class="py-3 px-4 font-semibold text-sm text-gray-600">Email</th>
                        <th class="py-3 px-4 font-semibold text-sm text-gray-600">Status</th>
                        <th class="py-3 px-4 font-semibold text-sm text-gray-600">Date Received</th>
                        <th class="py-3 px-4 font-semibold text-sm text-gray-600 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr
                            class="border-b border-gray-100 hover:bg-gray-50 {{ $contact->status == 'unread' ? 'bg-blue-50 font-medium' : '' }}">
                            <td class="py-3 px-4">{{ $contact->id }}</td>
                            <td class="py-3 px-4">{{ $contact->name }}</td>
                            <td class="py-3 px-4">{{ $contact->email }}</td>
                            <td class="py-3 px-4">
                                @if($contact->status == 'unread')
                                    <span class="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">New</span>
                                @else
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Read</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $contact->created_at->format('M d, Y h:i A') }}</td>
                            <td class="py-3 px-4 text-right">
                                <a href="{{ route('admin.contacts.show', $contact->id) }}"
                                    class="text-primary hover:text-blue-700 mr-3" title="View Message">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Delete this enquiry?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Delete Message">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#contactsTable').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
@endsection