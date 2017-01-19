<?php
App::uses('AppModel', 'Model');

class Role extends AppModel
{
    const SuperAdmin = 1;
    const Admin = 2;
    const Staff = 3;
    const Student = 4;
    const AdmissionManager = 5;
    const AdmissionStaff = 6;
    const AdmissionRC = 7;
    const MarketingManager = 8;
    const MarketingStaff = 9;
    const MarketingRC = 10;
    const AcademicManager = 11;
    const AcademicStaff = 12;
    const AcademicRC = 13;
    const ExamManager = 14;
    const ExamStaff = 15;
    const FinanceManager = 16;
    const FinanceStaff = 17;
    const FinanceRC = 18;
    const CourceLeader = 19;
    const Tutor = 20;
    const RegisteredApplicant = 21;
    const MarketingBtec = 22;
    const CoordinatorRC = 23;
    const AccaApplicant = 24;
    const AccaStaff = 25;
    const Lecturer = 26;
    const Dean = 27;
    const AssessmentStaff = 28;
/**
 * Display field
 *
 * @var string
 */
    protected static $_cache = [];
    public $displayField = 'name';
    public function find($type = 'first', $query = [])
    {
        if ($type == 'list') {
            if (empty(self::$constants)) {
                $rc = new ReflectionClass('Role');
                self::$constants = parent::find("list");
            }
            return self::$constants;
        }
        return parent::find($type, $query);
    }


    public static function getName($id)
    {
        if (empty(self::$constants)) {
            $rc = new ReflectionClass('Role');
            // self::$constants = $rc->getConstants();
            self::$constants = $rc->find('list');
        }
        return array_search($id, self::$constants);
    }

    public static $constants = array();

    public static function getIdByName($name)
    {
        if (empty(self::$constants)) {
            $rc = new ReflectionClass('Role');
            // self::$constants = $rc->getConstants();
            self::$constants = $rc->find('list');
        }
        return isset(self::$constants[$name])?self::$constants[$name]:false;
    }
    public static function forUser()
    {
        //  if (($roles = CakeSession::read('Auth.Roles'))==false) {
            $UserRoles = ClassRegistry::init('UserRole');
        $UserRoles->recursive = -1;
        if ($UserRoles = $UserRoles->findAllByUserId(CakeSession::read('Auth.User.id'))) {
            $roles = Hash::extract($UserRoles, '{n}.UserRole.role_id');
        }
        $roles[] = intval(CakeSession::read('Auth.User.user_role_id'));
        CakeSession::write('Auth.Roles', $roles);
   //     }
        // debug($roles);

        return $roles;
    }
    public static function isUserInRole($session = [])
    {
        if (is_array($session)) {
            foreach (self::forUser() as $role) {
                if (in_array($role, $session)) {
                    return true;
                }
            }
        } else {
            return in_array($session, self::forUser());
        }
        return false;
    }
}
