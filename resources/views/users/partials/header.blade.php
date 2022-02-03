@isset($portada)
<div class="header bg-leagues image-user pt-5 pl-5 pt-md-5 pb-md-5">
@endisset

@empty($portada)
<div class="header bg-leagues image-user pt-5 pl-5 pt-md-5 pb-md-5">
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

