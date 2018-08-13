<li>
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar">
    <a href="{{ route('users.show', $user->id) }}" class="username">{{ $user->name }}</a>

    <!-- 增加删除按钮 -->
    @can ('destroy', $user)
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-sm btn-danger user-delete-btn" onclick="return function(){
                return confirm('确定删除这个用户吗？')}()">删除</button>

        </form>
    @endcan
</li>