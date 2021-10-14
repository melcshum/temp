@extends('games.layout')



@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h2>Player Session </h2>
                        <h3> <strong>Session</strong> {{ $game_session->session }}</h3>

                        <div class="ml-auto align-items-right">
                            {{-- <a href="{{ route('games.index') }}"
                                class="btn btn-outline-secondary">Back to all
                                Ganes</a> --}}
                        </div>
                    </div>


                    <div class="card-body">

                        <p class="card-title">
                        </p>

                        <div class="statement">
                            <table class="table-sm table-striped table-responsive">
                                <tr>
                                    <th>No</th>
                                    <th>verb</th>

                                    <th>object</th>


                                    <th>success</th>
                                    <th>completion</th>
                                    <th>Level</th>
                                    <th>Select</th>
                                    <th>Drag</th>

                                    <th>Attempt</th>

                                    <th>TimeTaken (s)</th>
                                    <th>Overall Rating</th>

                                </tr>

                                @foreach ($xapi_statements as $statement)

                                    @php
                                    $s=json_decode ($statement, true);
                                    // $verb= end(explode('\\', $s['verb']['id']));
                                    @endphp




                                    <tr class="statement" id="{{ $s['_id'] }}">
                                        <td> {{ $loop->index + 1 }}</td>


                                        <td class="text-center
                                            {{ $s['verb']['display']['en-US'] == "attempted" ? 'bg-warning' : '' }}
                                            {{ $s['verb']['display']['en-US'] == "completed" ? 'bg-success' : '' }}
                                            {{ $s['verb']['display']['en-US'] == "abandoned" ? 'bg-danger' : '' }}
                                            "


                                        >
                                            {{-- @php // get the last element in the url
                                            $pathFragments = explode('/', parse_url($s['verb']['id'], PHP_URL_PATH));
                                            echo end($pathFragments);
                                            @endphp --}}
                                            {{ $s['verb']['display']['en-US'] ?? '' }}
                                        </td>
                                        <td> {{ $s['object']['definition']['name']['en-US'] ?? '' }} </td>
                                        @isset($s['result'])

                                            <td> {{ $s['result']['success'] == 1 ? 'true' : 'false' }} </td>

                                            <td> {{ $s['result']['completion'] == 1 ? 'true' : 'false' }} </td>

                                            @isset($s['result']['extensions'])
                                                <td>{{ $s['result']['extensions']['level'] ?? '' }} </td>

                                                <td>{{ $s['result']['extensions']['Select'] ?? '' }} </td>
                                                <td>{{ $s['result']['extensions']['Drag'] ?? '' }}</td>
                                                <td>{{ $s['result']['extensions']['Attempt'] ?? '' }}</td>

                                                @isset($s['result']['extensions']['TimeTaken'] )
                                                   <td>{{ $s['result']['extensions']['TimeTaken'] /1000??'' }} </td>
                                                @endisset

                                                <td>{{ $s['result']['extensions']['Rating'] ?? '' }}</td>
                                            @endisset
                                        @endisset

                                    </tr>
                                    <tr>
                                        <td colspan="11">

                                            <textarea id="detail_{{ $s['_id'] }}" class="bg-danger"
                                                style="display:none;  width: 100%; min-height: 30rem;    font-family:, Monaco,
                                                                                                                    monospace; font-size: 0.8rem; line-height: 1.2; ">
                                            {{ $statement }}</textarea>

                                        </td>
                                    </tr>


                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {

            $("tr.statement").click(function() {
                var detail = "#detail_" + this.id;

                $(detail).text(
                    JSON.stringify(JSON.parse($(detail).html()), undefined, 4)
                );

                $(detail).toggle();
            });

        });

    </script>
@endpush
