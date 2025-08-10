<?php

namespace App\Enums;

enum ApiStatus: int
{
    /* Success Codes (2xx) */
    case OK = 200;
    case CREATED = 201;
    case ACCEPTED = 202;
    case NO_CONTENT = 204;

    /* Client Error Codes (4xx) */
    case BAD_REQUEST = 400;
    case UNAUTHORIZED = 401;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case METHOD_NOT_ALLOWED = 405;
    case CONFLICT = 409;
    case UNPROCESSABLE_ENTITY = 422;
    case TOO_MANY_REQUESTS = 429;

    /* Server Error Codes (5xx) */
    case INTERNAL_SERVER_ERROR = 500;
    case NOT_IMPLEMENTED = 501;
    case SERVICE_UNAVAILABLE = 503;

    public function message(): string
    {
        return match ($this) {
                // Success
            self::OK => 'Request succeeded',
            self::CREATED => 'Resource created successfully',
            self::ACCEPTED => 'Request accepted for processing',
            self::NO_CONTENT => 'No content to return',

                // Client Errors
            self::BAD_REQUEST => 'Invalid request parameters',
            self::UNAUTHORIZED => 'Authentication required',
            self::FORBIDDEN => 'Insufficient permissions',
            self::NOT_FOUND => 'Resource not found',
            self::METHOD_NOT_ALLOWED => 'HTTP method not allowed',
            self::CONFLICT => 'Resource conflict occurred',
            self::UNPROCESSABLE_ENTITY => 'Validation failed',
            self::TOO_MANY_REQUESTS => 'Too many requests',

                // Server Errors
            self::INTERNAL_SERVER_ERROR => 'Internal server error',
            self::NOT_IMPLEMENTED => 'Feature not implemented',
            self::SERVICE_UNAVAILABLE => 'Service temporarily unavailable'
        };
    }
}