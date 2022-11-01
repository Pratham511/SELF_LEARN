<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">{{__('messages.contact_us')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">{{__('messages.about_us')}}</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Config::get('languages')[App::getLocale()] }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                    @endif
                @endforeach
            </div>
        </li>
    </ul>

    </div>
</nav>
