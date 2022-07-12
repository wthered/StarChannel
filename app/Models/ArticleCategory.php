<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class ArticleCategory extends Model {
		use HasFactory;

		protected $primaryKey = false;
		protected $fillable = array(
			'article_id',
			'category_id'
		);

		public $incrementing = false;
	}
