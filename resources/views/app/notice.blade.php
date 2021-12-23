@extends('struct.index_struct')

@section('content')
<section>

    <div class="banner">
        <img src="/assets/img/temp/ban01.png">
    </div>

    <div class="box single">

        <div class="share">

            <div class="date">
                <span class="d">{{ explode(' ', explode('-', $Notice->created_at)[2])[0] }}</span>
                <span class="m">{{ explode('-', $Notice->created_at)[1] }}</span>
                <span class="y">{{ explode('-', $Notice->created_at)[0] }}</span>
            </div>

        </div>

        <div class="content">

            <div class="title">
                {{ $Notice->title }} </div>

            <p>
                {{ $Notice->description }}
            </p>
        </div>


    </div>

    <div class="box list related">
        <ul>
            <li class="title">Outras noticias</li>
            @foreach($Notices as $OtherNotice)
            <li>
                <a href="{{ Route('web.app.article', ['id' => $OtherNotice->id]) }}">
                    {{ $OtherNotice->title }} </a>
            </li>
            @endforeach
        </ul>

    </div>

</section>

@endsection