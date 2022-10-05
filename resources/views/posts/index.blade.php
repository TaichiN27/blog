<x-app-layout>
    <x-slot name="header">
        　Index
    </x-slot>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
                <p class='body'>{{$post->body}}</p>
            </div>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <button type="button" onclick="deletePost({{$post->id}})">delete</button>
            </form>                
            @endforeach
        </div>
        <a href='/posts/create'>create</a>
        ログインユーザー{{ Auth::user()->name }}
        <div class="paginate">{{$posts->links()}}</div>
        <script>
            function deletePost(id) {
                'use strict'
                
                if(confirm('消去すると復元できません。\n本当に消去しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</x-app-layout>