<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Illuminate\Database\Eloquent\Relations\HasMany;

	class Article extends Model {
		use HasFactory;

		protected $primaryKey = 'article_id';
		protected $fillable = array(
			'title',
			'subtitle',
			'slug',
			'body',
			'image'
		);

		public function category(): BelongsTo {
			return $this->belongsTo(Category::class);
		}
	}
