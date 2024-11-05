<section class="container py-5">
    <h2 class="mb-4">My Reservations</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">

            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <!-- SUCCESS MESSAGE -->
            <div>
                @if (session('delete_success'))
                    <div class="alert alert-success">
                        {{ session('delete_success') }}
                    </div>
                @endif
            </div>

            <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $reservation->destination->name }}</td>
                        <td>{{ $reservation->destination->date }}</td>
                        <td>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this destination?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="color: red; text-align: center;">No Reservations found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
