<li class="nav-item">
  <a href="{{url($url)}}" class="nav-link {{Request::segment(1) == $url ? 'active' : ''}}">
    <i class="nav-icon {{$icon ?? 'far fa-circle'}}"></i>
    <p>
      {{$title}}
    </p>
  </a>
</li>