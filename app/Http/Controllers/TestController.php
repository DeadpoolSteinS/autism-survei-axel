<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Models\Result;

class TestController extends Controller
{
    public function index($id)
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
            $query->inRandomOrder()
                ->with(['questionOptions' => function ($query) {
                    $query->inRandomOrder();
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->where('id', $id)
            ->get();

        return view('client.test', compact('categories'));
    }

    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));

        $hasil = "";
        if ($options->sum('points') >= 30 && $options->sum('points') <= 60) {
            $hasil = "B";
        } else if ($options->sum('points') > 60 && $options->sum('points') <= 80) {
            $hasil = "C";
        } else if ($options->sum('points') > 80 ) {
            $hasil = "D";
        } else {
            $hasil = "A";
        }

        $result = auth()->user()->userResults()->create([
            'total_points' => $options->sum('points'),
            'username' => $request->input('nama-text'),
            'hasil_survei' => $hasil
        ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [
                $option->question_id => [
                    'option_id' => $option->id,
                    'points' => $option->points
                ]
            ];
        })->toArray();

        $result->questions()->sync($questions);

        return redirect()->route('client.results.show', $result->id);
    }

    public function storeWithId(StoreTestRequest $request, $survei, $id)
    {
        $options = Option::find(array_values($request->input('questions')));

        $hasil = "";
        if ($options->sum('points') >= 30 && $options->sum('points') <= 60) {
            $hasil = "B";
        } else if ($options->sum('points') > 60 && $options->sum('points') <= 80) {
            $hasil = "C";
        } else if ($options->sum('points') > 80 ) {
            $hasil = "D";
        } else {
            $hasil = "A";
        }

        $result = Result::create([
          'user_id' => $id,
          'total_points' => $options->sum('points'),
          'hasil_survei' => $hasil,
          'jenis_survei' => $survei,
        ]);

        // $questions = $options->mapWithKeys(function ($option) {
        //     return [
        //         $option->question_id => [
        //             'option_id' => $option->id,
        //             'points' => $option->points
        //         ]
        //     ];
        // })->toArray();

        // $result->questions()->sync($questions);

        return redirect("pilihan/$id");
    }

    public function categoryTest(Request $request, $categories)
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
            $query
                ->with(['questionOptions' => function ($query) {
                    $query;
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->where('id', $categories)
            ->get();

        return view('client.test', compact('categories'));
    }

    public function categoryTestWithId($idCategories, $id)
    {
        $categories = Category::with(['categoryQuestions' => function ($query) {
            $query
                ->with(['questionOptions' => function ($query) {
                    $query;
                }]);
        }])
            ->whereHas('categoryQuestions')
            ->where('id', $idCategories)
            ->get();

        return view('client.test', compact('categories'))->with('survei', $idCategories)->with('id', $id);
    }

    public function showResult($id){
      $results = Result::where('user_id', '=', $id)->get();
      $survei = Category::find($id)->get();
      // var_dump($survei);
      return view('client.finalresults')->with('results', $results)->with('survei', $survei);
    }
}
