@extends('template')

@section('content')
    <header>
        <h1>Quiz: {{ $category->name }}</h1>
    </header>
    @if($error)
        <p class="error_text">{{$error}}</p>
    @endif
    <section>

        <form action="{{ route('quiz.check') }}" method="POST">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }}">

            @foreach($questions as $question)

                <h3>{{ $question->question_text }}</h3>
                @foreach($question->options as $option)
                    <input type="radio" id="option_{{$question->id}}_{{$loop->index}}"
                           name="answers[{{ $question->id }}]" value="{{ $option }}" >
                    <label for="option_{{$question->id}}_{{$loop->index}}">{{ $option }}</label>
                @endforeach

            @endforeach
           <div>
               <button type="submit">Check Answers</button>
               <a style="margin-left: 20px" href="/">Back to Categories</a>
           </div>
        </form>
    </section>

@endsection
