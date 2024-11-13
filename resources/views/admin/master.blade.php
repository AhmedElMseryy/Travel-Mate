<!doctype html>
<html lang="en">

@include('admin.partials.head')

<body class="vertical  light @if (LaravelLocalization::getCurrentLocale() == 'ar') rtl @endif ">
    <div class="wrapper">

        @include('admin.partials.navbar')

        @include('admin.partials.sidebar')

        <main role="main" class="main-content">

            <!-- NOTIFICATIONS -->
            <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog"
                aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!--********** NOTIFICATIONS BODY **********-->
                        <div class="modal-body" id="notificationsModal">
                            @if (count(Auth::guard('admin')->user()->notifications) > 0)
                                <div class="list-group list-group-flush my-n3">

                                    @foreach (Auth::guard('admin')->user()->notifications->take(5) as $notification)
                                        <div
                                            class="list-group-item @if ($notification->unread()) bg-light @else bg-transparent @endif">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="fe fe-box fe-24"></span>
                                                </div>
                                                <div class="col">
                                                    <small><strong>New User Reservation</strong></small>
                                                    <div class="my-0 text-muted small">
                                                        {{ $notification->data['message'] }}
                                                    </div>
                                                    <small
                                                        class="badge badge-pill badge-light text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div> <!-- / .list-group -->
                            @endif
                        </div>
                        <!--********** END NOTIFICATIONS BODY **********-->


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"
                                id="clearNotifications">Clear
                                All</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END NOTIFICATIONS -->

            @yield('content')
        </main> <!-- main -->
    </div> <!-- .wrapper -->

    @include('admin.partials.scripts')
</body>

</html>
