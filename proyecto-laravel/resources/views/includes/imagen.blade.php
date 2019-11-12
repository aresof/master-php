<div class="card pub_image">
    <div class="card-header">
        @if($image->user->image)
            <div class="container-avatar">
                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar"/>
            </div>
        @endif
        <div class="data-user">
            <a href="{{ route('profile', ['id' => $image->user_id]) }}">
                {{ $image->user->name. ' ' .$image->user->name }}
                <span class="nickname">
                                {{  '| @'.$image->user->nick }}
                            </span>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="image-container">
            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}"/>
        </div>
    </div>
    <div class="description">
        <span class="nickname">{{ '@'.$image->user->nick }} | </span>
        <span class="nickname date">{{ \FormatTime::LongTimeFilter($image->created_at) }}</span>
        <p>{{ $image->description }}</p>
    </div>
    <div class="likes">
        <!-- Comprobar si like es del usuario autentificado -->
        <?php $user_like = false; ?>
        @foreach($image->likes as $like)
            @if($like->user_id == Auth::user()->id)
                <?php $user_like = true; ?>
            @endif
        @endforeach

        @if($user_like)
            <img class="btn-dislike" data-id="{{ $image->id }}" src="{{ asset('images/facebook-like-64_red.png') }}"/>
        @else
            <img class="btn-like" data-id="{{ $image->id }}" src="{{ asset('images/facebook-like-64.png') }}"/>
        @endif
        <span class="number_likes" data-id="{{ $image->id }}">{{ count($image->likes) }}</span>
    </div>
    <div class="comments">
        <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="btn btn-sm btn-warning btn-comments">
            Comentarios ({{ count($image->comments) }})
        </a>
    </div>

</div>