@extends('template')
@section('header')
    <div class="inner">
        <header>
            <h2>Test your knowledge, challenge your mind, and explore the fascinating world of Computer Science!</h2>
            <h3>Are you ready to start your journey? Choose a category and begin your quiz adventure now!</h3>
        </header>
    </div>
@endsection

@section('content')

    <section class="tiles">
        @foreach($categories as $category)

            <article class="style2">
                        <span class="image">
                            <img src="{{ asset('/images/pic01.jpg') }}" alt=""/>
                        </span>
                <a href="{{ route('quiz.start', ['id' => $category->id]) }}">
                    <h2>{{$category->name}}</h2>
                    <div class="content">
                        <p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
                        <button class="default">Start </button>
                    </div>
                </a>
            </article>
        @endforeach
    </section>
@endsection
