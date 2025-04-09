<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        $posts = Post::whereNull('slug')->orWhere('slug', '')->get();

        foreach ($posts as $post) {

            $slug = Str::slug($post->title);


            $count = 1;
            $originalSlug = $slug;

            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            $post->slug = $slug;
            $post->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // This migration cannot be reversed as it's data manipulation
        // If needed, you could set all slugs to null, but that's not recommended
    }
};