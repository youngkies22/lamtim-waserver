<x-layout-dashboard title="{{__('Campaign')}}">
    <nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-custom-icon">
			<li class="breadcrumb-item">
				<a href="javascript:void(0);">{{__('Reports')}}</a>
				<i class="breadcrumb-icon icon-base ti tabler-chevron-right align-middle icon-xs"></i>
			</li>
			<li class="breadcrumb-item active">{{__('Campaign')}}</li>
		</ol>
	</nav>
    <!--end breadcrumb-->
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
    <!--breadcrumb-->
    {{-- end breadcrumb --}}
@if (!session()->has('selectedDevice'))
		<div class="card shadow-sm border-0">
			<div class="alert alert-danger m-4">
				<div class="text-center">{{ __('Please select a device first') }}</div>
			</div>
		</div>
@else
<div class="row g-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <form class="row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label class="form-label">{{ __('Device') }}</label>
                        <input type="number" name="device" class="form-control" value="{{ request()->device ?? '' }}" placeholder="{{ __('Device ID') }}">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label">{{ __('Status') }}</label>
                        <select name="status" class="form-select">
                            <option value="all" {{ request()->status == 'all' ? 'selected' : '' }}>{{ __('All') }}</option>
                            <option value="completed" {{ request()->status == 'completed' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                            <option value="processing" {{ request()->status == 'processing' ? 'selected' : '' }}>{{ __('Processing') }}</option>
                            <option value="waiting" {{ request()->status == 'waiting' ? 'selected' : '' }}>{{ __('Waiting') }}</option>
                            <option value="paused" {{ request()->status == 'paused' ? 'selected' : '' }}>{{ __('Paused') }}</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4 text-end">
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="ti tabler-filter-search me-1"></i> {{ __('Filter Campaign') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0 d-flex align-items-center gap-2">
                    {{ __('Campaigns') }}
                </h5>
                <button onclick="clearCampaign()" type="button"
                    class="btn btn-sm btn-danger d-flex align-items-center gap-1"
                    data-bs-toggle="modal" data-bs-target="#deleteAllModal">
                    <i class="ti tabler-trash"></i> {{ __('Clear Campaign') }}
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive border rounded">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="border-top">
                            <tr>
                                <th>{{ __('Device') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Message') }}</th>
                                <th>{{ __('Schedule') }}</th>
                                <th>{{ __('Summary') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($campaigns->total() == 0)
                                <x-no-data colspan="7" text="{{ __('No Campaigns added yet') }}" />
                            @endif

                            @foreach ($campaigns as $campaign)
                                <tr>
                                    <td class="fw-semibold text-dark">{{ $campaign->device->body ?? '' }}</td>
                                    <td>{{ $campaign->name }}</td>
                                    <td>
                                        <a onclick="viewMessage('{{ $campaign->id }}')" href="javascript:void(0);" class="text-info d-flex align-items-center gap-1 text-decoration-none" title="{{ __('Views Message') }}">
                                            <i class="ti tabler-eye"></i> {{ $campaign->type }}
                                        </a>
                                    </td>
                                    <td>{{ \App\Traits\ConvertsDates::convertToUserTimezone($campaign->schedule) }}</td>
                                    <td>
										<div class="d-flex flex-column gap-1">
											<span class="badge bg-label-primary d-flex justify-content-between align-items-center">
												<span>{{ __('total') }}</span>
												<span class="fw-semibold">{{ $campaign->blasts_count }}</span>
											</span>
											<span class="badge bg-label-success d-flex justify-content-between align-items-center">
												<span>{{ __('Success') }}</span>
												<span class="fw-semibold">{{ $campaign->blasts_success }}</span>
											</span>
											<span class="badge bg-label-danger d-flex justify-content-between align-items-center">
												<span>{{ __('Failed') }}</span>
												<span class="fw-semibold">{{ $campaign->blasts_failed }}</span>
											</span>
											<span class="badge bg-label-warning text-dark d-flex justify-content-between align-items-center">
												<span>{{ __('Waiting') }}</span>
												<span class="fw-semibold">{{ $campaign->blasts_pending }}</span>
											</span>
										</div>
									</td>
                                    <td>
                                        @php
                                            $statusClass = match($campaign->status) {
                                                'completed' => 'success',
                                                'paused' => 'secondary',
                                                'waiting' => 'warning text-dark',
                                                'processing' => 'info',
                                                default => 'danger'
                                            };
                                        @endphp
                                        <span class="badge rounded-pill bg-{{ $statusClass }}-subtle text-{{ $statusClass }}">{{ __($campaign->status) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('campaign.blasts', $campaign->id) }}" class="btn btn-sm btn-outline-primary" title="{{ __('View Data') }}">
                                                <i class="ti tabler-eye"></i>
                                            </a>

                                            @if (in_array($campaign->status, ['processing', 'waiting']))
                                                <a href="javascript:void(0);" onclick="pauseCampaign('{{ $campaign->id }}')" class="btn btn-sm btn-outline-warning" title="{{ __('Pause') }}">
                                                    <i class="ti tabler-pause"></i>
                                                </a>
                                            @endif

                                            @if ($campaign->status == 'paused')
                                                <a href="javascript:void(0);" onclick="resumeCampaign('{{ $campaign->id }}')" class="btn btn-sm btn-outline-success" title="{{ __('Resume') }}">
                                                    <i class="ti tabler-player-play"></i>
                                                </a>
                                            @endif

                                            <a href="javascript:void(0);" onclick="deleteCampaign('{{ $campaign->id }}')" class="btn btn-sm btn-outline-danger" title="{{ __('Delete') }}">
                                                <i class="ti tabler-trash-x"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

				<div class="row mx-3 justify-content-between">
					{{ $campaigns->links('pagination::bootstrap-5') }}
				</div>
            </div>
        </div>
    </div>
</div>


    {{-- end table --}}

    {{-- Modal preview message --}}
    <div class="modal fade" id="previewMessage" tabindex="-1" aria-labelledby="previewMessage" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Campaign Message Preview')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body preview-message-area">
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Preview Message --}}
@endif
</x-layout-dashboard>
<script>
    function viewMessage(id) {
        $.ajax({
            url: `{{route('previewMessage')}}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            data: {
                id: id,
                table: 'campaigns',
                column: 'message'
            },
            dataType: 'html',
            success: (result) => {

                $('.preview-message-area').html(result);
                $('#previewMessage').modal('show')
            },
            error: (error) => {
                console.log(error);
                notyf.error('{{__("something went wrong")}}')
            }
        })
        // 
    }

    function pauseCampaign(id) {
        $.ajax({
            url: "{{ route('campaign.pause', ['id' => '___ID___']) }}".replace('___ID___', id),
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            success: (result) => {
                location.reload();
            },
            error: (error) => {
                notyf.error('{{__("something went wrong when pausing campaign")}}')
            }
        })
    }

    function resumeCampaign(id) {
        $.ajax({
            url: "{{ route('campaign.resume', ['id' => '___ID___']) }}".replace('___ID___', id),
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            success: (result) => {
                location.reload();
            },
            error: (error) => {
                notyf.error('{{__("something went wrong when resuming campaign")}}')
            }
        })
    }

    function deleteCampaign(id) {
        if (!confirm('{{__("Are you sure you want to delete this campaign?")}}')) {
            notyf.error('{{__("Cancel deleting campaign")}}')
            return;
        }
        $.ajax({
            url: "{{ route('campaign.delete', ['id' => '___ID___']) }}".replace('___ID___', id),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            dataType: 'json',
            success: (result) => {
                location.reload();
            },
            error: (error) => {
                notyf.error('{{__("something went wrong when deleting campaign")}} ')
            }
        })
    }

    function clearCampaign(id) {
        if (!confirm('{{__("Are you sure you want to clear this campaign?")}}')) {
            notyf.error('{{__("Cancel clearing campaign")}}')
            return;
        }
        $.ajax({
            url: "{{ route('campaigns.delete.all') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            dataType: 'json',
            success: (result) => {
                location.reload();
            },
            error: (error) => {
                notyf.error('{{__("something went wrong when clearing campaign")}} ')
            }
        })
    }
</script>
