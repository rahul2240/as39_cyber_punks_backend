@extends('layouts.dashboard')
@section('content')

<div class="card">
	<div class="card-body">
		<p class="h1 text-center">{{ $title }} &nbsp <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#basicExampleModal"><i class="fa fa-users mr-1"></i>Share</button> </p>
		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<form action="{{ route('access.grant', $tnc_id) }}" method="POST">
					@csrf
						<div class="modal-header">
							<h6 class="modal-title" id="exampleModalLabel">Share with others</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>People</p>
							<select class="js-example-basic-multiple" style="width: 75%" name="users[]" multiple="multiple">
								@foreach($users_not_given_access as $user)
									<option value="{{ $user->id }}">{{ $user->email }}</option>
								@endforeach
							</select>
							<select class="js-example-basic-single" style="width: 15%" name="access">
								<option value="2">Can edit</option>
								<option value="1">Can read</option>
							</select>
							<p><a onclick="myfunction()">Shared with @foreach($users_with_access as $user){{ $user->email }}, @endforeach</a></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModalLongSC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitleSC"
		      aria-hidden="true">
		      <div class="modal-dialog modal-dialog-scrollable" role="document">
		        <div class="modal-content">
		        	<form action="{{ route('accesses.update', $tnc_id) }}" method="POST">
		        		@csrf
		        		@method('PUT')
		          		<div class="modal-header">
		            		<h5 class="modal-title" id="exampleModalLongTitleSC">Sharing settings</h5>
		            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              		<span aria-hidden="true">&times;</span>
		            		</button>
		          		</div>
		          		<div class="modal-body">
		            		<p>Who has access</p>
		            		@foreach($users_with_access as $user)
		            		<p>
		            			<i class="fa fa-user mr-1"></i>{{ $user->email }}
		            			<select class="js-example-basic-single" style="width: 20%" name="access[{{ $user->id }}]">
		            				<option value="2">Can edit</option>
		            				<option value="1">Can read</option>
		            				<option value="0">Remove</option>
		            			</select>
		           			</p>
		            		@endforeach
		          		</div>
		          		<div class="modal-footer">
		            		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		            		<button type="submit" class="btn btn-primary">Save changes</button>
		          		</div>
		      		</form>
		        </div>
		      </div>
		    </div>

		<div>
			<iframe allow="geolocation; microphone; camera" src="{{ config('etherpad.url') }}/p/{{ $padID }}" allowfullscreen style="width: 100%;border: none"></iframe>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    	$('.js-example-basic-multiple').select2();
    	$('.js-example-basic-single').select2();
    	$('iframe').css('height', $(window).height());
	});
	function myfunction(){
		$('#basicExampleModal').modal('hide');
		$('#exampleModalLongSC').modal('show');
	}
</script>
@endsection
