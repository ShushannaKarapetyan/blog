<?php

namespace App\Policies;

use App\Model\admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param Admin $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param Admin $user
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param Admin $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,'Create Post');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param Admin $user
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user,'Update Post');
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param Admin $user
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user,'Delete Post');
    }

    public function tag(Admin $user)
    {
        return $this->getPermission($user,'Tag CRUD');
    }

    public function category(Admin $user)
    {
        return $this->getPermission($user,'Category CRUD');
    }

    protected function getPermission($user, $permission_name){
        foreach ($user -> roles as $role){
            foreach ($role -> permissions as $permission){
                if($permission -> name == $permission_name){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param Admin $user
     * @return mixed
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param Admin $user
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }

}
