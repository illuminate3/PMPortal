<?php

namespace Spatie\Activitylog\Handlers;

interface ActivitylogHandlerInterface
{
    /**
     * Log some activity.
     *
     * @param string $text
     * @param string $user
     * @param array  $attributes
     *
     * @return bool
     */
   
public function log($action, $name, $type, $userId = '', $attributes = []);
    /**
     * Clean old log records.
     *
     * @param int $maxAgeInMonths
     *
     * @return bool
     */
    public function cleanLog($maxAgeInMonths);
}
