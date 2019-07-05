<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
    <i class="fa fa-bell"></i>
    @if(count($notificaciones) > 0)
        <span class="label">
            {{count($notificaciones)}}
        </span>
    @endif
</a>
@if(count($notificaciones) > 0)
    <ul class="dropdown-menu media-list dropdown-menu-right">
        <li class="dropdown-header">NOTIFICACIONES ({{count($notificaciones)}})</li>
    @foreach($notificaciones as $notificacion)
            <li class="media">
                <a href="javascript:;">
                    <div class="media-left">
                        <i class="fa fa-envelope media-object bg-silver-darker"></i>
                        <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading"> {{$notificacion->firstname}} {{$notificacion->lastname}}</h6>
                        <p>{{$notificacion->comentarios}}</p>
                        <div class="text-muted f-s-11">2 hour ago</div>
                    </div>
                </a>
            </li>
    </ul>
    @endforeach
@endif
