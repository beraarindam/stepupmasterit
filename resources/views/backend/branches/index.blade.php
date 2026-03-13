@extends('backend.layouts.app')
@section('title', 'Manage Branches')
@section('breadcrumb', 'Admin / Branches')
@section('content')
    <div class="space-y-6 animate-fade-in-up">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Branches / Contact Locations 📍</h2>
                <p class="text-gray-500 mt-1">Add and manage multiple branch offices shown on the Contact page.</p>
            </div>
            <div>
                <a href="{{ route('admin.branches.create') }}"
                    class="bg-primary hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add New Branch
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 text-green-600 p-4 rounded-lg flex items-center shadow-sm border border-green-100">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden p-6">
            <div class="overflow-x-auto">
                <table id="branch-table" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                            <th class="px-6 py-4 font-medium">#</th>
                            <th class="px-6 py-4 font-medium">Branch Name</th>
                            <th class="px-6 py-4 font-medium">Address</th>
                            <th class="px-6 py-4 font-medium">Phone</th>
                            <th class="px-6 py-4 font-medium">Status</th>
                            <th class="px-6 py-4 font-medium text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        <!-- Data populated by DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#branch-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: "{{ route('admin.branches.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'address', name: 'address' },
                    { data: 'phone', name: 'phone' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-right' }
                ],
                language: {
                    paginate: {
                        next: '<i class="fas fa-chevron-right text-xs"></i>',
                        previous: '<i class="fas fa-chevron-left text-xs"></i>'
                    }
                },
                drawCallback: function () {
                    $('.dataTables_paginate > .paginate_button').addClass('px-3 py-1 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 mx-1 rounded-md transition-colors');
                    $('.dataTables_paginate > .current').addClass('!bg-primary !text-white !border-primary');
                }
            });
        });
    </script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.5s ease-out forwards; }
    </style>
@endsection
