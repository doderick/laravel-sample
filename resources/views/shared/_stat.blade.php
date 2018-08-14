<div class="stats">
    <a href="{{ route('users.followings', $user->id) }}">
        <span id="followings" class="stat">
            {{ $user->followings()->count() }}
        </span>
        关注
    </a>
    <a href="{{ route('users.followers', $user->id) }}">
        <span id="followers" class="stat">
            {{ $user->followers()->count() }}
        </span>
        粉丝
    </a>
    <a href="{{ route('users.show', $user->id) }}">
        <span id="following" class="stat">
            {{ $user->statuses()->count() }}
        </span>
        动态
    </a>
</div>