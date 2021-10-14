<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a   class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('GAME Analytics Platform') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'games' ? 'active' : '' }}">
                <a href="{{ route('games.index') }}">
                    <i class="nc-icon nc-app"></i>
                    <p>{{ __('Games') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'scenarios' ? 'active' : '' }}">
                <a href="{{ route('scenarios.index') }}">
                    <i class="nc-icon nc-controller-modern"></i>
                    <p>{{ __('Scenarios') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'xapiprofiles' ? 'active' : '' }}">
                <a href="{{ route('xapiprofiles.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('xapiprofiles') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'adapations' ? 'active' : '' }}">
                <a href="{{ route('adapations.index') }}"
                >
                    <i class="nc-icon nc-ruler-pencil"></i>
                    <p>{{ __('Adapation') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
