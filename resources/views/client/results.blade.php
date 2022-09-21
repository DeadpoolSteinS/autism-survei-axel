@extends('layouts.client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hasil Survei</div>

                <div class="card-body">
                    <h1>{{$result->username}}</h1>
                    <p class="mt-3">Total skor: {{ $result->total_points }}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result->questions as $question)
                                <tr>
                                    <td>{{ $question->question_text }}</td>
                                    <td>{{ $question->pivot->points }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection