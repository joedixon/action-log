<?php namespace Selectamark\ActionLog\Users;

class User extends \Eloquent {

    public function actions()
    {
        return $this->morphToMany('Selectamark\ActionLog\Actions\Action', 'actionable', 'action_user')->withPivot('actionable_type', 'content', 'ua', 'ip')->withTimestamps();
    }
    
}