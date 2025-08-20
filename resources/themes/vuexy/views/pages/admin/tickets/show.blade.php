<x-layout-dashboard title="{{ __('Ticket Details') }}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
	
    <div class="card mb-4">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-4">
    <div class="d-flex align-items-center gap-3">
        <div class="avatar bg-label-primary rounded-circle d-flex align-items-center justify-content-center">
            <i class="icon-base ti tabler-ticket icon-26px"></i>
        </div>
        <div>
            <h6 class="mb-1">#{{ $ticket->id }}</h6>
            <p class="text-muted mb-0">{{ $ticket->title }}</p>
        </div>
    </div>
</div>


                <div class="col-md-2 text-center">
                    <small class="text-muted">{{ __('Status') }}</small>
                    <div class="mt-1">
                        <span class="badge rounded-pill bg-{{ $ticket->status === 'open' ? 'success' : 'secondary' }}-subtle text-{{ $ticket->status === 'open' ? 'success' : 'secondary' }}">
                            {{ __(ucfirst($ticket->status)) }}
                        </span>
                    </div>
                </div>

                <div class="col-md-2 text-center">
                    <small class="text-muted">{{ __('Priority') }}</small>
                    <div class="mt-1">
                        <span class="badge rounded-pill bg-{{ $ticket->priority === 'high' ? 'danger' : ($ticket->priority === 'medium' ? 'warning' : 'info') }}-subtle text-{{ $ticket->priority === 'high' ? 'danger' : ($ticket->priority === 'medium' ? 'warning' : 'info') }}">
                            {{ __(ucfirst($ticket->priority)) }}
                        </span>
                    </div>
                </div>

                <div class="col-md-2 text-center">
                    <small class="text-muted">{{ __('Created By') }}</small>
                    <div class="mt-1">{{ $ticket->user->username ?? __('Deleted') }}</div>
                </div>

                <div class="col-md-2 text-center">
                    <small class="text-muted">{{ __('Created At') }}</small>
                    <div class="mt-1">{{ $ticket->created_at->format('Y-m-d H:i') }}</div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent d-flex justify-content-end gap-2">
            @if($ticket->status === 'open')
                <form action="{{ route('admin.tickets.close', $ticket) }}" method="POST">
                    @csrf
                    <button class="btn btn-warning btn-sm">
                        <i class="ti tabler-lock"></i> {{ __('Close Ticket') }}
                    </button>
                </form>
            @else
                <form action="{{ route('admin.tickets.reopen', $ticket) }}" method="POST">
                    @csrf
                    <button class="btn btn-success btn-sm">
                        <i class="ti tabler-unlock"></i> {{ __('Reopen Ticket') }}
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Messages') }}</h5>
        </div>
        <div class="card-body">
            @forelse($ticket->messages as $message)
                <div class="card mb-4 shadow-sm border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <strong>{{ $message->user->username ?? __('Deleted') }}</strong>
                                <span class="text-muted ms-2">
                                    {{ \App\Traits\ConvertsDates::convertToUserTimezone($message->updated_at) }}
                                </span>
                            </div>
                                {!! $message->user_id === $ticket->user_id
								? '<span class="badge bg-label-secondary">'.__('User').'</span>'
								: '<span class="badge bg-label-danger">'.__('Admin').'</span>' !!}
                        </div>
                        <div class="text-body" style="line-height: 10px">
                            {!! $message->message !!}
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">{{ __('No messages yet.') }}</div>
            @endforelse
        </div>
    </div>

    @if($ticket->status === 'open')
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('admin.tickets.reply', $ticket) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="message" class="form-label">{{ __('Reply') }}</label>
						<div id="editor-container" style="height: 200px; background: white;">{{ old('message') }}</div>
                        <input type="hidden" id="message" name="message">
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="ti tabler-send me-1"></i>{{ __('Send Reply') }}
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            {{ __('This ticket is closed') }}
        </div>
    @endif

    <div class="text-start mt-3">
        <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="ti tabler-arrow-left me-1"></i>{{ __('Back to Tickets') }}
        </a>
    </div>
	<script>
        document.addEventListener('DOMContentLoaded', function () {
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'direction': 'rtl' }],
                        [{ 'size': ['small', false, 'large', 'huge'] }],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'align': [] }],
                        ['link'],
                        ['clean']
                    ]
                }
            });

            document.querySelector('form[action="{{ route('admin.tickets.reply', $ticket) }}"]').addEventListener('submit', function () {
                document.getElementById('message').value = quill.root.innerHTML;
            });
        });
    </script>
</x-layout-dashboard>
