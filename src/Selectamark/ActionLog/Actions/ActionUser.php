<?php namespace Selectamark\ActionLog\Actions;

class ActionUser extends \Eloquent
{
    protected $table = 'action_user';

    protected $fillable = ['user_id', 'action_id', 'actionable_id', 'actionable_type', 'content', 'ip', 'ua'];
}