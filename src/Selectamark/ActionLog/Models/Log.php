<?php namespace Selectamark\ActionLog\Models;


class Log extends \Eloquent
{
    protected $fillable = ['action_id', 'user_id', 'loggable_id', 'loggable_type', 'content', 'ip', 'ua', 'created_at', 'updated_at'];

    public static $rules = array(
        'action_id'       => 'required',
        'actionable_id'   => 'required',
        'actionable_type' => 'required',
        'ip'              => 'required',
        'ua'              => 'required',
        'created_at'      => 'required',
        'updated_at'      => 'required',
    );

    public function loggable()
    {
        return $this->morphTo();
    }

    public function action()
    {
        return $this->belongsTo('Selectamark\ActionLog\Models\Action');
    }

    public function owner()
    {
        return $this->belongsTo(\Config::get('action-log::relations.users'), 'user_id');
    }

}