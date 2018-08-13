<form action="{{ route('statuses.store') }}" method="POST">
    {{ csrf_field() }}

    <!-- 引入错误消息视图 -->
    @include('shared._errors')

    <textarea name="content" rows="3" class="form-control" placeholder="一起来嘎三胡~">{{ old('content') }}</textarea>
    <button type="submit" class="btn btn-primary pull-right">发布</button>
</form>
