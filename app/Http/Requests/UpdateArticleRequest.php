<?php

	namespace App\Http\Requests;

	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Support\Facades\Auth;

	class UpdateArticleRequest extends FormRequest {
		/**
		 * Determine if the user is authorized to make this request.
		 *
		 * @return bool
		 */
		public function authorize(): bool {
			return !empty(Auth::user()->admin);
		}

		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array<string, mixed>
		 */
		public function rules() {
			// Max Filesize 2MB or 2048kB
			return [
				'ArticleTittle' => 'required|string|max:255',
				'ArticleSubtitle' => 'required|string|max:255',
				'ArticleBody' => 'required|string',
				'ArticleImage' => 'required|file|mimes:jpg,jpeg,png|max:2048',
				'articleCategory' => 'required|integer|min:0|max:8',
			];
		}
	}
