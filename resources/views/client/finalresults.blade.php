@extends('layouts.client')

@section('content')
<div class="container mx-auto max-w-[1000px]">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="text-3xl text-center font-semibold mb-4">Your Results</div>

                <div class="card-body">

                        @for($i = 0; $i < 9; $i++)
                          <div class="div border-[1px] mb-2 px-4 py-2 rounded border-slate-500 flex justify-between">
                            <p>{{ $survei[$i]->name }}</p>
                            <p>{{ $results[$i]->total_points }}</p>
                          </div>
                        @endfor

                        <!-- <div class="form-group row mt-2">
                            <div class="">
                                <button type="submit" class="py-2 px-4 bg-[#FF0000] text-white rounded-sm hover:font-bold transition">
                                    Back to home
                                </button>
                            </div>
                        </div> -->
                </div>

                <form action="/submit-rekomendasi/{{ $results[0]->user_id }}" method="POST" class="rekomendasi mt-4">
                  @csrf
                  <label for="rekomendasi" class="font-semibold">Rekomendasi</label>
                  <textarea name="rekomendasi" id="rekomendasi" rows="5" class="border-[1px] border-slate-500 w-full p-2"></textarea>

                  <div class="btn-action flex justify-center">
                    <a href="/" class="bg-red-500 px-4 py-2 rounded text-white mr-4">Back</a>
                    <button type="submit" class="bg-sky-500 px-4 py-2 rounded text-white">Submit</button>
                  </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection