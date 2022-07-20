<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\HasMany;

	class Category extends Model {
		use HasFactory;

//		public $table = 'categories';
		protected $primaryKey = 'category_id';

		protected $fillable = array(
			'category_title',
			'category_slug'
		);

		public function articles(): HasMany {
			return $this->hasMany(ArticleCategory::class, 'category_id', 'category_id');
		}
	}
