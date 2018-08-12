<ul class="paginator">
@for ($i = 1; $i <= $pages; $i++)
  <li @if ($current != $i) class="paginator-item" @else class="paginator-item active" @endif data-container="{{$container}}" data-page="{{$i}}">
    {{$i}}
  </li>
@endfor
</ul>