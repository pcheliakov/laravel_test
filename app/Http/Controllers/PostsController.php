<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\{Post, Tag, Category, PostTag};

class PostsController extends Controller
{
    public function index()
    {
        //$tag = Tag::find(1);
        //dd($tag->posts);

        //$posts = Post::where('is_published', 1)->get();
        /*foreach ($posts as $post) {
            dump($post->title);
        }*/
        //dd($posts);

        //$categories = Category::all();
        //$category = Category::find(1);

        //dd($post->category);

        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        /*$postsArr = [
            [
                'title' => 'title 1',
                'content' => 'body 1',
                'image' => 'image url',
                'likes' => 235,
                'is_published' => 0,
                'created_at' => '2020-01-01',
                'updated_at' => '2020-01-01',
            ],
            [
                'title' => 'title 2',
                'content' => 'body 2',
                'image' => 'image url 2',
                'likes' => 500,
                'is_published' => 1,
                'created_at' => '2022-01-15',
                'updated_at' => '2023-11-21',
            ]
        ];

        foreach ($postsArr as $post) {
            Post::create($post);
        }*/

        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        /*foreach ($tags as $tag) {
            PostTag::firstOrCreate([
                'post_id' => $post->id,
                'tag_id' => $tag,
            ]);

        }*/
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('posts.show', $post->id);

        /*$post = Post::find(5);
        $post->update([
            'title' => 'title 1 updated',
            'content' => 'body 1 updated',
            'image' => 'image url updated',
            'likes' => 2350,
        ]);*/
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function delete()
    {
        //$post = Post::find(1);
        //$post->delete();
        $post = Post::withTrashed()->find(1);
        $post->restore();
        dd($post);
    }

    public function firstOrCreate()
    {
        $somePost = [
            'title' => 'some title 1 updated',
            'content' => 'some body 1 updated',
            'image' => 'some image url updated',
            'likes' => 2,
        ];

        $myPost = Post::firstOrCreate([
            //'title' => 'title 1',
            'title' => 'some title 1 updated',
        ], $somePost);

        dd($myPost);
    }

    public function updateOrCreate()
    {
        $somePost = [
            'title' => 'updateOrCreate some title 1 updated',
            'content' => 'updateOrCreate some body 1 updated',
            'image' => 'updateOrCreate some image url updated',
            'likes' => 2,
        ];

        $myPost = Post::updateOrCreate([
            //'title' => 'some title 1 updated',
            'title' => 'some title 1 updated',
        ], $somePost);

        dd($myPost);
    }
}
