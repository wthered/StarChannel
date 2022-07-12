<?php

	namespace App\Http\Requests;

	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Support\Facades\Auth;

	class StoreArticleRequest extends FormRequest {
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
		public function rules(): array {
			return [
				'title' => 'required|string|max:255|unique:articles,title',
				'subtitle' => 'required|string|max:255',
				'slug' => 'max:255',
				'body' => 'required|string',
				'category' => 'required|integer'
			];
		}
	}
