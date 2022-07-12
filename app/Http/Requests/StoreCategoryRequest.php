<?php

	namespace App\Http\Requests;

	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Support\Facades\Auth;

	class StoreCategoryRequest extends FormRequest {
		/**
		 * Determine if the user is authorized to make this request.
		 *
		 * @return bool
		 */
		public function authorize(): bool {
			return Auth::check() && !empty(Auth::user()->admin);
		}

		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules() : array {
			return [
				'category_name' => 'required|string|max:255',
				'category_text' => 'string|max:255'
			];
		}
	}
