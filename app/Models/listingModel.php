<?php

namespace App\Models;

class listingModel
{
    //this model was for learning, it is not related to the website
    //in video he delete this model
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'listing model one',
                'description' => 'Hello, how are you?'

            ],
            [
                'id' => 2,
                'title' => 'listing model two',
                'description' => 'it is none of your bussiness.'
            ]
        ];
    }

    public static function find($id)
    {
        //for gettin another function in the same class we can use self:
        $listings3 = self::all();

        foreach ($listings3 as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
