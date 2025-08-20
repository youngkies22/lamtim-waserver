<!doctype html>

<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="layout-wide customizer-hide"
  dir="{{ in_array(app()->getLocale(), ['ar', 'he', 'fa']) ? 'rtl' : 'ltr' }}"
  data-skin="default"
  data-assets-path="{{asset('/')}}"
  data-template="vuexy-magd"
  data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{config('config.site_name')}} ,Whatsapp gateway Multi device Beta version">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="waapi,wa gateway, whatsapp blast, wamp, mpwa, m pedia wa gateway, wa gateway m pedia, ">

    <title>{{ $title }} | {{config('config.site_name')}}</title>
	
	<link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('vendor/fonts/iconify-icons.css')}}" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{asset('vendor/libs/node-waves/node-waves.css')}}" />

    <link rel="stylesheet" href="{{asset('vendor/libs/pickr/pickr-themes.css')}}" />

    <link rel="stylesheet" href="{{asset('vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{asset('css/default.css')}}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- endbuild -->

    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('vendor/libs/@form-validation/form-validation.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('vendor/js/helpers.js')}}"></script>
    <script src="{{asset('vendor/js/template-customizer.js')}}"></script>

    <script src="{{asset('js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    {{ $slot }}

    <!-- / Content -->

    <!-- Core JS -->

    <script src="{{asset('vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{asset('vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('vendor/libs/node-waves/node-waves.js')}}"></script>

    <script src="{{asset('vendor/libs/@algolia/autocomplete-js.js')}}"></script>

    <script src="{{asset('vendor/libs/pickr/pickr.js')}}"></script>

    <script src="{{asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('vendor/libs/hammer/hammer.js')}}"></script>

    <script src="{{asset('vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('vendor/libs/@form-validation/popular.js')}}"></script>
    <script src="{{asset('vendor/libs/@form-validation/bootstrap5.js')}}"></script>
    <script src="{{asset('vendor/libs/@form-validation/auto-focus.js')}}"></script>

    <!-- Main JS -->
	<script>
		let Translate = {};
		Translate.placeholder = '{{__("Search [CTRL + K]")}}';
		Translate.no_result = '{{__("No results found")}}';
	</script>
    <script src="{{asset('js/main.js')}}"></script>
	
	<script>
	if (typeof TemplateCustomizer !== 'undefined') {
		TemplateCustomizer.LANGUAGES.{{ str_replace('_', '-', app()->getLocale()) }} = {
			panel_header: '{{__("Template Customizer")}}',
			panel_sub_header: '{{__("Customize and preview in real time")}}',
			theming_header: '{{__("Theming")}}',
			color_label: '{{__("Primary Color")}}',
			theme_label: '{{__("Theme")}}',
			skin_label: '{{__("Skins")}}',
			semiDark_label: '{{__("Semi Dark")}}',
			layout_header: '{{__("Layout")}}',
			layout_label: '{{__("Menu (Navigation)")}}',
			layout_header_label: '{{__("Header Types")}}',
			content_label: '{{__("Content")}}',
			layout_navbar_label: '{{__("Navbar Type")}}',
			direction_label: '{{__("Direction")}}'
		};
	  window.templateCustomizer = new TemplateCustomizer({
		displayCustomizer: true,
		lang: '{{ str_replace('_', '-', app()->getLocale()) }}',
		controls: [
		  'color',
		  'theme',
		  'semiDark',
		  'layoutCollapsed',
		  'layoutNavbarOptions',
		  'headerType',
		]
	  });
	}
	</script>

  </body>
</html>
