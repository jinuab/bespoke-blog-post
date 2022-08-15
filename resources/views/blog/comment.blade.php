<div class="col-12 pt-2">
    <h3>Comments</h3>
</div>

<div class="row">
    @foreach($comments as $comment)
    <div class="row pl-4 pb-4 w-100">
        <p class="w-100">{!! $comment->comment !!}</p>
        <p class="w-100 small text-muted">{!! $comment->name !!} ({!! $comment->created_at !!})</p>
    </div>
    @endforeach
</div>
