<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class UpdateImageUrls
{
    public function updateImageUrls($content) {
        $oldBaseUrl = 'http://localhost';
        $newBaseUrl =  $this->environmentCheck();
        return str_replace($oldBaseUrl, $newBaseUrl, $content);
    }

    public function environmentCheck()
    {
        return App::environment('local') ? 'http://127.0.0.1:8001' : 'https://awardtest.techtrend.africa';
    }
}
