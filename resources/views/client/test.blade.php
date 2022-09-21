@extends('layouts.client')

@section('content')
<div class="container mx-auto max-w-[1000px]">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="text-3xl text-center font-semibold">Survei</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="/finishtest/{{ $survei }}/{{ $id }}">
                        @csrf

                        <!-- <div class="form-group mb-4 ">
                            <label for="nama-text font-medium">Nama</label>
                            <input type="text" class="form-control" id="nama-text" placeholder="Masukan Nama" name="nama-text" value="" />
                        </div> -->

                        @foreach($categories as $idx => $category)
                            <div class="border-1 rounded-lg mb-3">
                                <div class="text-xl font-medium pl-3 pt-2">{{ $category->name }}</div>
                
                                <div class="card-body border-[1px] border-slate-500 p-4 rounded-lg">
                                    @foreach($category->categoryQuestions as $question)
                                        <div class="card @if(!$loop->last)mb-3 @endif">
                                            <div class="card-header bg-gray-100 px-4 py-2 rounded-t border-[1px] border-slate-500">{{ $question->question_text }}</div>
                        
                                            <div class="card-body px-4 py-2 border-[1px] border-t-0 rounded-b border-slate-500">
                                                <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                @foreach($question->questionOptions as $option)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
                                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                                            {{ $option->option_text }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                                @if($errors->has("questions.$question->id"))
                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="">
                                <button type="submit" class="py-2 px-4 bg-[#FF0000] text-white rounded-sm hover:font-bold transition">
                                    Simpan Survei
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection