<ul class="dropdown-menu">
    @foreach($regions as $region)
        <li><a class="dropdown-item" href="{{ url()->current() }}?filter[region_id]={{$region->id}}">
                {{$region->name}}</a></li>
    @endforeach

</ul>

