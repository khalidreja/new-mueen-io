<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class SystemInfoService
{
    /**
     * Get comprehensive system information
     */
    public function getSystemInfo(): array
    {
        return Cache::remember('system_info', 300, function () { // Cache for 5 minutes
            return [
                'laravel_version' => app()->version(),
                'php_version' => PHP_VERSION,
                'database_info' => $this->getDatabaseInfo(),
                'disk_usage' => $this->getDiskUsage(),
                'memory_usage' => $this->getMemoryUsage(),
                'uptime' => $this->getUptime(),
                'server_info' => $this->getServerInfo(),
                'environment' => app()->environment(),
                'timezone' => config('app.timezone'),
                'locale' => config('app.locale'),
            ];
        });
    }

    /**
     * Get database information
     */
    private function getDatabaseInfo(): array
    {
        try {
            $connection = DB::connection();
            $pdo = $connection->getPdo();
            
            // Get database type and version
            $driver = $connection->getDriverName();
            $version = $pdo->getAttribute(\PDO::ATTR_SERVER_VERSION);
            
            // Get database name
            $database = $connection->getDatabaseName();
            
            // Get table count
            $tableCount = 0;
            if ($driver === 'mysql') {
                $tables = DB::select('SHOW TABLES');
                $tableCount = count($tables);
            }
            
            return [
                'type' => ucfirst($driver),
                'version' => $version,
                'database' => $database,
                'tables' => $tableCount,
                'formatted' => ucfirst($driver) . ' ' . $version
            ];
        } catch (\Exception $e) {
            return [
                'type' => 'Unknown',
                'version' => 'Unknown',
                'database' => 'Unknown',
                'tables' => 0,
                'formatted' => 'غير متاح'
            ];
        }
    }

    /**
     * Get disk usage information
     */
    private function getDiskUsage(): array
    {
        try {
            $path = base_path();
            $totalBytes = disk_total_space($path);
            $freeBytes = disk_free_space($path);
            $usedBytes = $totalBytes - $freeBytes;
            
            return [
                'total' => $totalBytes,
                'used' => $usedBytes,
                'free' => $freeBytes,
                'percentage' => round(($usedBytes / $totalBytes) * 100, 1),
                'formatted' => $this->formatBytes($usedBytes) . ' / ' . $this->formatBytes($totalBytes),
            ];
        } catch (\Exception $e) {
            return [
                'total' => 0,
                'used' => 0,
                'free' => 0,
                'percentage' => 0,
                'formatted' => 'غير متاح'
            ];
        }
    }

    /**
     * Get memory usage information
     */
    private function getMemoryUsage(): array
    {
        try {
            $memoryUsage = memory_get_usage(true);
            $memoryPeak = memory_get_peak_usage(true);
            $memoryLimit = $this->parseMemoryLimit(ini_get('memory_limit'));
            
            return [
                'current' => $memoryUsage,
                'peak' => $memoryPeak,
                'limit' => $memoryLimit,
                'percentage' => $memoryLimit > 0 ? round(($memoryUsage / $memoryLimit) * 100, 1) : 0,
                'formatted' => $this->formatBytes($memoryUsage) . ' / ' . $this->formatBytes($memoryLimit),
            ];
        } catch (\Exception $e) {
            return [
                'current' => 0,
                'peak' => 0,
                'limit' => 0,
                'percentage' => 0,
                'formatted' => 'غير متاح'
            ];
        }
    }

    /**
     * Get system uptime
     */
    private function getUptime(): string
    {
        try {
            if (PHP_OS_FAMILY === 'Linux') {
                $uptimeSeconds = (int) file_get_contents('/proc/uptime');
                $days = floor($uptimeSeconds / 86400);
                $hours = floor(($uptimeSeconds % 86400) / 3600);
                
                if ($days > 0) {
                    return $days . ' يوم و ' . $hours . ' ساعة';
                } else {
                    return $hours . ' ساعة';
                }
            }
            
            // Fallback for non-Linux systems
            return 'غير متاح';
        } catch (\Exception $e) {
            return 'غير متاح';
        }
    }

    /**
     * Get server information
     */
    private function getServerInfo(): array
    {
        return [
            'os' => PHP_OS_FAMILY,
            'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
            'server_name' => $_SERVER['SERVER_NAME'] ?? 'localhost',
            'server_port' => $_SERVER['SERVER_PORT'] ?? '80',
        ];
    }

    /**
     * Format bytes to human readable format
     */
    private function formatBytes(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }

    /**
     * Parse memory limit string to bytes
     */
    private function parseMemoryLimit(string $memoryLimit): int
    {
        if ($memoryLimit === '-1') {
            return 0; // Unlimited
        }
        
        $memoryLimit = trim($memoryLimit);
        $unit = strtolower(substr($memoryLimit, -1));
        $value = (int) substr($memoryLimit, 0, -1);
        
        switch ($unit) {
            case 'g':
                return $value * 1024 * 1024 * 1024;
            case 'm':
                return $value * 1024 * 1024;
            case 'k':
                return $value * 1024;
            default:
                return (int) $memoryLimit;
        }
    }
}