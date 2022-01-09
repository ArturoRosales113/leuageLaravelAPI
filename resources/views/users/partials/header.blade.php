@isset($portada)
<div class="header pb-6 pt-6 d-flex align-items-center" style="background-image: url({{ asset($portada) }}); background-size: cover; background-position: center center;">
@endisset

@empty($portada)
<div class="header pb-5 pt-4 d-flex align-items-center" style="background-image: url(../argon/img/theme/profile-cover.jpg); background-size: cover; background-position: center center;">
@endempty
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-4"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h1 class="display-2 text-white">{{ $title }}</h1>
                @if (isset($identifier) && $identifier)
                    <p class="text-white mt-0 mb-5">{{ $identifier }}</p>
                @endif
                @if (isset($description) && $description)
                    <p class="text-white mt-0 mb-5">{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
</div> 

