<?php namespace Selectamark\ActionLog;

use Selectamark\ActionLog\Actions\Action;
use Selectamark\ActionLog\Actions\ActionUser;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActionLog {

    public function log($action, $type = null, $id = null, $content = null)
    {
        $action = Action::findByActionOrCreate($action, array('action' => $action));

        $data = array(
            'user_id' => (\Auth::check()) ? \Auth::id() : null,
            'action_id' => $action->id,
            'content' => $content,
            'ip' => \Request::ip(),
            'ua' => \Request::server('HTTP_USER_AGENT')
        );

        if(!$type || !is_numeric($id)){

            ActionUser::create($data);
            return;

        }

        $this->loadMorph($action, $type)->attach($id, $data);
    }

    private function loadMorph($action, $type)
    {
        $model = \Config::get('action-log::types.' . $type);
        return $action->morphedByMany($model, 'actionable', 'action_user')->withPivot('actionable_type', 'content', 'ua', 'ip')->withTimestamps();
    }

}