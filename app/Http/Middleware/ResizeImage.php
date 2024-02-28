<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ResizeImage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $image = $request->file('image');

        if ($image) {
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image);
            $img->scale(width: 1080);
            $img->save($image->getPathname());

            $request->merge(['image' => $image]);
        }

        return $next($request);
    }
}
