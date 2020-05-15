<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app()->environment('live'))
        {
            //or set in AppServiceProvider boot()
            //\URL::forceScheme('https');
            $is_https = false;

            //behind load balancer
            if ($request->server('HTTP_X_FORWARDED_PROTO') == 'https')
                $is_https = true;
            //cloudflare header
            //https://support.cloudflare.com/hc/en-us/articles/200170986-How-does-Cloudflare-handle-HTTP-Request-headers-

            if (isset($_SERVER['HTTP_CF_VISITOR']))
            {
                $cf_visitor = json_decode($_SERVER['HTTP_CF_VISITOR']);
                if (isset($cf_visitor->scheme) && $cf_visitor->scheme == 'https')
                {
                    $is_https = true;
                }
            }

            $request->setTrustedProxies([$request->getClientIp()]);

            if (!$is_https && env('APP_ENV') === 'live')
            {
                return redirect()->secure($request->getRequestUri());
            }
        }
        return $next($request);
    }
}
