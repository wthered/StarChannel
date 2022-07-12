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
			Schema::create('articles', function (Blueprint $table) {
				$table->increments('article_id');
				$table->string('title');
				$table->string('subtitle');
				$table->string('slug');
				$table->text('body');
				$table->string('image')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down(): void {
			Schema::dropIfExists('articles');
		}
	};
