<?php
use Core\Lib\Request;


if( isset(Request::$data['_GET']['controller']) &&
          Request::$data['_GET']['controller'] == 'User'){

            switch (Request::$data['_GET']['do']) {
              case 'echoFromReg':
                  $curUser->echoRegisterForm ();
                break;
              case 'createUser':
                  $curUser->create();
                break;

                case 'edit':
                case 'editUser':
                    $curUser->echoEditForm();
                  break;

                //case 'doUpdateUser':
                case 'doUpdateUser':
                    $curUser->update();
                  break;


              default:
                // code...
                break;
            }

}
