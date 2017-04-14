@extends('addpedia.master')

@section('form')
	<div class="panel panel-default">
		<div class="panel-heading teal">
			<h4>Fill Your Gpa Info</h4>
		</div>
	  <div class="panel-body">
	  	{{ Form::open(['route' => 'gpa.humanities'])}}
			<div class="input-filed col m4">
				{{ Form::label('bangla', 'Bangla') }}
				{{ Form::select('bangla', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('english', 'English')}}
				{{ Form::select('english', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('civics', 'Civics')}}
				{{ Form::select('civics', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('logic', 'Logic')}}
				{{ Form::select('logic', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('history', 'History')}}
				{{ Form::select('history', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('islamic_history', 'Islamic History')}}
				{{ Form::select('islamic_history', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>

			<div class="input-filed col m4">
				{{ Form::label('islamic_studies', 'Islamic Studies')}}
				{{ Form::select('islamic_studies', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>


			<div class="input-filed col m4">
				{{ Form::label('sociology', 'Sociology')}}
				{{ Form::select('sociology', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>


			<div class="input-filed col m4">
				{{ Form::label('social_welfare', 'Social Welfare')}}
				{{ Form::select('social_welfare', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>


			<div class="input-filed col m4">
				{{ Form::label('economics', 'Economics')}}
				{{ Form::select('economics', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>


			<div class="input-filed col m4">
				{{ Form::label('statistics', 'Statistics')}}
				{{ Form::select('statistics', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'
				], null, array('class' => ''))}}
			</div>


			<div class="input-filed col m4">
				{{ Form::label('geography', 'Geography')}}
				{{ Form::select('geography', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'				
				], null, array('class' => ''))}}
			</div>

              <div class="input-filed col m4">
				{{ Form::label('mathmatics', 'Mathmatics')}}
				{{ Form::select('mathmatics', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'				
				], null, array('class' => ''))}}
			</div>

          			<div class="input-filed col m4">
				{{ Form::label('psychology', 'Psychology')}}
				{{ Form::select('psychology', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D',
					'not taken' => 'not taken'			
				], null, array('class' => ''))}}
			</div>
             
              <div class="input-filed col m6s">
				{{ Form::label('high_gpa', 'Highest gpa in Any Humanities Subject')}}
				{{ Form::select('high_gpa', [
					'A+' => 'A+',
					'A' => 'A',
					'A-' => 'A-',
					'B' => 'B',
					'C' => 'C',
					'D' => 'D'
				], null, array('class' => ''))}}
			</div>
             

			</div>
			<div class="input-field col m6">
				{{ Form::label('ssc_gpa', 'SSC GPA')}}
				{{ Form::text('ssc_gpa',null, ['class' => ''])}}
				{{ $errors->first('ssc_gpa')}}
			</div>

             <div class="input-field col m6">
				{{ Form::label('ssc_gpa_without_optional', 'SSC GPA Without 4th Subject')}}
				{{ Form::text('ssc_gpa_without_optional',null, ['class' => ''])}}
				<span style="color:red;">{{ $errors->first('ssc_gpa_without_optional')}}</span>
			</div>

			<div class="input-field col m6">
				{{ Form::label('hsc_gpa', 'HSC GPA')}}
				{{ Form::text('hsc_gpa',null, ['class' => ''])}}
				{{ $errors->first('hsc_gpa')}}
			</div>

            <div class="input-field col m6">
				{{ Form::label('hsc_gpa_without_optional', 'HSC GPA Without 4th Subject')}}
				{{ Form::text('hsc_gpa_without_optional',null, ['class' => ''])}}
				<span style="color:red;">{{ $errors->first('hsc_gpa_without_optional')}}</span>
			</div>

			<div class="input-field col m6">
				{{ Form::hidden('reg_no',$reg_no)}}
			</div>
			
			<div class="input-field col m6">
			{{ Form::hidden('pass_year',$year) }}
			</div>

			<div class="input-filed">
				{{ Form::submit('Submit', ['class'=>'btn btn-primary right'])}}
			</div>
		{{ Form::close()}}
	  </div>
	</div>

	
@stop