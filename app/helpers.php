<?php

if (!function_exists('setting')) {
    /**
     * Get or set a setting value
     */
    function setting($key, $default = null)
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (!function_exists('set_setting')) {
    /**
     * Set a setting value
     */
    function set_setting($key, $value, $type = 'string', $description = null)
    {
        return \App\Models\Setting::set($key, $value, $type, $description);
    }
}

if (!function_exists('is_maintenance_mode')) {
    /**
     * Check if maintenance mode is enabled
     */
    function is_maintenance_mode()
    {
        return setting('maintenance_mode', false);
    }
}

if (!function_exists('get_ai_settings')) {
    /**
     * Get all AI settings
     */
    function get_ai_settings()
    {
        return [
            'provider' => setting('ai_provider', 'gemini'),
            'model' => setting('ai_model', 'gemini-pro'),
            'api_key' => setting('ai_api_key', ''),
            'rate_limit' => setting('ai_rate_limit', 100),
        ];
    }
}

if (!function_exists('get_security_settings')) {
    /**
     * Get all security settings
     */
    function get_security_settings()
    {
        return [
            'min_password_length' => setting('min_password_length', 8),
            'session_timeout' => setting('session_timeout', 120),
            'require_password_complexity' => setting('require_password_complexity', true),
            'enable_two_factor' => setting('enable_two_factor', false),
            'log_user_activities' => setting('log_user_activities', true),
        ];
    }
}