<?php namespace Selectamark\ActionLog\Models;

class Action extends \Eloquent
{
    protected $fillable = ['action'];

    public static $rules = array(
        'action' => 'unique:actions,action,:id|required',
    );

    public $timestamps = false;

    public function logs()
    {
        return $this->hasMany('Selectamark\ActionLog\Models\Log');
    }

}