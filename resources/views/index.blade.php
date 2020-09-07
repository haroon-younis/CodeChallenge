@extends('layouts.layout')

@section('title', 'Word Challenge')

@section('content')
<h1>Code Challenge</h1>

<form action="/compare" method="get">
  @csrf
  <div class="form-group">
    <label>Word 1</label>
    <input name="word1" type="text" class="form-control @error('word1') is-invalid @enderror" placeholder="Enter first word">
    @error('word1')
      <small class="text-danger">You must enter a word.</small>
    @enderror
  </div>
  <div class="form-group">
    <label>Word 2</label>
    <input name="word2" type="text" class="form-control @error('word2') is-invalid @enderror" placeholder="Enter second word">
    @error('word2')
      <small class="text-danger">You must enter a word.</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select the comparison type</label>
    <select name="comparisonType" class="form-control @error('comparisonType') is-invalid @enderror" >
      <option></option>
      <option>Anagram</option>
      <option>Palindrome</option>
    </select>
    <small class="form-text text-muted">Enter the type of comparison you want to make</small>
    @error('comparisonType')
      <small class="text-danger">You must enter a comparison type.</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<br />
<h1>Results</h1>

<form method="get" action="/">
  <label>Order by: </label>
  <button type="submit" name="ascending" value="ascending" class="btn btn-light"><i class="fa fa-arrow-up"></i>Ascending</button>
  <button type="submit" name="descending" value="descending" class="btn btn-light"><i class="fa fa-arrow-down"></i>Descending</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Word 1</th>
      <th scope="col">Word 2</th>
      <th scope="col">Comparison Type</th>
      <th scope="col">Time Taken</th>
      <th scope="col">Result</th>
      <th scope="col">Date & Time of Comparison</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($word as $words )

      <tr>
        <td>{{$words->word1}}</td>
        <td>{{$words->word2}}</td>
        <td>{{$words->comparisonType}}</td>
        <td>{{$words->timeTaken}} ms</td>
        <td>{{$words->result}}</td>
        <td>{{$words->created_at}}</td>
      </tr>
    @endforeach
  </tbody>
</table>



@endsection
