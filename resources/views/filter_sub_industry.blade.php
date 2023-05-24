<ul class="dropdown-menu">
    @foreach($sub_industries as $sub_industry)
        <li><a class="dropdown-item" href="{{ url()->current() }}?filter[sub_industry_id]={{$sub_industry->id}}">
                {{$sub_industry->name}}</a></li>
    @endforeach

</ul>

