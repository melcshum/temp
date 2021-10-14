@extends('scenarios.layout')


@section('content')

    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">

                        <div class="pull-left">

                            <h3 class="text-primary mb-0 mt-3"> Scenarios </h3>

                        </div>
                        <div class="pull-right">
                            <a href="{{ route('scenarios.index') }}" class="btn btn-outline-secondary">Back to all
                                Secnarios</a>
                            {{-- <a class="btn btn-success"
                                href="{{ route('games.create') }}"> Create New Game</a> --}}
                        </div>
                    </div>
                    <div class="card-body">



                        <div class="mt-2"><strong>Name</strong> {{ $scenario->name }}</div>

                        <div class="mt-2">Difficulty_rate {{ $scenario->difficulty_rate }}</div>

                        <div class="mt-2">Uncertainty {{ $scenario->uncertainty }}</div>
                        <div class="mt-2">K factor {{ $scenario->k_factor }}</div>
                        <div class="mt-2">Time_limit {{ $scenario->time_limit }}<div>
                        <div class="mt-4">
                            <strong> Prefabs</strong>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td> card_prefab_name</td>
                                        <td> boss_can_use </td>
                                        <td> is_enabled </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($scenario->prefabs as $prefab)
                                        <tr>
                                            <td> {{ $prefab->name }}</td>
                                            <td> {{ $prefab->boss_can_use }} </td>
                                            <td> {{ $prefab->is_enabled }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
            //    demo.checkFullPageBackgroundImage();
        });

    </script>
@endpush
