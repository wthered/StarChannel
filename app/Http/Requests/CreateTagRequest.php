<?php

	namespace App\Http\Requests;

	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Support\Facades\Auth;

	class CreateTagRequest extends FormRequest {
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
				'tag' => 'required|string|max:255|unique:tags,tag_name'
			];
		}
	}
