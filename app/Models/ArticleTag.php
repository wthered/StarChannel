<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class ArticleTag extends Model {
		use HasFactory;

		protected $primaryKey = null;
		protected $fillable = array(
			'article_id',
			'tag_id'
		);
		public $incrementing = false;
	}
