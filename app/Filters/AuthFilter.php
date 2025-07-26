<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return ResponseInterface|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna sudah login
        if (!session()->get('isLoggedIn')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('/login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow you to override
     * any existing properties but only to manipulate the response
     * object that's provided.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada yang perlu dilakukan setelah permintaan (untuk filter ini)
    }
}

