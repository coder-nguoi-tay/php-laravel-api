<?php

namespace App\Enums;

enum StatusCode: int
{
    // Success codes (0-99)
    case SUCCESS = 0;

    // Client errors (100-199)
    case VALIDATION_ERROR = 100;
    case UNAUTHENTICATED = 101;
    case UNAUTHORIZED = 102;
    case NOT_FOUND = 103;
    case INVALID_CREDENTIALS = 104;

    // Server errors (500-599)
    case SERVER_ERROR = 500;
    case SERVICE_UNAVAILABLE = 503;

    public function message(): string
    {
        return match ($this) {
            self::SUCCESS => 'Operation completed successfully',
            self::VALIDATION_ERROR => 'Validation failed',
            self::UNAUTHENTICATED => 'Unauthenticated access',
            self::UNAUTHORIZED => 'Unauthorized access',
            self::NOT_FOUND => 'Resource not found',
            self::INVALID_CREDENTIALS => 'Invalid credentials',
            self::SERVER_ERROR => 'Internal server error',
            self::SERVICE_UNAVAILABLE => 'Service temporarily unavailable',
        };
    }
}