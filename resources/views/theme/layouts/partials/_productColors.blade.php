@foreach ($colors as $color)
    <div class="color" style="background-color:{{ $color->hex }}" title="{{ $color->colorName() }}"></div>
@endforeach