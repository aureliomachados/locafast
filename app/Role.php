<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 10/25/16
 * Time: 4:53 PM
 */

namespace App;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];
}