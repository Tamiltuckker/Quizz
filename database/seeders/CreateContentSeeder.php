<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;
use App\Models\Attachment;

class CreateContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            [
                'slug' => 'about-us',
                'title' => 'About Us',
                'description' => 'At Typeform, we help brands treat people like people with thoughtfully-designed tools that turn digital interactions into lasting personal connections.
                 Because what do customers, prospects, users, leads, recruits, and employees (the list goes on) all have in common? They’re all people. And people are essential to growth.                
                 With our no-code forms, quizzes, surveys, and asynchronous videos, brands can engage their audience and grow their business with ease.',
                'active' => '1',
                'image'  =>'about.jpg'
            ],
            [
                'slug' => 'contact',
                'title' => 'Contact',
                'description' => 'Quiz Bee,3110 Main St. Building C,New York,90405',
                'active' => '1',
                'image'  => 'contact-us-image.jpg'
            ],
            [
                'slug' => 'privacy-policy',
                'title' => 'Privacy Policy',
                'description' => 'Respecting your privacy is critically important to achieving our mission of motivating every student. These are our guiding privacy principles:
                *We dont ask you for personal information unless we truly need it.
                *We dont keep your personal information longer than is necessary to provide our services to you.
                *We dont share your personal information with anyone except to comply with the law, provide our services, or protect our rights.
                *We dont rent, sell or exchange your personal information.
                *We aim to make it as simple as possible for you to control whats visible to the public, seen by search engines, kept private, and permanently deleted.',
                'active' => '1',
                'image'  => 'privacypolicy.jpg'
            ],

        ];
        foreach ($contents as $cms) {
            $content = new Content();
            $content->slug =  $cms['slug'];
            $content->title =  $cms['title'];
            $content->description =  $cms['description'];
            $content->active =  $cms['active'];
            $content->save();
            $id        = $content->id;
            $attachment  = Content::find($id);
            $file        = new Attachment();
            $file->image = $cms['image'];
            $attachment->image()->save($file);
        }
    }
}
