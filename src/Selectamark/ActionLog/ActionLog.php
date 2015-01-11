<?php namespace Selectamark\ActionLog;

use Selectamark\ActionLog\Models\Action;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActionLog
{
    public function log($action, $type = null, $id = null, $content = null)
    {
        $action = Action::firstOrCreate(array('action' => $action));

        $log = \Config::get('action-log::log');
        $log = new $log;
        $log->fill(
            array(
                'action_id' => $action->id,
                'user_id'   => (\Auth::check()) ? \Auth::id() : null,
                'content'   => $content,
                'ip'        => \Request::ip(),
                'ua'        => \Request::server('HTTP_USER_AGENT')
            )
        );

        if ($type && $id) {
            $model = \Config::get('action-log::relations.' . $type);
            $model = new $model;
            $model = $model->find($id);
        }

        if($model){
            return $model->logs()->save($log);
        }

        return $log->save();
    }

}