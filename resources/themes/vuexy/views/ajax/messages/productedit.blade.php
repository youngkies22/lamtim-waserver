		<div class="col-12">
            <label class="form-label">{{ __('Message *optional') }}</label>
            <textarea name="footer" class="form-control" id="footer">{{$message->footer ?? ''}}</textarea>
        </div>

        <div class="col-md-12 position-relative">
			<label class="form-label">{{ __('WhatsApp Product URL') }}</label>
			<input type="text" class="form-control" id="productUrl" placeholder="https://wa.me/p/1234567890123456/628xxxxxx" value="{{ !empty($message->product->productId) ? 'https://wa.me/p/'.$message->product->productId.'/'.str_replace('@s.whatsapp.net', '', $message->businessOwnerJid ?? '').'' : '' }}" required>
			<div id="loadingIcon" class="spinner-border text-primary position-absolute" style="right:15px;top:34px;display:none;width:1.2rem;height:1.2rem;" role="status"></div>
		</div>

		<div id="productPreview" class="col-12" style="display: block;">
	<div class="card border shadow-sm">
		<div class="card-body d-flex flex-column flex-md-row align-items-center">
			<div class="me-md-3 mb-3 mb-md-0">
				<img id="productImage" src="{{ $message->product->productImage->url ?? '' }}" class="rounded border shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
			</div>
			<div class="text-center text-md-start">
				<h6 id="productTitleView" class="mb-1">{{ $message->product->title ?? '' }}</h6>
				<small id="productCompany" class="text-muted d-block mb-1">{{ $message->product->retailerId ?? '' }}</small>
				<small id="productPrice" class="text-muted d-block mb-1">
					{!! __('Price:') !!}

					@if (!empty($message->product->salePriceAmount1000))
						<del class="text-muted me-2">{{ number_format($message->product->priceAmount1000 / 1000) }}</del>
						<strong>{{ number_format($message->product->salePriceAmount1000 / 1000) }} {{ $message->product->currencyCode ?? '' }}</strong>
					@else
						<strong>{{ !empty($message->product->priceAmount1000) ? number_format($message->product->priceAmount1000 / 1000) : '' }} {{ $message->product->currencyCode ?? '' }}</strong>
					@endif
				</small>
				<small id="productDesc" class="text-muted">
					{{ $message->product->description ?? '' }}
				</small>
			</div>
		</div>
	</div>

	<input type="hidden" name="product_id" id="productId" value="{{ $message->product->productId ?? '' }}">
	<input type="hidden" name="phone" id="phoneNumber" value="{{ str_replace('@s.whatsapp.net', '', $message->businessOwnerJid ?? '') }}">
	<input type="hidden" name="product_title" id="productTitle" value="{{ $message->product->title ?? '' }}">
	<input type="hidden" name="company_name" id="companyName" value="{{ $message->product->retailerId ?? '' }}">
	<input type="hidden" name="description" id="description" value="{{ $message->product->description ?? '' }}">
	<input type="hidden" name="price" id="price"
		value="{{ !empty($message->product->salePriceAmount1000)
			? number_format($message->product->salePriceAmount1000 / 1000)
			: (!empty($message->product->priceAmount1000) ? number_format($message->product->priceAmount1000 / 1000) : '') }}">

	<input type="hidden" name="old_price" id="oldPrice"
		value="{{ !empty($message->product->salePriceAmount1000)
			? number_format($message->product->priceAmount1000 / 1000)
			: '' }}">
		<input type="hidden" name="currency" id="currency" value="{{ $message->product->currencyCode ?? '' }}">
		<input type="hidden" name="image" id="imageUrl" value="{{ $message->product->productImage->url ?? '' }}">
</div>


<script>
document.getElementById('productUrl').addEventListener('input', function () {
    const url = this.value.trim();
    if (!url.includes('wa.me/p/')) {
        notyf.error('{{ __("Make sure you are using the correct link (wa.me/p/)") }}');
        return;
    }

    const input = this;
    const loader = document.getElementById('loadingIcon');
    input.disabled = true;
    loader.style.display = 'inline-block';

    fetch(`{{ route('fetch.whatsapp.product') }}?url=${encodeURIComponent(url)}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('productId').value = data.productId || '';
            document.getElementById('phoneNumber').value = data.phoneNumber || '';
            document.getElementById('productTitle').value = data.productTitle || '';
            document.getElementById('companyName').value = data.companyName || '';
            document.getElementById('description').value = data.description || '';
            document.getElementById('price').value = data.price || '';
            document.getElementById('oldPrice').value = data.oldPrice || '';
            document.getElementById('currency').value = data.currency || '';
            document.getElementById('imageUrl').value = data.image || '';

            document.getElementById('productTitleView').textContent = data.productTitle || '-';
            document.getElementById('productCompany').textContent = data.companyName || '-';
            document.getElementById('productPrice').textContent = data.price 
                ? `{{ __('Price:') }} ${data.price} ${data.currency || ''}` : '';
            document.getElementById('productDesc').textContent = data.description || '';
            document.getElementById('productImage').src = data.image || '';
			
			const oldPrice = data.oldPrice ? '<del class="text-muted me-2">'+data.oldPrice+'</del>' : '';
			const currentPrice = data.price ? (data.price + ' ' + (data.currency || '')) : '';
			document.getElementById('productPrice').innerHTML = '{{ __("Price:") }} '+oldPrice+'<strong>'+currentPrice+'</strong>';

            document.getElementById('productPreview').style.display = 'block';
        })
        .catch(() => notyf.error('{{ __("Failed to fetch product data") }}'))
        .finally(() => {
            input.disabled = false;
            loader.style.display = 'none';
        });
});
if (document.getElementById('productUrl').value.trim() !== '') {
    document.getElementById('productUrl').dispatchEvent(new Event('input'));
}
</script>