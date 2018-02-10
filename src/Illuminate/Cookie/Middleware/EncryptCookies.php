<?php
namespace Illuminate\Cookie\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;

class EncryptCookies {
    protected $encrypter;
    protected $except = [];

    public function __construct(EncrypterContract $encrypter) {
        $this->encrypter = $encrypter;
    }

    public function disableFor($cookieName) {
        $this->except = array_merge($this->except, (array) $cookieName);
    }
    public function handle($request, Closure $next) {
        return $this->encrypt($next($this->decrypt($request)));
    }
    protected function decrypt(Request $request) {
        foreach ($request->cookies as $key => $c) {
            if ( $this->isDisabled($key) ) continue;

            try {
                $request->cookies->set($key, $this->decryptCookie($c));
            } catch (DecryptException $e) {
                $request->cookies->set($key, null);
            }
        }

        return $request;
    }
    protected function decryptCookie($cookie) {
        return is_array($cookie)
            ? $this->decryptArray($cookie)
            : $this->encrypter->decrypt($cookie);
    }
    protected function decryptArray(array $cookie) {
        $decrypted = [];

        foreach ($cookie as $key => $value) {
            if ( is_string($value) ) $decrypted[$key] = $this->encrypter->decrypt($value);
        }

        return $decrypted;
    }
    protected function encrypt(Response $response) {
        foreach ( $response->headers->getCookies() as $cookie ) {
            if ( $this->isDisabled($cookie->getName()) ) continue;

            $response->headers->setCookie($this->duplicate(
                $cookie, $this->encrypter->encrypt($cookie->getValue())
            ));
        }

        return $response;
    }
    protected function duplicate(Cookie $c, $value) {
        return new Cookie(
            $c->getName(), $value, $c->getExpiresTime(), $c->getPath(),
            $c->getDomain(), $c->isSecure(), $c->isHttpOnly(), $c->isRaw(),
            $c->getSameSite()
        );
    }
    public function isDisabled($name) {
        return in_array($name, $this->except);
    }
}