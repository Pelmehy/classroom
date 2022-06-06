<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Admin and set default options';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $password = $this->_passwordGen(10);

        $user = new User();
        $user->name = 'test_admin';
        $user->email = ' ';
        $user->password = Hash::make($password);
        $user->save();

        $user->email = 'test_admin-'.$user->id.'@example.com';
        $user->save();

        $user_info = new UserInfo();
        $user_info->user_id = $user->id;
        $user_info->faculty_id = 0;
        $user_info->group_id = 0;
        $user_info->fullName = 'test_admin';
        $user_info->phone = 0;
        $user_info->type = Config::get('constants.USER_TYPE_ADMIN');
        $user_info->first_login = 1;
        $user_info->img = ' ';
        $user_info->save();

        $this->info('Email: '.$user->email.' Password: '.$password);
        return 0;
    }

    private function _passwordGen($lenth){
        $symbols = explode(' ',"A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9 ! № ; % : ? * ( ) _ + =");
        $size = sizeof($symbols);
        $password = '';
        for ($i = 0; $i < $lenth; $i++){
            $password = $password.$symbols[(int)rand(0, $size - 1)];
        }

        return $password;
    }
}
