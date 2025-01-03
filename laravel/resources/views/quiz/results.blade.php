@extends('template')

@section('content')

    <header>
        <h1>Quiz Results</h1>
    </header>
    <section class="Alternate">

        @if($score > 0)
            <i class="fa fa-check-circle" style="color: green"></i> Congratulations !!! You have passed the Quiz!
        @else
            <i class="fa fa-times-circle" style="color: #FF2D20"></i> Sorry ! You have failed
        @endif

        <p>Your Points: {{ $points }} </p>
        <div>Your Score: {{ $score }} %   - Passing Score: 80% </div>


            @foreach ($questions as $question)
                <h3>{{ $question->text }}</h3>

                @foreach ($question->options as $option)
                    @php
                        $isCorrect = $question->correct_answer === $option; // Check if this option is the correct answer
                        $isSelected = $results[$question->id]['submitted_answer'] === $option; // Check if this option was selected by the user
                        $radioColor = $isCorrect ? 'green' : ($isSelected ? 'red' : ''); // Highlight green for correct, red for incorrect
                    @endphp

{{--                    <div style="margin-bottom: 10px;">--}}
                        <input
                            type="radio"
                            id="option_{{$question->id}}_{{$loop->index}}"
                            name="answers[{{ $question->id }}]"
                            value="{{ $option }}"
                            @if ($isSelected) checked @endif
                            disabled
                            style="accent-color: {{ $radioColor }};"
                        >
                        <label for="option_{{$question->id}}_{{$loop->index}}">
                            {{ $option }}
                        </label>
{{--                    </div>--}}
                @endforeach

            @endforeach
         <div>
             <a href="{{ route('quiz.start', ['id' => $category_id]) }}" class="button btn-primary">Retry Quiz</a>
             <a href="{{ route('categories') }}" class="button btn-primary">Back to Categories</a>
         </div>


    </section>

@endsection
