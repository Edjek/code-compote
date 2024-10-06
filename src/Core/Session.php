<?php

namespace App\Core;

class Session
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start([
                'cookie_lifetime' => 86400,   // Durée de vie du cookie en secondes
                'cookie_secure'   => true,    // Cookie uniquement en HTTPS
                'cookie_httponly' => true     // Cookie inaccessible en JavaScript
            ]);
        }
    }

    /**
     * @param string $message
     * @param string $type
     *
     * @return void
     */
    public function setFlashMessage(string $message, string $type): void
    {
        $_SESSION['message'] =
            '<div class="alert alert-' . $type . ' alert-dismissible fade show w-75 m-auto" role="alert">' . $message .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    /**
     * @return void
     */
    public function displayFlashMessage(): void
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    /**
     * @param array $user
     *
     * @return void
     */
    public function createSession(array $user): void
    {
        $_SESSION['LOGGED_USERNAME'] = $user['username'];
        $_SESSION['LOGGED_ID'] = $user['id'];
        if ($user['admin'] === 1) {
            $_SESSION['LOGGED_ADMIN'] = true;
        }
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return isset($_SESSION['LOGGED_ID']);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        $_SESSION;
        return isset($_SESSION['LOGGED_ADMIN']) && $_SESSION['LOGGED_ADMIN'] === true;
    }
}
