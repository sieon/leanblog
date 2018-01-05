@if($posts->count())

    @foreach($posts as $post)
        <div id="post-{{ $post->id }}" class="w-100">

            <a class="text-dark" href="{{ $post->link() }}">
                <h3 class="card-title">{{ $post->title }}</h3>
            </a>

            <div class="post-meta my-3 text-muted">
                <span class="user">
                {{-- <a href="{{ route('users.show', Auth::user()->id) }}">{{ $user->name }}</a> --}}
                </span>
                <span>{{ $post->created_at->diffForHumans() }}</span>
                <a href="{{ route('categories.show', $post->category->id) }}" title="{{ $post->category->name }}">
                  {{ $post->category->name }}
                </a>
            </div>

            <p class="post-excerpt">{{ $post->excerpt }}</p>

            <p><a class="btn btn-secondary btn-sm" href="{{ $post->link() }}">阅读全文</a></p>

            {{--<form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> 删除</button>
            </form>--}}

        </div>
        <hr>
    @endforeach

    {!! $posts->links('vendor.pagination.bootstrap-4') !!}

@else

    <h3 class="text-center alert alert-info">暂无数据！</h3>

@endif
