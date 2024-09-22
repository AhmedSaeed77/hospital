@extends('dashboard.core.app')
@php
    use \Illuminate\Support\Facades\Gate;
@endphp
@section('title', __('dashboard.bookings'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.bookings')</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang('dashboard.bookings')</h3>
                            <div class="card-tools">
                                {{-- <a href="{{ route('bookings.create') }}"
                                   class="btn  btn-dark">@lang('dashboard.Create')</a> --}}
                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('dashboard.number')</th>
                                    <th>@lang('dashboard.user')</th>
                                    <th>@lang('dashboard.doctor')</th>
                                    <th>@lang('dashboard.date')</th>
                                    <th>@lang('dashboard.time')</th>
                                    <th>@lang('dashboard.status')</th>
                                    <th>@lang('dashboard.Operations')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $booking->book_number }}</td>
                                        <td>{{ $booking->user->full_name }}</td>
                                        <td>{{ $booking->doctor->t('name') }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->time }}</td>
                                        <td>
                                            <select class="custom-select" id="status_{{ $booking->id }}">
                                                <option value="" disabled >@lang('dashboard.status')</option>
                                                <option value="upcoming" {{ $booking->status == 'upcoming' ? 'selected':'' }}>@lang('general.upcoming')</option>
                                                <option value="completed" {{ $booking->status == 'completed' ? 'selected':''}}>@lang('general.completed')</option>
                                                <option value="canceled" {{ $booking->status == 'canceled' ? 'selected':''}}>@lang('general.canceled')</option>
                                            </select>
                                        </td>
                                      <td>
                                            <div class="operations-btns" style="">

                                                <a href="{{ route('bookings.show', $booking->id) }}"
                                                   class="btn  btn-dark">@lang('dashboard.Show')</a>
                                                    {{-- <button class="btn btn-danger waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target="#delete-modal{{ $loop->iteration }}">@lang('dashboard.delete')</button> --}}
                                                    <div id="delete-modal{{ $loop->iteration }}"
                                                         class="modal fade modal2 " tabindex="-1" role="dialog"
                                                         aria-labelledby="myModalLabel" aria-hidden="true"
                                                         style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content float-left">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">@lang('dashboard.confirm_delete')</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>@lang('dashboard.sure_delete')</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal"
                                                                            class="btn btn-dark waves-effect waves-light m-l-5 mr-1 ml-1">
                                                                        @lang('dashboard.close')
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('bookings.destroy', $booking->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        {{ method_field('delete') }}
                                                                        <button type="submit"
                                                                                class="btn btn-danger">@lang('dashboard.Delete')</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <a target="_blank" href="{{ route('users.loginFromAdmin', $user->id) }}" class="btn  btn-success">@lang('dashboard.Login')</a> --}}

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    @include('dashboard.core.includes.no-entries', ['columns' => 5])
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{ $bookings->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('js_addons')

<script>
    $(document).ready(function() {
        $('[id^="status_"]').change(function() {
            var status = $(this).val();
            var booking_id = $(this).attr('id').split('_')[1];
            console.log(status);
            $.ajax({
                url: '{{ route('bookings.changeStatus', ['id' => '__consultation_id__']) }}'
                    .replace('__consultation_id__', booking_id),
                type: 'GET',
                data: {
                    status: status,
                    booking_id: booking_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success('@lang('messages.updated_successfully')');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>

@endsection
