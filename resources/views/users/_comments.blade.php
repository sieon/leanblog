@if (count($comments))

<ul class="list-group list-group-flush mb-3">

    @foreach ($comments as $comment)
        <li class="list-group-item">

            <a href="{{ $comment->post->link(['#comment' . $comment->id]) }}">
                {{ $comment->post->title }}
            </a>

            <div class="comment-content my-3">
                {!! $comment->content !!}
            </div>

            <div class="comment-meta text-muted">
                <span class="fa fa-time" aria-hidden="true"></span> 回复于 {{ $comment->created_at->diffForHumans() }}
            </div>
        </li>
    @endforeach

</ul>

@else
   <div class="card-block empty-block">暂无数据 ~_~ </div>
@endif

{{-- 分页 --}}
<nav class="d-flex justify-content-center">
  {!! $comments->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4') !!}
</nav>
