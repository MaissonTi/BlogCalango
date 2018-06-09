
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <a href="{{route($rota)}}">
        {{-- Type = info-box, info-box-2, info-box-3, info-box-4 --}}
    <div class="{{ $type or 'info-box' }} {{ $color or 'bg-red' }} hover-expand-effect">
        <div class="icon">
            <i class="material-icons">{{ $icon or 'bookmark' }}</i>
        </div>
        <div class="content">
            <div class="text">{{ $titulo or 'Sem titulo' }}</div>
            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">{{ $number or '' }}</div>
        </div>
    </div>
    </a>
</div>

