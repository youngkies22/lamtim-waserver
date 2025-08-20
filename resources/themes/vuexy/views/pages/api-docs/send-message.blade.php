<div class="tab-pane fade show active" id="sendmessage" role="tabpanel">
	<div class="d-flex mb-3 gap-3">
		<div>
			<span class="badge bg-label-primary rounded-2 p-2">
			<i class="ti tabler-message icon-32px"></i>
			</span>
		</div>
		<div>
			<h4 class="mb-0 lh-sm">
				<span class="align-middle">Send Text API</span>
			</h4>
			<small>Api Docs Sending Text Messages</small>
		</div>
	</div>
	<div id="accordionPayment" class="accordion">
		<div class="card">
			<div class="card-body">
				<p>Method : <code class="text-success">POST</code> | <code class="text-primary">GET</code></p>
				<p>Endpoint: <code>{{ url('/') }}/send-message</code></p>
				<p>Request Body : (JSON If POST)</p>
				<table class="table">
					<thead>
						<tr>
							<th>Parameter</th>
							<th>Type</th>
							<th>Required</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>api_key</td>
							<td>string</td>
							<td>Yes</td>
							<td>API Key</td>
						</tr>
						<tr>
							<td>sender</td>
							<td>string</td>
							<td>Yes</td>
							<td>Number of your device</td>
						</tr>
						<tr>
							<td>number</td>
							<td>string</td>
							<td>Yes</td>
							<td>recipient number ex 72888xxxx|62888xxxx</td>
						</tr>
						<tr>
							<td>message</td>
							<td>string</td>
							<td>Yes</td>
							<td>Messsage to be sent</td>
						</tr>
						<tr>
							<td>footer</td>
							<td>string</td>
							<td>Yes</td>
							<td>Footer under message</td>
						</tr>
					</tbody>
				</table>
				<br>
				<p>Example JSON Request</p>
<pre class="bg-dark rounded text-white"><code>{
    "api_key": "1234567890",
    "sender": "62888xxxx",
    "number": "62888xxxx",
    "message": "Hello World",
    "footer": "Sent via mpwa"
}</code></pre>
				<p>Example URL Request</p>
<pre class="bg-dark rounded text-white"><code class="json">{{ url('/') }}/send-message?api_key=1234567890&sender=62888xxxx&number=62888xxxx&message=Hello World&footer=Sent via mpwa</code></pre>
				<p>Example JSON Response</p>
<pre class="bg-dark rounded text-white"><code>{
    "status":true,
    "msg":"Message sent successfully!"
}</code></pre>
			</div>
		</div>
	</div>
</div>