<?php
namespace ContentBundle\Util;

use FOS\UserBundle\Doctrine\UserManager as FOSUserManager;
use ContentBundle\Entity\User;
use Doctrine\ORM\EntityManager;

/**
 * User management
 *
 * [CREATE, UPDATE, GET, DELETE]
 */
class UserManager
{
    private $um;
    private $em;
    private $currentUser;

    public function __construct(FOSUserManager $um, EntityManager $em, $currentUser)
    {
        $this->um = $um;
        $this->em = $em;
        $this->currentUser = $currentUser;
    }

    /**
     * Create a user
     * @param  String $username
     * @param  String $email
     * @param  String $plain_password
     * @param  array  $roles
     * @return void
     */
    public function create(
        $username,
        $email,
        $plain_password,
        $roles = array(),
        $enabled = false
    ) {
        // @todo Make the create method
        //       Create a user using the FOSUserManager ($this->um)
        $user = sthis->um->createUser();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPlain_password($plain_password);
        $user->setRoles($roles);
        $user->setEnabled($enabled);
        
        $this->em->persist($user);
        $this->em->flush();
    }

    public function update($user)
    {
        $this->um->updateUser($user);
    }

    /**
     * Get a user or all users
     * @param  Integer $id
     * @return User|User[]
     */
    public function get($id = NULL)
    {
        // @todo Make the get method
        //       Find a user from ID or get all users, then return
        $this->em->getRepository(User::class);
        
        if($id == null){
           $user = $this->em->findAll();
        }
        else {
           $user = $this->em->findById($id);
        }
        
        return $user;
    }

    public function getCurrent()
    {
        return $this->currentUser;
    }

    /**
     * Delete a user
     * @param  Integer $id
     * @return void
     */
    public function delete($id)
    {
        // DONE Make the delete method
        //       Delete a user
        $this->em->getRepository(User::class);
        $user = $this->em->findOneById($id);
        $this->em->remove($user);
        $this->em->flush();
    }
}
