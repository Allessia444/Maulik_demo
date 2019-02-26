<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamLead extends Model
{
    protected $table="team_leads";
    protected $fillable = ['member_id','teamlead_id','department_id'];
    public $timestamps=true;


}
