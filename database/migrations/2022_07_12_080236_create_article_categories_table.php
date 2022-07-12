<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	return new class extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up(): void {
			Schema::create('article_categories', function (Blueprint $table) {
				$table->integer('article_id')->unsigned();
				$table->foreign('article_id')->references('article_id')->on('articles')->onUpdate('cascade')->onDelete('cascade');
				$table->integer('category_id')->unsigned();
				$table->foreign('category_id')->references('category_id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down(): void {
			Schema::dropIfExists('article_categories');
		}
	};
