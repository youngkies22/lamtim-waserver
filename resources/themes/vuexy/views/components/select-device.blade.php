                               <li class="menu-item">
							   <div class="menu-link px-0">
                                   <select class="form-control" id="device_idd" name="device_id" style="cursor: pointer;">
                                       <option value="" disabled selected>{{__('Select Device')}}</option>
                                       @foreach ($numbers as $device)
                                           {{-- if session has selectedDevice and match = --}}
                                           @if (Session::has('selectedDevice') && Session::get('selectedDevice')['device_body'] == $device->body)
                                               {{-- make variable selected true --}}
                                               <option value="{{ $device->id }}" selected>{{ $device->body }}
                                                   ({{ __($device->status) }})</option>
                                           @else
                                               <option value="{{ $device->id }}">{{ $device->body }}
                                                   ({{ __($device->status) }})</option>
                                           @endif
                                       @endforeach
                                   </select>
								   </div>
                               </li>

                               <script>
                                   //  on select device
                                window.onload = function() {
									$(document).ready(function() {
									   $('#device_idd').on('change', function() {
										   var device = $(this).val();
										   $.ajax({
											   url: "{{ route('setSessionSelectedDevice') }}",
											   type: "POST",
											   data: {
												   _token: "{{ csrf_token() }}",
												   device: device
											   },
											   success: function(data) { // reload page
												   if (data.error) {
													   notyf.error(data.msg);
													   // reload in 1 second
													   setTimeout(function() {
														   location.reload();
													   }, 1000);
												   } else {
													   notyf.success(data.msg);
													   // reload in 1 second
													   setTimeout(function() {
														   location.reload();
													   }, 1000);
												   }
											   }
										   });
									   });
									});
								};
                               </script>
