<li class="status-{{ $status->id }}">
    <a href="{{ route('users.show', $user->id) }}">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar">
    </a>
    <span class="user">
        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
    </span>
    <span class="timestamp">
        {{ $status->created_at->diffForHumans() }}
    </span>
    <span class="content">{{ $status->content }}</span>

    <!-- 添加删除按钮 -->
    @can ('destroy', $status)
        <form action="{{ route('statuses.destroy', $status->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-sm btn-danger status-delete-btn" onclick="return function(){return confirm('确定删除这条动态吗？')}()">删除</button>
        </form>
    @endcan
</li>