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
if( isset(Request::$data['_GET']['controller']) &&
          Request::$data['_GET']['controller'] == 'City'){
      $curCity = new Core\Components\User\controllerCity();

            switch (Request::$data['_GET']['do']) {
              case 'echoAll':
                  $curCity->echoAll();
                break;
                case 'doDel':
                    $curCity->doDel(Request::$data['_GET']['id']);
                  break;

              case 'echoCityForm':
                  $curCity->echoCityForm();
                break;

              case 'createCity':
                  $curCity->create();
                break;
              case 'doUpdateCity':
                  $curCity->update();
                break;

              default:
                // code...
                break;
            }

}
if( isset(Request::$data['_GET']['controller']) &&
          Request::$data['_GET']['controller'] == 'Address'){
    $curAddress = new Core\Components\User\controllerAddress();

            switch (Request::$data['_GET']['do']) {
              case 'echoAll':
                  $curAddress->echoAll();
                break;
                case 'doDel':
                    $curAddress->doDel(Request::$data['_GET']['id']);
                  break;

                case 'echoAddressForm':
                  $curAddress->echoAddressForm();
                break;

              case 'createAddress':
                  $curAddress->create();
                break;
              case 'doUpdateAddress':
                  $curAddress->update();
                break;

              default:
                // code...
                break;
            }

}
