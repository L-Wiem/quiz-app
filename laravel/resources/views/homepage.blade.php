@extends('template')
@section('header')
    <div class="inner">
        <header>
            <h1>Quiz Starten template designed by Quiz</h1>
            <p>arcu elementum ipsum arcu vivamus quugiat veroeros aliquam. Lorem ipsum dolor sit </p>
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
