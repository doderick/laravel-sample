<a href="{{ route('users.show', $user->id) }}">
    <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar">
</a>
<h1>{{ $user->name }}</h1>
<h2>
    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
</h2>