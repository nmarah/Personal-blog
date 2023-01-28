<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        @foreach ($notifications as $notification )
        <a href="{{$notification->data['link']}}" class="dropdown-item">
            <i class="{{$notification->data['icon']}} mr-2"></i> {{$notification->data['title']}}
            <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
        </a>
        <div class="dropdown-divider"></div>
        @endforeach
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
</li>