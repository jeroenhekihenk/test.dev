<?php namespace Digitus\Base\Model;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public static function byid($id)
	{
		return User::where('id', '=', $id)->first();
	}

    public static function byusername($uname)
    {
        return User::where('username', '=', $uname)->first();
    }

	public function posts()
	{
		return $this->hasMany('Digitus\Base\Model\Post');
	}

## --------------------------------------------------------------------------- ##

	public function roles()
    {
        return $this->belongsToMany('Digitus\Base\Model\Role');
    }

    public function isRole($key)
    {
    	foreach($this->roles as $role)
    	{
    		if($role->name === $key)
    		{ 
    			return true;
    		}
    	}
    	return false;
    }

    public function isEmployee()
    {
        $roles = $this->roles->toArray();
        return !empty($roles);
    }
 
    /**
     * Find out if user has a specific role
     *
     * $return boolean
     */
    public function hasRole($check)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    }
 
    /**
     * Get key in array with corresponding value
     *
     * @return int
     */
    private function getIdInArray($array, $term)
    {
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key;
            }
        }
 
        throw new UnexpectedValueException;
    }
 
    /**
     * Add roles to user to make them a concierge
     */
    public function makeEmployee($title)
    {
        $assigned_roles = array();
 
        $roles = array_fetch(Role::all()->toArray(), 'name');
 
        switch ($title) {
            case 'super_admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_customer');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_customer');
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'create_customer');
            case 'concierge':
                $assigned_roles[] = $this->getIdInArray($roles, 'add_points');
                $assigned_roles[] = $this->getIdInArray($roles, 'redeem_points');
                break;
            default:
                throw new \Exception("The employee status entered does not exist");
        }
 
        $this->roles()->attach($assigned_roles);
    }

}