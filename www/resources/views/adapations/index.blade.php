@extends('adapations.layout')


@section('content')

    <div class="content">

        <div class="content">


            <div class="d-flex align-items-center">
                <h2>Adapations</h2>
                <div class="ml-auto">
                    {{-- <a href="{{ route('profiles.create') }}"
                        class="btn btn-outline-secondary">Create profile</a> --}}
                </div>
            </div>


            <div class="card">

                <div class="card-body">

                    @include ('layouts._messages')
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <td> Name </td>
                                <td> Desc </td>
                                <td> Percentage </td>

                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($adapations as $adapation)
                            <tr>

                                <td>{{ $adapation->name }}</td>
                                <td>{{ $adapation->desc }}</td>

                                <td>{{ $adapation->percentage }}</td>

                            </tr>
                            @empty
                            <tr colspan="5">
                                <td>
                                    <div class="alert alert-warning">
                                        <strong> Sorry</strong> There is no profile available.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{-- {{ $xapi_profiles->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            //    demo.checkFullPageBackgroundImage();
        });

    </script>
@endpush
