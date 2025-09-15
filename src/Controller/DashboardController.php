<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenDate;

class DashboardController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('dashboard');
        //$this->Authorization->skipAuthorization();

        // Get church ID from session or user data
        //$churchId = $this->request->getAttribute('identity')->get('church_id');
        $churchId = 1;

        // Get statistics
        $stats = $this->getDashboardStatistics($churchId);

        // Get recent activities
        $recentActivities = $this->getRecentActivities($churchId);

        // Get charts data
        $attendanceData = $this->getAttendanceData($churchId);
        $offeringData = $this->getOfferingData($churchId);
        $membershipData = $this->getMembershipData($churchId);
        $financialData = $this->getFinancialData($churchId);
        $projectData = $this->getProjectData($churchId);
        $monthlyOfferings = $this->getMonthlyOfferings($churchId);
        $expenseBreakdown = $this->getExpenseBreakdown($churchId);
        $projectContributions = $this->getProjectContributions($churchId);

        $this->set(compact(
            'stats',
            'recentActivities',
            'attendanceData',
            'offeringData',
            'membershipData',
            'financialData',
            'projectData',
            'monthlyOfferings',
            'expenseBreakdown',
            'projectContributions'
        ));
    }

    private function getDashboardStatistics($churchId)
    {
        $membersTable = TableRegistry::getTableLocator()->get('Members');
        $offeringsTable = TableRegistry::getTableLocator()->get('Offerings');
        $attendancesTable = TableRegistry::getTableLocator()->get('Attendances');
        $sermonsTable = TableRegistry::getTableLocator()->get('Sermons');
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $transactionsTable = TableRegistry::getTableLocator()->get('Transactions');

        // Calculate total expenses
        $expenseTypesTable = TableRegistry::getTableLocator()->get('TransactionTypes');
        $expenseTypeIds = $expenseTypesTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'id'
        ])
            ->toArray();

        $totalExpenses = $transactionsTable->find()
            ->where([
                'church_id' => $churchId,
                'transaction_type_id IN' => $expenseTypeIds
            ])
            ->select(['total' => $transactionsTable->find()->func()->sum('amount')])
            ->first()->total ?? 0;

        return [
            'total_members' => $membersTable->find()
                ->where(['church_id' => $churchId, 'member_status' => 1])
                ->count(),
            'total_offerings' => $offeringsTable->find()
                    ->where(['church' => $churchId])
                    ->select(['total' => $offeringsTable->find()->func()->sum('amount')])
                    ->first()->total ?? 0,
            'recent_attendances' => $attendancesTable->find()
                ->where(['church' => $churchId])
                ->count(),
            'total_sermons' => $sermonsTable->find()
                ->where(['church_id' => $churchId])
                ->count(),
            'active_projects' => $projectsTable->find()
                ->where(['church_id' => $churchId, 'is_active' => 1])
                ->count(),
            'total_expenses' => $totalExpenses,
            'net_balance' => ($offeringsTable->find()
                    ->where(['church' => $churchId])
                    ->select(['total' => $offeringsTable->find()->func()->sum('amount')])
                    ->first()->total ?? 0) - $totalExpenses
        ];
    }

    private function getRecentActivities($churchId)
    {
        $activities = [];

        // Recent members
        $membersTable = TableRegistry::getTableLocator()->get('Members');
        $recentMembers = $membersTable->find()
            ->where(['church_id' => $churchId])
            ->order(['created' => 'DESC'])
            ->limit(5)
            ->toArray();

        foreach ($recentMembers as $member) {
            $activities[] = [
                'type' => 'new_member',
                'title' => 'New Member Registered',
                'description' => $member->firstname . ' ' . $member->lastname . ' joined the church',
                'time' => $member->created,
                'icon' => 'user-plus'
            ];
        }

        // Recent offerings
        $offeringsTable = TableRegistry::getTableLocator()->get('Offerings');
        $recentOfferings = $offeringsTable->find()
            ->contain(['Offeringstypes'])
            ->where(['Offerings.church' => $churchId])
            ->order(['Offerings.created' => 'DESC'])
            ->limit(5)
            ->toArray();

        foreach ($recentOfferings as $offering) {
            $activities[] = [
                'type' => 'new_offering',
                'title' => 'New Offering Received',
                'description' => number_format($offering->amount) . ' for ' . $offering->offeringstype->name,
                'time' => $offering->created,
                'icon' => 'dollar-sign'
            ];
        }

        // Recent projects
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $recentProjects = $projectsTable->find()
            ->where(['church_id' => $churchId])
            ->order(['created' => 'DESC'])
            ->limit(3)
            ->toArray();

        foreach ($recentProjects as $project) {
            $activities[] = [
                'type' => 'new_project',
                'title' => 'New Project Started',
                'description' => $project->title,
                'time' => $project->created,
                'icon' => 'project-diagram'
            ];
        }

        // Sort by time and return latest 10
        usort($activities, function($a, $b) {
            return $b['time'] <=> $a['time'];
        });

        return array_slice($activities, 0, 10);
    }

    private function getAttendanceData($churchId)
    {
        $participationsTable = TableRegistry::getTableLocator()->get('Participations');

        $data = $participationsTable->find()
            ->select([
                'date' => 'DATE(participation_date)',
                'total' => 'SUM(number_people)',
                'male' => 'SUM(male_people)',
                'female' => 'SUM(female_people)',
                'children' => 'SUM(children_people)'
            ])
            ->where(['church' => $churchId])
            ->group(['DATE(participation_date)'])
            ->order(['participation_date' => 'DESC'])
            ->limit(7)
            ->toArray();

        return $data;
    }

    private function getOfferingData($churchId)
    {
        $offeringsTable = TableRegistry::getTableLocator()->get('Offerings');

        $data = $offeringsTable->find()
            ->contain(['Offeringstypes'])
            ->select([
                'type' => 'Offeringstypes.name',
                'amount' => $offeringsTable->find()->func()->sum('amount')
            ])
            ->where(['Offerings.church' => $churchId])
            ->group(['Offeringstypes.name'])
            ->toArray();

        return $data;
    }

    private function getMembershipData($churchId)
    {
        $membersTable = TableRegistry::getTableLocator()->get('Members');

        $data = $membersTable->find()
            ->contain(['Memberships'])
            ->select([
                'status' => 'Memberships.name',
                'count' => 'COUNT(Members.id)'
            ])
            ->where(['Members.church_id' => $churchId])
            ->group(['Members.membership_id'])
            ->toArray();

        return $data;
    }

    private function getFinancialData($churchId)
    {
        $transactionsTable = TableRegistry::getTableLocator()->get('Transactions');
        $transactionTypesTable = TableRegistry::getTableLocator()->get('TransactionTypes');

        // Get income transactions
        $incomeTypeIds = $transactionTypesTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'id'
        ])
            ->where(['fin_type' => 'Income'])
            ->toArray();

        $incomeData = $transactionsTable->find()
            ->select([
                'month' => 'DATE_FORMAT(transaction_date, "%Y-%m")',
                'amount' => $transactionsTable->find()->func()->sum('amount')
            ])
            ->where([
                'church_id' => $churchId,
                'transaction_type_id IN' => $incomeTypeIds
            ])
            ->group(['month'])
            ->order(['month' => 'DESC'])
            ->limit(6)
            ->toArray();

        // Get expense transactions
        $expenseTypeIds = $transactionTypesTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'id'
        ])
            ->where(['fin_type' => 'Expense'])
            ->toArray();

        $expenseData = $transactionsTable->find()
            ->select([
                'month' => 'DATE_FORMAT(transaction_date, "%Y-%m")',
                'amount' => $transactionsTable->find()->func()->sum('amount')
            ])
            ->where([
                'church_id' => $churchId,
                'transaction_type_id IN' => $expenseTypeIds
            ])
            ->group(['month'])
            ->order(['month' => 'DESC'])
            ->limit(6)
            ->toArray();

        return [
            'income' => $incomeData,
            'expense' => $expenseData
        ];
    }

    private function getProjectData($churchId)
    {
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');

        $data = $projectsTable->find()
            ->select([
                'status' => 'project_status',
                'count' => 'COUNT(id)',
                'total_budget' => 'SUM(amount)'
            ])
            ->where(['church_id' => $churchId])
            ->group(['project_status'])
            ->toArray();

        return $data;
    }

    private function getMonthlyOfferings($churchId)
    {
        $offeringsTable = TableRegistry::getTableLocator()->get('Offerings');

        $data = $offeringsTable->find()
            ->select([
                'month' => 'DATE_FORMAT(service_date, "%Y-%m")',
                'amount' => $offeringsTable->find()->func()->sum('amount')
            ])
            ->where(['church' => $churchId])
            ->group(['month'])
            ->order(['month' => 'DESC'])
            ->limit(12)
            ->toArray();

        return $data;
    }

    private function getExpenseBreakdown($churchId)
    {
        $transactionsTable = TableRegistry::getTableLocator()->get('Transactions');
        $transactionTypesTable = TableRegistry::getTableLocator()->get('TransactionTypes');

        $expenseTypeIds = $transactionTypesTable->find('list', [
            'keyField' => 'id',
            'valueField' => 'id'
        ])
            ->toArray();

        $data = $transactionsTable->find()
            ->contain(['TransactionTypes'])
            ->select([
                'type' => 'TransactionTypes.name',
                'amount' => $transactionsTable->find()->func()->sum('amount')
            ])
            ->where([
                'church_id' => $churchId,
                'transaction_type_id IN' => $expenseTypeIds
            ])
            ->group(['TransactionTypes.name'])
            ->toArray();

        return $data;
    }

    // Add this method to your DashboardController
    private function getProjectContributions($churchId)
    {
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $contributionsTable = TableRegistry::getTableLocator()->get('Contributions');

        // Get all projects for this church
        $projects = $projectsTable->find()
            ->where(['church_id' => $churchId])
            ->toArray();

        $result = [];

        foreach ($projects as $project) {
            // Get total contributions for this project
            $totalContributions = $contributionsTable->find()
                ->where(['project_id' => $project->id])
                ->select(['total' => $contributionsTable->find()->func()->sum('amount')])
                ->first()->total ?? 0;

            // Calculate progress percentage
            $progress = 0;
            if ($project->amount > 0) {
                $progress = min(100, round(($totalContributions / $project->amount) * 100, 2));
            }

            $result[] = [
                'id' => $project->id,
                'title' => $project->title,
                'target_amount' => $project->amount,
                'collected_amount' => $totalContributions,
                'progress' => $progress,
                'status' => $project->project_status,
                'start_date' => $project->start_date,
                'end_date' => $project->end_date
            ];
        }

        // Sort by progress (descending)
        usort($result, function($a, $b) {
            return $b['progress'] <=> $a['progress'];
        });

        return $result;
    }
}
