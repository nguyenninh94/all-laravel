@extends('layouts.master')
@section('title')
   Import - Export Exel
@endsection()

@section('content')
   <div class="panel panel-primary">
   	 <div class="panel-heading">
   	 	<h3 class="panel-title" style="padding:12px;font-size:25px;">Import - Export Excel</h3>
   	 </div>
   	 <div class="panel-body">
   	 	@include('partials.flash')
   	 </div>

   	 <h3>Import File Form</h3>
   	 <form action="{{url('/importExcel')}}" class="form-horizontal" method="POST" style="border:4px solid #a1a1a1;margin-top: 15px; padding: 20px;" enctype="multipart/form-data">
   	 	  <input type="file" name="import_file"/>
   	 	  {{ csrf_field() }}
   	 	  </br>
   	 	  <button class="btn btn-primary">Import CSV or Excel</button>
   	 </form>
   	 <br>

   	 <h3>Import File From Database</h3>
   	 <div style="border:4px solid #a1a1a1;margin-top: 15px; padding: 20px;">
   	 	<a href="{{url('/downloadExel/xls')}}" class="btn btn-success btn-lg">Xls</a>
   	 	<a href="{{url('/downloadExel/xlsx')}}" class="btn btn-success btn-lg">Xlsx</a>
   	 	<a href="{{url('/downloadExel/csv')}}" class="btn btn-success btn-lg">Csv</a>
   	 	<a href="{{url('/downloadPdf')}}" class="btn btn-success btn-lg">Pdf</a>
   	 </div>
   </div>
@endsection()