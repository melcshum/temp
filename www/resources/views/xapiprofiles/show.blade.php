@extends('xapiprofiles.layout')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="pull-left">
                            <h2><strong> {{ $profile->name }}'s Profile</strong> </h2>
                            <ul>
                                <li><strong>Overall Rating:</strong> {{ $profile->rating }} </li>
                                <li><strong>kfactor:</strong> {{ $profile->kfactor }} </li>
                                <li><strong>Uncertainty:</strong> {{ $profile->uncertainty }} </li>
                                <li><strong>Secnario count:</strong> {{ $profile->count }} </li>
                                <li><strong>Last Play time:</strong> {{ $profile->lastplaytime }} </li>
                            </ul>

                        </div>
                        <div class="pull-right">
                            <a href="{{ route('xapiprofiles.index') }}" class="btn btn-outline-secondary">Back to all
                                Profiles</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h3>Player Learning Record with XAPI</h3>
                        @include('gamesession._index', [
                        'game_sessions'=>$game_sessions,
                        'showGame'=>true,
                        'showStudent'=>false,
                        ])
                        <h3>Scenario Summary</h3>

                        <table class="table-sm table-bordered table-hover table-responsive">
                            <thead>
                                <tr class="success">
                                    <th>Scenario Name</th>

                                    <th class="table-danger">Attempt</th>
                                    <th class="table-success">Player Rating</th>
{{--                                    <th class="table-success">KFactor </th>--}}
{{--                                    <th class="table-success">Uncertainty </th>--}}


                                    <th class="table-warning">Default Rating</th>
{{--                                    <th class="table-warning">KFactor </th>--}}
{{--                                    <th class="table-warning">Uncertainty </th>--}}

                                    <th class="table-success">TimeTaken (Sec) </th>
                                    <th class="table-warning">Time Limit (Sec)</th>
                                    <th class="table-success">lastplaytime</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scenario_ratings as $scenario_rating)

                                    <tr>
                                        <td> <a href="{{ route('scenarios.show', $scenario_rating->scenario->id) }}">
                                                {{ $scenario_rating->scenario->name }}
                                            </a>
                                        </td>
                                        <td class="text-center">{{ $scenario_rating->attempt }}</td>
                                        <td class="text-center">{{ $scenario_rating->rating }}</td>
{{--                                        <td class="text-center">{{ $scenario_rating->kfactor }}</td>--}}

{{--                                        <td class="text-center bg-">{{ $scenario_rating->uncertainty }}</td>--}}




                                        <td class="text-center">{{ $scenario_rating->scenario->difficulty_rate }}</td>
{{--                                        <td class="text-center">{{ $scenario_rating->scenario->k_factor }}</td>--}}
{{--                                        <td class="text-center">{{ $scenario_rating->scenario->uncertainty }}</td>--}}


                                        <td class="text-center
                                        @if( $scenario_rating->timetaken > $scenario_rating->scenario->time_limit )
                                            bg-danger
                                        @else
                                            bg-success
                                        @endif
                                            "
                                        >
                                            {{ $scenario_rating->timetaken /1000 }}</td>
                                        <td class="text-center">{{ $scenario_rating->scenario->time_limit /1000 }}</td>

                                        <td class="text-center">{{ $scenario_rating->lastplaytime }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    @endsection
