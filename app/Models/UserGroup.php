<?php
// app/Models/UserGroup.php

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserGroup extends Pivot
{
    protected $table = 'user_group';
}
