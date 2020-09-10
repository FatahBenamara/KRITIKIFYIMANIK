<?php

namespace App\DataFixtures;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends BaseFixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){

        $this->encoder = $encoder;
    }

    protected function loadData()
    {
        
        $this->createMany(5, "user_admin", function (int $num) {
            //Création de 05 admin 
            $admin= new User();
            $password = $this->encoder->encodePassword($admin, 'admin'.$num);

            return $admin
            
                ->setEmail("admin".$num."@kritik.com")
                ->setRoles(["ROLE_ADMIN"])
                ->setPassword($password)
            ;
        });

        $this->createMany(20, "user_user", function (int $num) {
            //Création de 20 users 
            $user= new User();
            $password = $this->encoder->encodePassword($user, 'user'.$num);

            return $user
            
                ->setEmail("user".$num."@kritik.com")
                ->setPassword($password)
            ;
        });
    }
}
