<?php

namespace App\Core;

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function isAdmin(): bool
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] === 'admin') {
            return true;
        }

        return false;
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['is_logged']) && $_SESSION['is_logged'] === true;
    }

    public function setFlashMessage(string $message): void
    {
        $_SESSION['message'] =
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
            . $message .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    public function displayFlashMessage(): void
    {
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    public function initUserSession(array $user): void
    {
        $_SESSION['is_logged'] = true;
        $_SESSION['status'] = $user['status'];
    }

    public function destroySession(): void
    {
        session_start();
        $_SESSION = [];
        session_destroy();
    }
}
