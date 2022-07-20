<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

		public function tags(): BelongsToMany {
			return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
		}
	}
