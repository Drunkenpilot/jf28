<?php 
/**
 * Authority
 *
 * Authority is an authorization library for CodeIgniter 2+ and PHPActiveRecord
 * This library is inspired by, and largely based off, Ryan Bates' CanCan gem
 * for Ruby on Rails.  It is not a 1:1 port, but the essentials are available.
 * Please check out his work at http://github.com/ryanb/cancan/
 *
 * @package     Authority
 * @version     0.0.3
 * @author      Matthew Machuga
 * @license     MIT License
 * @copyright   2011 Matthew Machuga
 * @link        http://github.com/machuga
 *
 **/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require 'authority/ability.php';
require 'authority/rule.php';

class Authority extends Authority\Ability {

    public static function initialize($user)
    {
        // an example configuration
		
        
       Authority::action_alias('manage', array('create', 'read', 'update', 'delete'));
        Authority::action_alias('moderate', array('update', 'delete', 'edit'));
		Authority::action_alias('limit',array('read'));
       if ( ! $user || ! $user->role) return false;

      if ($user->role == 'administrator')
        {
            Authority::allow('manage', 'all');
            Authority::deny('delete', 'Admin', function ($a_user) use ($user) {
                return $a_user->id !== $user->id;
            });
        }

            if ($user->role == 'editor')
        {

         Authority::allow('manage', 'all');
         Authority::deny('delete','Admin');
       /*  Authority::allow('update', 'Admin', function($a_user) use ($user) {
                return $user->id == $a_user->id;
            });*/
        }

       if ($user->role == 'seller')
        {
        	
           /*Authority::allow('read', 'Project', function($project) use ($user) {
                return $user->company_id == $project->company_id;
            });*/
        	Authority::allow('limit','Admin');
        }
        
    }

    protected static function current_user()
    {
        return parent::current_user();
    }
}
