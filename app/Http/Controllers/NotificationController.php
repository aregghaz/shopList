<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Events\PostPublished;

class NotificationController extends Controller
{
    /**
     * Saves a new post to the database
     */
    public function store(Request $request) {
        // ...
        // validation can be done here before saving
        // with $this->validate($request, $rules)
        // ...

        // get data to save in an associative array using $request->only()
        $data = $request->only(['title', 'description']);

        //  save post and assign return value of created post to $post array
        $notification = Notification::create($data);

        // fire PostPublished event after post is successfully added to database
        event(new PostPublished($notification));
        // or
        // \Event::fire(new PostPublished($post))

        // return post as response, Laravel automatically serializes this to JSON
        return response($notification, 201);
    }
}
