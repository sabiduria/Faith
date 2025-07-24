<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\SalesAnalyticsService;
use Cake\Datasource\ConnectionManager;
use Cake\Http\ServerRequest;
use Cake\I18n\Date;
use Cake\I18n\DateTime;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GeneralController extends AppController
{
    /**
     * @return void
     */
    public function dashboard()
    {
        $session = $this->request->getSession();

        $request = new ServerRequest();
        $this->viewBuilder()->setLayout('dashboard');
    }

    /**
     * @param $table
     * @param $prefix
     * @return string
     */
    public static function generateReference($table, $prefix): string
    {
        $number = self::getCountAll($table);

        if ($number == 0 || $number == null) {
            $reference = '0000001';
        } elseif ($number > 0 && $number < 10) {
            $reference = '000000' . ($number + 1);
        } elseif ($number >= 10 && $number < 100) {
            $reference = '00000' . ($number + 1);
        } elseif ($number >= 100 && $number < 999) {
            $reference = '0000' . ($number + 1);
        } elseif ($number >= 1000 && $number < 9999) {
            $reference = '000' . ($number + 1);
        } elseif ($number >= 10000 && $number < 99999) {
            $reference = '00' . ($number + 1);
        } else {
            $reference = '0' . ($number + 1);
        }

        return $prefix . '-' . $reference;
    }

    /**
     * @param $table
     * @return mixed|null
     */
    public static function getCountAll($table): mixed
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT COUNT(*) as nber FROM ' . strtolower($table));
        $result = $stmt->fetch('assoc');
        foreach ($result as $row) {
            return $row;
        }

        return null;
    }

    public static function getNameOf($id, $tableName): ?string
    {
        $table = TableRegistry::getTableLocator()->get($tableName)
            ->find()
            ->select(['name'])
            ->where(['id' => $id])
            ->first();

        return $table ? $table->name : null;
    }

    public static function getReferenceOf($id, $tableName): ?string
    {
        $table = TableRegistry::getTableLocator()->get($tableName)
            ->find()
            ->select(['reference'])
            ->where(['id' => $id])
            ->first();

        return $table ? $table->reference : null;
    }

    public static function getUserNameOf($id = null): ?string
    {
        $table = TableRegistry::getTableLocator()->get('Users');

        if ($id != null){
            $user = $table->find()
                ->select([
                    'name' => $table->query()->newExpr()->add([
                        'CONCAT(firstname, " ", lastname)'
                    ])
                ])
                ->where(['id' => $id])
                ->first();

            return $user ? $user->name : null;
        } else{
            return "Not Connected";
        }
    }

    static function dateDiffInDays($date1, $date2): float|int
    {
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400));
    }

    public static function getLastIdInsertedBy($username, $tableName): ?int
    {
        $table = TableRegistry::getTableLocator()->get($tableName)
            ->find()
            ->select(['id'])
            //->where(['createdby' => $username])
            ->orderByDesc('id')
            ->first();

        return $table ? $table->id : null;
    }

    public static function getIDFromReference($reference, $tableName): ?int
    {
        $table = TableRegistry::getTableLocator()->get($tableName)
            ->find()
            ->select(['id'])
            ->where(['reference' => $reference])
            ->orderByDesc('id')
            ->first();

        return $table ? $table->id : null;
    }

    public static function getLatestExchangeRate(): float
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT amount FROM exchangerates ORDER BY id DESC LIMIT 1');
        $result = $stmt->fetch('assoc');
        foreach ($result as $row) {
            return $row;
        }

        return 0;
    }
}
