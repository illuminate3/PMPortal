<?php

namespace Spatie\Activitylog;

use Activity;
use Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        foreach (static::getRecordActivityEvents() as $eventName) {
            static::$eventName(function (LogsActivityInterface $model) use ($eventName) {

                $action = $model->getActivityDescriptionForEvent($eventName);
                $type = $model->getType();
                $name = $model->getTitle();
                
                //if ($message != '') {
                   // Activity::log($name, $type, $message);
                     Activity::log($action, $name, $type);
                //}
            });
        }
    }

    /**
     * Set the default events to be recorded if the $recordEvents
     * property does not exist on the model.
     *
     * @return array
     */
    protected static function getRecordActivityEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created', 'updated', 'deleting', 'deleted',
        ];
    }
}
