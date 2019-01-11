<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 13:04
 */

namespace App\Service;

use App\Entity\User;
use Symfony\Component\Form\FormInterface;

interface IUserCrudService
{
    /**
     * @return User[]
     */
    public function getAllUsers();

    /**
     * @param $userId int
     * @return User[]
     */
    public function getUserById($userId);

    /**
     * @param $userName string
     * @return User[]
     */
    public function getUserByUserame($userName);

    /**
     * @param $oneUser User
     */
    public function saveUser($oneUser);

    /**
     * @param $userId int
     */
    public function removeUser($userId);

    /**
     * @param $oneUser User
     * @return FormInterface
     */
    public function getForm($oneUser);
}