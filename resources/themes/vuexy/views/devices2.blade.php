<x-layout-dashboard title="{{__('Devices')}}">
<!--breadcrumb-->
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);">{{__('Devices')}}</a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active">{{__('Whatsapp Account')}}</li>
		</ol>
	</nav>
	<!--end breadcrumb-->
	{{-- alert --}}
	@if (session()->has('alert'))
        <x-alert>
            @slot('type', session('alert')['type'])
            @slot('msg', session('alert')['msg'])
        </x-alert>
    @endif
    @if ($errors->any())
		<div class="alert alert-danger alert-dismissible" role="alert">
			<h4 class="alert-heading d-flex align-items-center">
				<span class="alert-icon rounded">
					<i class="icon-base ti tabler-face-id-error icon-md"></i>
				</span>
				{{__('Oh Error :(')}}
			</h4>
			<hr>
			<p class="mb-0">
				<p>{{__('The given data was invalid.')}}</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
			</p>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
    @endif
              <div class="row g-6">

                <!-- Projects table -->
                <div class="col-xxl-8">
                  <div class="card">
				  <div class="card-header">
					<div class="d-flex align-items-center">
                            <h5 class="mb-0">{{__('Whatsapp Account')}}</h5>
                            <form class="ms-auto position-relative">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addDevice"><i class="bi bi-plus"></i> {{__('Add Device')}}</button>

                            </form>
                        </div>
				  </div>
                    <div class="table-responsive mb-4">
                            <table class="table datatable-project table-sm">
                                <thead class="border-top">
                                    <th>{{__('Number')}}</th>
                                    <th class="text-nowrap">{{__('Webhook URL')}}</th>
									<th>{{__('Read')}}</th>
									<th class="text-nowrap">{{__('Reject Call')}}</th>
									<th>{{__('Available')}}</th>
									<th>{{__('Typing')}}</th>
									<th>{{__('Delay')}}</th>
                                    <th>{{__('Sent')}}</th>
                                    <th>{{__('status')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                    @if ($numbers->total() == 0)
                                        <x-no-data colspan="10" text="No Device added yet" />
                                    @endif
                                    @foreach ($numbers as $number)
                                        <tr>

                                            <td><small>{{ $number['body'] }}</small></td>
                                            <td>
                                                <form action="" method="post">
                                                    @csrf
                                                    <input type="text"
                                                        class="form-control form-control-solid-bordered webhook-url-form"
                                                        data-id="{{ $number['body'] }}" name=""
                                                        value="{{ $number['webhook'] }}" id="">
                                                </form>
                                            </td>
											<td>
												<div class="form-check form-switch">
													<input data-url="{{ route('setHookRead') }}"
														class="form-check-input toggle-read" type="checkbox"
														data-id="{{ $number['body'] }}"
														{{ $number['webhook_read'] ? 'checked' : '' }} />
													<label class="form-check-label"
														for="toggle-switch">{{ $number['webhook_read'] ? __('Yes') : __('No') }}</label>
												</div>
											</td>
											<td>
												<div class="form-check form-switch">
													<input data-url="{{ route('setHookReject') }}"
														class="form-check-input toggle-reject" type="checkbox"
														data-id="{{ $number['body'] }}"
														{{ $number['webhook_reject_call'] ? 'checked' : '' }} />
													<label class="form-check-label"
														for="toggle-switch">{{ $number['webhook_reject_call'] ? __('Yes') : __('No') }}</label>
												</div>
											</td>
											<td>
												<div class="form-check form-switch">
													<input data-url="{{ route('setAvailable') }}"
														class="form-check-input toggle-available" type="checkbox"
														data-id="{{ $number['body'] }}"
														{{ $number['set_available'] ? 'checked' : '' }} />
													<label class="form-check-label"
														for="toggle-switch">{{ $number['set_available'] ? __('Yes') : __('No') }}</label>
												</div>
											</td>
											<td>
												<div class="form-check form-switch">
													<input data-url="{{ route('setHookTyping') }}"
														class="form-check-input toggle-typing" type="checkbox"
														data-id="{{ $number['body'] }}"
														{{ $number['webhook_typing'] ? 'checked' : '' }} />
													<label class="form-check-label"
														for="toggle-switch">{{ $number['webhook_typing'] ? __('Yes') : __('No') }}</label>
												</div>
											</td>
											<td style="width: 10%">
                                                <form action="" method="post">
                                                    @csrf
                                                    <input type="text"
                                                        class="form-control form-control-solid-bordered delay-url-form"
                                                        data-id="{{ $number['body'] }}" name=""
                                                        value="{{ $number['delay'] }}" id="">
                                                </form>
                                            </td>
                                            <td>{{ $number['message_sent'] }}</td>
                                            <td><span
                                                    class="badge bg-{{ $number['status'] == 'Connected' ? 'success' : 'danger' }}"> </span>
                                            </td>
                                            <td>
												<div class="dropdown position-static">
													<a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-base ti tabler-dots-vertical icon-22px"></i></a>
													<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
														<li>
															<a href="{{ route('scan', $number->body) }}" class="dropdown-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('connect Via QR') }}">
																<i class="fa-solid fa-qrcode me-2"></i> {{ __('connect Via QR') }}
															</a>
														</li>
														<li>
															<hr class="dropdown-divider">
														</li>
														<li>
															<form action="{{ route('deleteDevice') }}" method="POST">
																@method('delete')
																@csrf
																<input name="deviceId" type="hidden" value="{{ $number['id'] }}">
																<button type="submit" name="delete" class="dropdown-item text-danger">
																	<i class="fa fa-trash me-2"></i> {{ __('Delete') }}
																</button>
															</form>
														</li>
													</ul>
												</div>
											</td>
                                        </tr>
                                    @endforeach


                                </tbody>
								<tfoot></tfoot>
                            </table>
                        </div>
						<div class="row mx-3 justify-content-between">
							{{ $numbers->links('pagination::bootstrap-5') }}
						</div>
                  </div>
                </div>
                <!--/ Projects table -->
              </div>
			  <div class="modal fade" id="addDevice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Add Device')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addDevice') }}" method="POST">
                        @csrf
                        <label for="sender" class="form-label">{{__('Number')}}</label>
                        <input type="number" name="sender" class="form-control" id="nomor" required>
                        <p class="text-small text-danger">*{{__('Use Country Code ( without + )')}}</p>
                        <label for="urlwebhook" class="form-label">{{__('Link webhook')}}</label>
                        <input type="text" name="urlwebhook" class="form-control" id="urlwebhook">
                        <p class="text-small text-danger">*{{__('Optional')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                    <button type="submit" name="submit" class="btn btn-primary">{{__('Save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<script>
    var typingTimer; //timer identifier
    var doneTypingInterval = 1000;
window.addEventListener('load', function() {
			$(document).ready(function() {
    $('.webhook-url-form').on('keyup', function() {
        clearTimeout(typingTimer);
        let value = $(this).val();
        let number = $(this).data('id');

        typingTimer = setTimeout(function() {

            $.ajax({
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('setHook') }}',
                data: {
                    csrf: $('meta[name="csrf-token"]').attr('content'),
                    number: number,
                    webhook: value
                },
                dataType: 'json',
                success: (result) => {
                    notyf.success('{{__("Webhook URL has been updated")}}');
                },
                error: (err) => {
                    console.log(err.responseJSON?.msg);
                }
            })
        }, doneTypingInterval);
    });
	
	$('.delay-url-form').on('keyup', function() {
        clearTimeout(typingTimer);
        let value = $(this).val();
        let number = $(this).data('id');

        typingTimer = setTimeout(function() {

            $.ajax({
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('setDelay') }}',
                data: {
                    csrf: $('meta[name="csrf-token"]').attr('content'),
                    number: number,
                    delay: value
                },
                dataType: 'json',
                success: (result) => {
                    notyf.success('{{__("Delay has been updated")}}');
                },
                error: (err) => {
                    console.log(err);
                }
            })
        }, doneTypingInterval);
    });
	
	$(".toggle-read").on("click", function () {
		let dataId = $(this).data("id");
		let isChecked = $(this).is(":checked");
		let url = $(this).data("url");
		$.ajax({
			url: url,
			type: "POST",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			data: {
				webhook_read: isChecked ? "1" : "0",
				id: dataId,
			},
			success: function (result) {
				if(!result.error){
					// find label
					let label = $(`.toggle-read[data-id=${dataId}]`)
						.parent()
						.find("label");
					// change label
					if (isChecked) {
						label.text("{{__('Yes')}}");
					} else {
						label.text("{{__('No')}}");
					}
					notyf.success(result.msg);
				}
			},
		});
	});
	
	$(".toggle-reject").on("click", function () {
		let dataId = $(this).data("id");
		let isChecked = $(this).is(":checked");
		let url = $(this).data("url");
		$.ajax({
			url: url,
			type: "POST",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			data: {
				webhook_reject_call: isChecked ? "1" : "0",
				id: dataId,
			},
			success: function (result) {
				if(!result.error){
					// find label
					let label = $(`.toggle-reject[data-id=${dataId}]`)
						.parent()
						.find("label");
					// change label
					if (isChecked) {
						label.text("{{__('Yes')}}");
					} else {
						label.text("{{__('No')}}");
					}
					notyf.success(result.msg);
				}
			},
		});
	});
	
	$(".toggle-typing").on("click", function () {
		let dataId = $(this).data("id");
		let isChecked = $(this).is(":checked");
		let url = $(this).data("url");
		$.ajax({
			url: url,
			type: "POST",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			data: {
				webhook_typing: isChecked ? "1" : "0",
				id: dataId,
			},
			success: function (result) {
				if(!result.error){
					// find label
					let label = $(`.toggle-typing[data-id=${dataId}]`)
						.parent()
						.find("label");
					// change label
					if (isChecked) {
						label.text("{{__('Yes')}}");
					} else {
						label.text("{{__('No')}}");
					}
					notyf.success(result.msg);
				}
			},
		});
	});

	$(".toggle-available").on("click", function () {
		let dataId = $(this).data("id");
		let isChecked = $(this).is(":checked");
		let url = $(this).data("url");
		$.ajax({
			url: url,
			type: "POST",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			data: {
				set_available: isChecked ? "1" : "0",
				id: dataId,
			},
			success: function (result) {
				if(!result.error){
					// find label
					let label = $(`.toggle-available[data-id=${dataId}]`)
						.parent()
						.find("label");
					// change label
					if (isChecked) {
						label.text("{{__('Yes')}}");
					} else {
						label.text("{{__('No')}}");
					}
					notyf.success(result.msg);
				}
			},
		});
	});
	});
	});
</script>

</x-layout-dashboard>