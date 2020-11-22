@extends('layouts.app')

@section('content')
    @php
        /** $var \App\Models\BlogPost $item */
    @endphp
    <div class="container">
        @if($item->exists)
            <form method="POST" action="{{route('blog.admin.posts.update', $item)}}">
                @method('PATCH')
                @else
                    <form method="post" action="{{route('blog.admin.posts.store', $item)}}">
                        @endif
                        @csrf

                        @include('blog.admin.posts.includes.result_messages')
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('blog.admin.posts.includes.post_edit_main_col')
                            </div>
                            <div class="col-md-4">
                                @include('blog.admin.posts.includes.post_edit_add_col')
                            </div>
                        </div>

                    </form>

                    @if($item->exists)
                        <br>
                        <form method="POST" action="{{route('blog.admin.posts.destroy', $item)}}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Удалить</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </form>
        @endif
    </div>

@endsection