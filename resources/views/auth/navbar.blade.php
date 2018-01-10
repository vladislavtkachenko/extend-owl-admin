<li @if(!$user)style="margin-right: 20px;"@endif>
    <a href="/" target="_blank">
        @lang('sleeping_owl::lang.links.index_page')
    </a>
</li>

@if ($user)
    <li class="dropdown user user-menu" style="margin-right: 20px;">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <span class="hidden-xs">{{ $user->name }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="user-footer">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-btn fa-sign-out"></i> @lang('sleeping_owl::lang.auth.logout')
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@else
    <li style="margin-right: 20px;">
        <a href="#" target="_blank">
            <span>Гость</span>
        </a>
    </li>
@endif