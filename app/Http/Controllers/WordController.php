<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;

class WordController extends Controller
{
    public function index(Word $word)
    {
      if(request('descending'))
      {
        // if the user has selected desc then the query will be ordered in desc order
        $word = Word::orderBy('created_at','desc')->get();
      }
      else {
        $word = Word::all();
      }

      return view('index', compact('word'));
    }

    public function store()
    {
      // validate incoming form data
      request()->validate([
        'word1' => 'required',
        'word2' => 'required',
        'comparisonType' => 'required'
      ]);

      $comparision = new Word();

      if(request('comparisonType') == "Anagram")
      {
        // store in db
        $comparision->word1 = request('word1');
        $comparision->word2 = request('word2');
        $comparision->comparisonType = request('comparisonType');
        $comparision->timeTaken = $this->is_anagram(request('word1'), request('word2'))['time_taken'];
        $comparision->result =  $this->is_anagram(request('word1'), request('word2'))['result'];
        $comparision->save();

        // redirect to homepage to see results and other entries in db
        return redirect('/');
      }
      else if(request('comparisonType') == "Palindrome")
      {
        // store in db
        $comparision->word1 = request('word1');
        $comparision->word2 = request('word2');
        $comparision->comparisonType = request('comparisonType');
        $comparision->timeTaken = $this->is_palindrome(request('word1'), request('word2'))['time_taken'];
        $comparision->result =  $this->is_palindrome(request('word1'), request('word2'))['result'];
        $comparision->save();

        // redirect to homepage to see results and other entries in db
        return redirect('/');
      }

    }

    public function is_anagram($word1, $word2)
    {
      $start = microtime(true);
      if (count_chars($word1, 1) == count_chars($word2, 1))
      {
        $execution_time = (microtime(true) - $start) * 1000; // get execution time in ms
        return ["result" => "True",
                "time_taken" => $execution_time];
      }
      else
      {
        $execution_time = (microtime(true) - $start) * 1000; // get execution time in ms
        return ["result" => "False",
                "time_taken" => $execution_time];
      }
    }

    public function is_palindrome($word1, $word2)
    {
      $start = microtime(true); // start execution timer

      if ($word1 == strrev($word1)) // strrev = Reverses a given string
      {
        $execution_time = (microtime(true) - $start) * 1000; // get execution time in ms
        return ["result" => "True",
                "time_taken" => $execution_time];
      }
      else
      {
        $execution_time = (microtime(true) - $start) * 1000; // get execution time in ms
        return ["result" => "False",
                "time_taken" => $execution_time];
      }

      // check second word is a palidrome
      if($word2 == strrev($word2))
      {
        $execution_time = (microtime(true) - $start) * 1000; // get execution time in ms
        return ["result" => "True",
                "time_taken" => $execution_time];
      }
      else
      {
        $execution_time = (microtime(true) - $start) * 1000; // get execution time in ms
        return ["result" => "False",
                "time_taken" => $execution_time];
      }

    }
}
