<?php
/*
Copyright © Magd Almuntaser, OneXGen Technology. All rights reserved.
Project: MPWA Whatsapp Gateway | Multi Device
Licensed under the CC BY-NC-ND 4.0 License.
For details, visit https://creativecommons.org/licenses/by-nc-nd/4.0/.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Symfony\Component\Intl\Languages;

class AibotController extends Controller
{
    public function index(Request $request)
    {
		$allLanguages = Languages::getNames('en');
		$languages = [];
        foreach ($allLanguages as $code => $name) {
            $languages[$name] = $name;
        }
		$selectedDevice = session()->get('selectedDevice');
		if($selectedDevice){
			$device = Device::find($selectedDevice['device_id']);
		}else{
			$device = "";
		}
        return view('theme::pages.aibot', compact('device', 'languages'));
    }
	
	public function store(Request $request)
	{
		$device_id = session()->get('selectedDevice')['device_id'];
		$device = Device::find($device_id);
		$device->typebot = $request->input('typebot');
		$device->reject_call = $request->has('reject_call');
		$device->reject_message = $request->input('reject_message');
		$device->can_read_message = $request->has('can_read_message');
		$device->bot_typing = $request->has('bot_typing');
		$device->system_instructions = $request->input('system_instructions');
		$device->reply_when = $request->input('reply_when');
		$device->chatgpt_name = $request->input('chatgpt_name');
		$device->chatgpt_api = $request->input('chatgpt_api');
		$device->gemini_name = $request->input('gemini_name');
		$device->gemini_api = $request->input('gemini_api');
		$device->claude_name = $request->input('claude_name');
		$device->claude_api = $request->input('claude_api');
		$device->dalle_name = $request->input('dalle_name');
		$device->dalle_api = $request->input('dalle_api');
		$device->bexa_api_key = $request->input('bexa_api_key');
		$device->bexa_name = $request->input('bexa_name');
		$device->bexa_company_name = $request->input('bexa_company_name');
		$device->bexa_company_website = $request->input('bexa_company_website');
		$device->bexa_company_address = $request->input('bexa_company_address');
		$device->bexa_company_phone = $request->input('bexa_company_phone');
		$device->bexa_company_email = $request->input('bexa_company_email');
		$device->bexa_custom = $request->input('bexa_mode') === 'custom';
		$device->bexa_language = $request->input('bexa_language');
		if ($device->bexa_custom) {
			$device->bexa_function = $request->input('bexa_function');
			$device->bexa_industry = $request->input('bexa_industry');
			$device->bexa_product_input_type = $request->input('bexa_product_input_type');
			$device->bexa_product_link = $request->input('bexa_product_link');
			$device->bexa_products = json_encode($request->input('bexa_products', []));
			$device->bexa_system_custom_instructions = $request->has('bexa_system_custom_instructions');
			$device->bexa_system_instructions = $request->input('bexa_system_instructions');
		}
		$device->save();
		clearCacheNode();
		return redirect()->route('aibot')->with('alert', [
			'type' => 'success',
			'msg'  => __('Bot configuration saved successfully.')
		]);
	}
}
