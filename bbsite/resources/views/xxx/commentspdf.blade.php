@extends('layouts.master')
@section('title')
  Download Pdf
@endsection()

@section('content')
   <h1>Comments List</h1>
   <div class="row">
   	  <table>
   	  	<thead>
   	  		<th>No</th>
   	  		<th>Author</th>
   	  		<th>Body</th>
   	  		<th>Date</th>
   	  	</thead>
   	  	<tbody>
   	  	  @if($comments)
   	  	   <?php $no=0; ?>
   	  	   @foreach($comments as $comment)
   	  		<tr>
   	  			<td>{{$no++}}</td>
   	  			<td>{{$comment->author_name}}</td>
   	  			<td>{{$comment->body}}</td>
   	  			<td>{{$comment->created_at}}</td>
   	  		</tr>
   	  	   @endforeach
   	  	  @else
   	  	    <h3>No Comments</h3> 	
   	  	  @endif   
   	  	</tbody>
   	  </table>
   </div>
@endsection()  
