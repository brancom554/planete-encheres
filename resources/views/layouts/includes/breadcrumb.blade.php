<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-info" href="{{ route('home') }}"><i class="fa fa-home"></i> {{ __('Home') }}</a></li>
        @foreach(get_breadcrumbs() as $breadcrumb)
            @if($loop->last || empty($breadcrumb['display_url']))
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}</li>
            @else
                <li class="breadcrumb-item"><a class="text-info" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
            @endif
        @endforeach
    </ol>
</nav>
