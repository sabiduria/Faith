<?php
use App\Controller\AccessrightsController;
$session = $this->request->getSession();
$profile_id = $session->read('Auth.ProfileId');
$profile = $session->read('Auth.Profile');
$agency_name = $session->read('Auth.ShopName');
?>

<nav class="main-menu-container nav nav-pills flex-column sub-open">
    <div class="slide-left" id="slide-left">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
    </div>
    <ul class="main-menu">
        <!-- Start::slide -->
        <!-- Start::slide__category -->
        <li class="slide__category"><span class="category-name">Main</span></li>
        <!-- End::slide__category -->
        <li class="slide">
            <?= $this->Html->link('<i class="fa-thin fa-chart-waterfall w-6 h-6 side-menu__icon"></i><span class="side-menu__label">Tableau de bord</span>', ['controller' => '/'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide has-sub <?= $menu_product ?? '' ?>">
            <a href="javascript:void(0);" class="side-menu__item">
                <i class="ri-arrow-down-s-line side-menu__angle"></i>
                <i class="fa-thin fa-list-timeline w-6 h-6 side-menu__icon"></i>
                <span class="side-menu__label">Prédications</span>
            </a>
            <ul class="slide-menu child1">
                <li class="slide">
                    <?= $this->Html->link('Liste', ['controller' => 'sermons', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Ajouter', ['controller' => 'sermons', 'action' => 'add'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Thématiques', ['controller' => 'topics', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
            </ul>
        </li>
        <!-- End::slide -->

        <!-- Start::slide__category -->
        <li class="slide__category"><span class="category-name">Finance</span></li>
        <!-- End::slide__category -->

        <!-- Start::slide -->
        <li class="slide has-sub <?= $menu_sales ?? '' ?>">
            <a href="javascript:void(0);" class="side-menu__item">
                <i class="ri-arrow-down-s-line side-menu__angle"></i>
                <i class="fa-thin fa-cash-register w-6 h-6 side-menu__icon"></i>
                <span class="side-menu__label">Offrandes</span>
            </a>
            <ul class="slide-menu child1">
                <li class="slide">
                    <?= $this->Html->link('Liste', ['controller' => 'offerings', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Ajouter', ['controller' => 'offerings', 'action' => 'add'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
            </ul>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide has-sub <?= $menu_expenses ?? '' ?>">
            <a href="javascript:void(0);" class="side-menu__item">
                <i class="ri-arrow-down-s-line side-menu__angle"></i>
                <i class="fa-thin fa-money-check-dollar-pen w-6 h-6 side-menu__icon"></i>
                <span class="side-menu__label">Transactons Fin.</span>
            </a>
            <ul class="slide-menu child1">
                <li class="slide">
                    <?= $this->Html->link('Liste', ['controller' => 'transactions', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Ajouter', ['controller' => 'transactions', 'action' => 'add'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Types transactions', ['controller' => 'transaction-types', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
            </ul>
        </li>
        <!-- End::slide -->

        <!-- Start::slide__category -->
        <li class="slide__category"><span class="category-name">Ressources Humaines</span></li>
        <!-- End::slide__category -->

        <!-- Start::slide -->
        <li class="slide">
            <?= $this->Html->link('<i class="fa-thin fa-users w-6 h-6 side-menu__icon"></i><span class="side-menu__label">Departements</span>', ['controller' => 'departments', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide">
            <?= $this->Html->link('<i class="fa-thin fa-users-line w-6 h-6 side-menu__icon"></i><span class="side-menu__label">Membres</span>', ['controller' => 'members', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
        </li>
        <!-- End::slide -->

        <!-- Start::slide__category -->
        <li class="slide__category"><span class="category-name">Equipements & Maintenances</span></li>
        <!-- End::slide__category -->

        <!-- Start::slide -->
        <li class="slide has-sub <?= $menu_parameters ?? '' ?>">
            <a href="javascript:void(0);" class="side-menu__item">
                <i class="ri-arrow-down-s-line side-menu__angle"></i>
                <i class="fa-thin fa-gear w-6 h-6 side-menu__icon"></i>
                <span class="side-menu__label">Equipments</span>
            </a>
            <ul class="slide-menu child1">
                <li class="slide">
                    <?= $this->Html->link('Listes', ['controller' => 'equipments', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Maintenances', ['controller' => 'maintenances', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
            </ul>
        </li>
        <!-- End::slide -->

        <!-- Start::slide__category -->
        <li class="slide__category"><span class="category-name">Rapports & Paramètres</span></li>
        <!-- End::slide__category -->

        <!-- Start::slide -->
        <li class="slide has-sub <?= $menu_reports ?? '' ?>">
            <a href="javascript:void(0);" class="side-menu__item">
                <i class="ri-arrow-down-s-line side-menu__angle"></i>
                <i class="fa-thin fa-chart-pie w-6 h-6 side-menu__icon"></i>
                <span class="side-menu__label">Rapports</span>
            </a>
            <ul class="slide-menu child1">
                <li class="slide">
                    <?= $this->Html->link('Offrandes', ['controller' => 'general', 'action' => 'offerings'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Participations', ['controller' => 'general', 'action' => 'participations'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Présences', ['controller' => 'general', 'action' => 'attendances'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Maintenances', ['controller' => 'general', 'action' => 'maintenances'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
            </ul>
        </li>
        <!-- End::slide -->

        <!-- Start::slide -->
        <li class="slide has-sub <?= $menu_parameters ?? '' ?>">
            <a href="javascript:void(0);" class="side-menu__item">
                <i class="ri-arrow-down-s-line side-menu__angle"></i>
                <i class="fa-thin fa-gear w-6 h-6 side-menu__icon"></i>
                <span class="side-menu__label">Paramètres</span>
            </a>
            <ul class="slide-menu child1">
                <li class="slide">
                    <?= $this->Html->link('Utilisateurs', ['controller' => 'users', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Affectations', ['controller' => 'affectations', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Eglises', ['controller' => 'churchs', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Services', ['controller' => 'services', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Profiles', ['controller' => 'roles', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
                <li class="slide">
                    <?= $this->Html->link('Taux d\'échanges', ['controller' => 'exchangerates', 'action' => 'index'], ['escape'=>false, 'class' => 'side-menu__item']) ?>
                </li>
            </ul>
        </li>
        <!-- End::slide -->

    </ul>
    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
</nav>
