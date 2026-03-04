@extends('backend.layouts.app')
@section('title', "Manage Faqs")
@section('breadcrumb', "Admin / Faqs")
@section('content')
    <div class="space-y-6 animate-fade-in-up">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Faqs Management <i class="fas fa-question-circle"></i></h2>
                <p class="text-gray-500 mt-1">Manage all the faqs items.</p>
            </div>
            <div>
                <a href="{{ route('admin.faqs.create') }}"
                    class="bg-primary hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Add New
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
                <table id="faq-table" class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                            <th class="px-6 py-4 font-medium">#</th>
                            <th class="px-6 py-4 font-medium">Question</th>
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
            $('#faq-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.faqs.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'question', name: 'question' },
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
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
@endsection