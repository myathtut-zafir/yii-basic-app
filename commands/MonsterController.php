<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * MonsterMashController implements the CRUD actions for Monstermash model.
 */
class MonsterController extends Controller
{
    public function actionPermissions(): void
    {
        $auth = Yii::$app->authManager;
        $updateMonster = $auth->createPermission('monstermash/update');
        $updateMonster->description = "Update monstermash";
        $auth->add($updateMonster);

        $deleteMonster = $auth->createPermission('monstermash/delete');
        $deleteMonster->description = "Delete monstermash";
        $auth->add($deleteMonster);
    }

    public function actionRoles(): void
    {
        $auth = Yii::$app->authManager;
        $updateMonster = $auth->getPermission('monstermash/update');
        $deleteMonster = $auth->getPermission('monstermash/delete');

        $member = $auth->createRole('member');
        $auth->add($member);
        $auth->addChild($member, $updateMonster);

        $member = $auth->createRole('admin');
        $auth->add($member);
        $auth->addChild($member, $deleteMonster);
    }

    /**
     * Assigns a role to a user.
     * Usage: ./yii monster/assign <userId> <roleName>
     *
     * @param int $userId
     * @param string $roleName
     */
    public function actionAssign(int $userId, string $roleName): int
    {
        $auth = Yii::$app->authManager;

        // 1. Check if the role exists
        $role = $auth->getRole($roleName);
        if ($role === null) {
            echo "Error: Role '{$roleName}' does not exist.\n";
            return ExitCode::UNAVAILABLE;
        }

        // 2. Assign the role to the user
        try {
            if (!$auth->getAssignment($roleName, $userId)) {
                $auth->assign($role, $userId);
                echo "Success: Assigned role '{$roleName}' to User ID {$userId}.\n";
            } else {
                echo "Notice: User ID {$userId} already has role '{$roleName}'.\n";
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
            return ExitCode::UNSPECIFIED_ERROR;
        }

        return ExitCode::OK;
    }
}
