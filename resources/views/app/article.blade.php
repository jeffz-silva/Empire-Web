@extends('struct.index_struct')

@section('content')
<section>

    <div class="banner">
        <img src="/assets/img/temp/ban01.png">
    </div>

    <div class="box list">
        <ul>
            <li class="title">
                {{ ($Article == "all" ? "Tudo" : $Article) }} </li>

            @foreach($Notices as $Notice)
            <li>
                <a href="{{ Route('web.app.article', ['id' => $Notice->id]) }}">
                    <span>{{ $Notice->created_at }}</span>
                    {{ $Notice->title }} </a>
            </li>
            @endforeach
        </ul>

    </div>

</section>
@endsection
