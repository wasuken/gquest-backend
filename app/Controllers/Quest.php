
<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;

/**
 * Auth
 *
 * @uses BaseController
 * @author wasuken
 * @license MIT
 */
class Quest extends BaseController
{
  public function index()
  {
    helper('jwt');
    $encodedToken = getJWTFromRequest($authenticationHeader);
    $user = validateJWTFromRequest($encodedToken);
  }
{
