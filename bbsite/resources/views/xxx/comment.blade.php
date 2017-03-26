@extends('layouts.master')
@section('title')
   Scroll-pagination
@endsection()

@section('content')
   <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="page-header">Comments</h1>
            <form action="{{url('/comment')}}" type="GET">
            <div class="input-group pull-right">
            	<input type="text" name="search" placeholder="Search ..." id="search">
            	<span class="input-group-btn">
            		<button class="btn btn-default" type="submit">
            			<i class="glyphicon glyphicon-search"></i>
            		</button>
            	</span>
            </div>
            </form>
            @if (count($comments) > 0)
                <div class="infinite-scroll">
                  @foreach($comments as $comment)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" width="64" height="64" src="/images/avatar.png" alt="">
                        </a>

                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment->author_name }}
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                        </h4>
                          {{ $comment->body }}
                        <br>
                       <span class="pull-right">
                          <i id="like1" class="glyphicon glyphicon-thumbs-up" style="color: #1abc9c; cursor: pointer;"></i>
                               {{ rand(0, 200) }}
                          <i id="dislike1" class="glyphicon glyphicon-thumbs-down" style="color: #e74c3c; cursor: pointer;"></i>
                              {{ rand(0, 50) }}
                        </span>
                     </div>
                    </div>
                     <hr>
                   @endforeach
                {!! $comments->appends(Request::query())->render() !!}
            </div>
          @endif
    </div>
@endsection()

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>

   <script type="text/javascript">
    	$('ul.pagination').hide();
    	$(function() {
    		$('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.png" alt="Loading..." />',
                padding: 0,
                nextSElector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                	$('ul.pagination').remove();
                }
    		});
    	});
    </script>

    <script type="text/javascript">
        var search = $('#search').val();
    	$('#search').autocomplete({
           source: "{{ url('/comment/search') }}",
           minLength: 1,
           autoFocus: true,
           select: function(e, ui){
           	 $('#search').val(ui.item.value);
           }
    	});
    </script>
@endsection()