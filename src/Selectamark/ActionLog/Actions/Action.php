<?php namespace Selectamark\ActionLog\Actions;

class Action extends \Eloquent
{
    protected $fillable = ['action', 'type'];

    public static $rules = array(
        'action' => 'unique:actions,action,:id|required',
        'type'   => 'required'
    );

    public $timestamps = false;

    public static function findByActionOrCreate($action, $data = array('*'))
    {
        if(! is_null($action = static::where('action', $action)->first())) return $action;

        return static::create($data);
    }

    public function owners()
    {
        return $this->belongsToMany('Selectamark\ActionLog\Users\User');
    }

    public function users()
    {
        return $this->morphedByMany('Selectamark\ActionLog\Users\User', 'actionable', 'action_user')->withPivot('actionable_type', 'content', 'ua', 'ip')->withTimestamps();
    }

}