@extends('admin.master')

@section('title', __('keywords.guides'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.guides') }}</h2>

                    <div class="page-title-right">
                        <!-- Add New -->
                        {{-- <x-action-button href="{{ route('admin.destinations.create') }}" type="create"></x-action-button> --}}
                        <a href="{{ route('admin.guides.create') }}" class="btn btn-sm btn-primary">
                            {{ __('keywords.add_new') }}
                        </a>

                    </div>
                </div>
                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- Success Alert Component -->
                        <x-success-alert></x-success-alert>

                        <!-- ****** Start Table ****** -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.name') }}</th>
                                    <th>{{ __('keywords.email') }}</th>
                                    <th>{{ __('keywords.description') }}</th>
                                    <th>{{ __('keywords.linkedin') }}</th>
                                    <th>{{ __('keywords.image') }}</th>
                                    <th width="10%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($guides) > 0)
                                    @foreach ($guides as $key => $guide)
                                        <tr>
                                            {{-- <td>{{ $guide->firstItem() + $loop->index }}</td> --}}
                                            {{-- <td>#</td> --}}
                                            <td>{{ ($guides->currentPage() - 1) * $guides->perPage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ $guide->name }}</td>
                                            <td>{{ $guide->email }}</td>
                                            <td>{{ $guide->description }}</td>
                                            <td>{{ $guide->linkedin }}</td>
                                            <td>
                                                <img src="{{ asset('storage/guides/' . $guide->image) }}?{{ session('timestamp') ?? '' }}"
                                                    alt="#" width="50px">
                                            </td>

                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.guides.edit', ['guide' => $guide]) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class='fe fe-edit fa-2x'></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.guides.destroy', ['guide' => $guide]) }}"
                                                    method="POST" class="d-inline" id="deleteForm-{{ $guide->id }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete({{ $guide->id }})">
                                                        <i class="fe fe-trash-2 fa-2x"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <!-- Empty Alert Component -->
                                    <tr>
                                        <td colspan ="100%">
                                            <div class="alert alert-danger">
                                                {{ __('keywords.no_found_records') }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- ****** End Table ****** -->
                        {{ $guides->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- simple table -->


        </div>
    </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want delete this record ?')) {
                document.getElementById('deleteForm-' + id).submit();
            }
        }
    </script>
@endsection
