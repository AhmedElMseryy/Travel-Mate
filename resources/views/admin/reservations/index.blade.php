@extends('admin.master')

@section('title', __('keywords.reservations'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="h5 page-title">{{ __('keywords.reservations') }}</h2>

                </div>
                <!-- simple table -->
                <div class="card shadow">
                    <div class="card-body">

                        <!-- Success Alert Component -->
                        @if (session('delete_success'))
                            <div class="alert alert-success">
                                {{ session('delete_success') }}
                            </div>
                        @endif

                        <!-- ****** Start Table ****** -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.name') }}</th>
                                    <th>{{ __('keywords.email') }}</th>
                                    <th>{{ __('keywords.destinations') }}</th>
                                    <th>{{ __('keywords.date') }}</th>
                                    <th>{{ __('keywords.image') }}</th>
                                    <th width="10%">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($reservations) > 0)
                                    @foreach ($reservations as $key => $reservation)
                                        <tr>
                                            <td>{{ ($reservations->currentPage() - 1) * $reservations->perPage() + $loop->index + 1 }}
                                            </td>
                                            <td>{{ App\Models\User::find($reservation->user_id)->name }}</td>
                                            <td>{{ App\Models\User::find($reservation->user_id)->email }}</td>
                                            <td>{{ $reservation->destination->name }}</td>
                                            <td>{{ $reservation->destination->date }}</td>
                                            <td>
                                                <img src="{{ asset('storage/destinations/' . $reservation->destination->image) }}?{{ session('timestamp') ?? '' }}"
                                                    alt="#" width="50px">
                                            </td>

                                            <td>

                                                <!-- Delete Button -->
                                                <form
                                                    action="{{ route('admin.reservations.destroy', ['reservation' => $reservation]) }}"
                                                    method="POST" class="d-inline" id="deleteForm-{{ $reservation->id }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="confirmDelete({{ $reservation->id }})">
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
                        {{ $reservations->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div> <!-- simple table -->


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
